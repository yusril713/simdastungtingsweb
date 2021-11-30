<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kontak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class KontakController extends Controller
{
    public function index() {
        return view('admin.kontak.index', [
            'data' => Kontak::all()
        ]);
    }

    public function edit($id) {
        return view('admin.kontak.edit', [
            'data' => Kontak::find(Crypt::decrypt($id))
        ]);
    }

    public function update(Request $request, $id) {
        $kontak = Kontak::find(Crypt::decrypt($id));
        $kontak->email = $request->email;
        $kontak->phone = $request->phone;
        $kontak->facebook = $request->facebook;
        $kontak->twitter = $request->twitter;
        $kontak->instagram = $request->instagram;
        $kontak->location = $request->location;
        $kontak->save();
        return redirect()->route('manage-kontak.index')->with('status', 'Data berhasil diperbaharui');
    }
}
