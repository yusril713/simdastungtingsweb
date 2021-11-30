<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class ArtikelController extends Controller
{
    public function index() {
        $user = User::with('roles')->find(Auth::user()->id);
        $data = ($user->roles[0]->name == 'Super Admin' or $user->roles[0]->name == 'Admin') ? Artikel::with('user')->orderBy('created_at', 'desc')->get() : Artikel::with('user')->where('user_id', $user->id)->get();
        return view('admin.artikel.index', [
            'data' => $data
        ]);
    }

    public function create() {
        return view('admin.artikel.create');
    }

    public function store(Request $request) {
        $request->validate([
            'judul' => 'required',
            'slug' => 'required|unique:tb_artikel,slug',
            'tanggal' => 'required',
            'konten' => 'required',
            'gambar' => 'required'
        ]);

        $artikel = new Artikel();
        $artikel->user_id = Auth::user()->id;
        $artikel->judul = $request->judul;
        $artikel->slug = $request->slug;
        $artikel->editor = $request->editor;
        $artikel->tanggal = $request->tanggal;
        $artikel->konten = $request->konten;
        if ($request->file()) {
            $fileName = time().'_'.$request->gambar->getClientOriginalName();
            $filePath = $request->file('gambar')->storeAs('artikel/' . Auth::user()->id . '/', $fileName, 'public');
            $artikel->gambar = '/storage/' . $filePath;
        }
        $artikel->save();

        return redirect()->route('manage-artikel.index')->with('status', 'Data berhasil disimpan...');
    }

    public function edit($id) {
        return view('admin.artikel.edit', [
            'data' => Artikel::find(Crypt::decrypt($id))
        ]);
    }

    public function update(Request $request, $id) {
        $artikel = Artikel::find(Crypt::decrypt($id));
        $request->validate([
            'judul' => 'required',
            'slug' => 'required|unique:tb_artikel,slug,' . $artikel->id,
            'tanggal' => 'required',
            'konten' => 'required'
        ]);

        $artikel->user_id = Auth::user()->id;
        $artikel->judul = $request->judul;
        $artikel->slug = $request->slug;
        $artikel->editor = $request->editor;
        $artikel->tanggal = $request->tanggal;
        $artikel->konten = $request->konten;
        if ($request->file()) {
            $fileName = time().'_'.$request->gambar->getClientOriginalName();
            $filePath = $request->file('gambar')->storeAs('artikel/' . Auth::user()->id, $fileName, 'public');
            $artikel->gambar = '/storage/' . $filePath;
        }
        $artikel->save();

        return redirect()->route('manage-artikel.index')->with('status', 'Data berhasil diubah...');
    }

    public function show($slug) {
        $artikel = Artikel::with('user')->where('slug', $slug)->first();
        return view('admin.artikel.show', [
            'data' => $artikel
        ]);
    }

    public function destroy($id) {
        $artikel = Artikel::find(Crypt::decrypt($id));
        if(file_exists(public_path($artikel->gambar))) {
            unlink(public_path($artikel->gambar));
        }
        $artikel->delete();
        return back()->with('status', 'Data berhasil dihapus...');
    }
}
