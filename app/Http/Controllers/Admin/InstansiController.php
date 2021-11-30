<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Instansi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class InstansiController extends Controller
{
    public function index() {
        return view('admin.instansi.index', [
            'data' => Instansi::all()
        ]);
    }

    public function create() {
        return view('admin.instansi.create');
    }

    public function store(Request $request) {
        $request->validate([
            'kode_instansi' => 'required|unique:tb_instansi,kode_instansi',
            'nama_instansi' => 'required'
        ]);

        $i = new Instansi();
        $i->kode_instansi = $request->kode_instansi;
        $i->nama_instansi = $request->nama_instansi;
        $i->save();
        return redirect()->route('manage-instansi.index')->with('status', 'Data berhasil disimpan,,,');
    }

    public function edit($id) {
        return view('admin.instansi.edit', [
            'data' => Instansi::find(Crypt::decrypt($id))
        ]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'kode_instansi' => 'required',
            'nama_instansi' => 'required'
        ]);

        $i = Instansi::find(Crypt::decrypt($id));
        $i->kode_instansi = $request->kode_instansi;
        $i->nama_instansi = $request->nama_instansi;
        $i->save();
        return redirect()->route('manage-instansi.index')->with('status', 'Data berhasil diubah,,,');
    }

    public function destroy($id) {
        Instansi::find(Crypt::decrypt($id))->delete();
        return back()->with('status', 'Data berhasil dihapus...');
    }
}
