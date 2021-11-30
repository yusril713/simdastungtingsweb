<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class InfoController extends Controller
{
    public function index() {
        return view('admin.info.index', [
            'data' => Info::all()
        ]);
    }

    public function edit($id) {
        $info = Info::find(Crypt::decrypt($id));
        return view('admin.info.edit', [
            'data' => $info
        ]);
    }

    public function update(Request $request, $id) {
        $info = Info::find(Crypt::decrypt($id));
        $info->info = $request->info;
        $info->save();
        return redirect()->route('manage-info.index')->with('status', 'Data berhasil diubah...');
    }
}
