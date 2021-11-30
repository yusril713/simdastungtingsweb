<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class GaleriController extends Controller
{
    public function index() {
        $user = User::with('roles')->find(Auth::user()->id);
        $data = ($user->roles[0]->name == 'Super Admin' or $user->roles[0]->name == 'Admin')
            ? Galeri::with('user')->get() :
            Galeri::with('user')->where('user_id', Auth::user()->id)->get();
        return view('admin.galeri.index', [
            'data' => $data
        ]);
    }

    public function create() {
        return view('admin.galeri.create');
    }

    public function store(Request $request) {
        $request->validate([
            'judul' => 'required',
            'jenis' => 'required',
            'konten' => 'required'
        ]);
        $galeri = new Galeri();
        $galeri->user_id = Auth::user()->id;
        $galeri->judul = $request->judul;
        $galeri->jenis = $request->jenis;
        if ($request->jenis == 'video') {
            $galeri->konten = $request->konten;
        } else {
            if ($request->file()) {
                $fileName = time().'_'.$request->konten->getClientOriginalName();
                $filePath = $request->file('konten')->storeAs('galeri/' . Auth::user()->id, $fileName, 'public');
                $galeri->konten = '/storage/' . $filePath;
            }
        }

        $galeri->save();
        return redirect()->route('manage-galeri.index')->with('status', 'Data berhasil disimpan...');
    }

    public function edit($id) {
        return view('admin.galeri.edit', [
            'data' => Galeri::find(Crypt::decrypt($id))
        ]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'judul' => 'required',
            'jenis' => 'required'
        ]);
        $galeri = Galeri::find(Crypt::decrypt($id));
        $galeri->judul = $request->judul;
        $galeri->jenis = $request->jenis;
        if ($request->jenis == 'video') {
            $galeri->konten = $request->konten;
        } else {
            if ($request->file()) {
                $fileName = time().'_'.$request->konten->getClientOriginalName();
                $filePath = $request->file('konten')->storeAs('galeri/' . Auth::user()->id . '/', $fileName, 'public');
                $galeri->konten = '/storage/' . $filePath;
            }
        }

        $galeri->save();
        return redirect()->route('manage-galeri.index')->with('status', 'Data berhasil diubah...');
    }

    public function destroy($id) {
        $galeri = Galeri::find(Crypt::decrypt($id));
        if (file_exists(public_path($galeri->konten))) {
            unlink(public_path($galeri->konten));
        }
        $galeri->delete();
        return back()->with('status', "Data berhasil dihapus...");
    }
}
