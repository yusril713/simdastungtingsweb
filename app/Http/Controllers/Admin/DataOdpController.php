<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataOdp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class DataOdpController extends Controller
{
    public function index() {
        return view('admin.data-odp.index', ['data' => DataOdp::orderBy('jenis')->get()]);
    }

    public function create() {
        return view('admin.data-odp.create');
    }

    public function edit($id) {
        $data = DataOdp::find(Crypt::decrypt($id));
        return view('admin.data-odp.edit', [
            'opd' => $data
        ]);
    }

    public function store(Request $request) {
        $data = new DataOdp();
        $data->jenis = $request->jenis;
        $data->program = $request->program;
        $data->indikator = $request->indikator;
        $data->baseline = $request->baseline;
        $data->targer = $request->target;
        $data->lokasi = $request->lokasi;
        $data->anggaran = $request->anggaran;
        $data->sumber_pendanaan = $request->sumber_pendanaan;
        if ($request->file()) {
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('data-opd/' . Auth::user()->id, $fileName, 'public');
            $data->file = '/storage/' . $filePath;

        }
        $data->save();

        return redirect()->route('manage-data-opd.index')->with('status', 'Data successfully created...');
    }

    public function update(Request $request, $id) {
        $data = DataOdp::find(Crypt::decrypt($id));
        $data->jenis = $request->jenis;
        $data->program = $request->program;
        $data->indikator = $request->indikator;
        $data->baseline = $request->baseline;
        $data->targer = $request->target;
        $data->lokasi = $request->lokasi;
        $data->anggaran = $request->anggaran;
        $data->sumber_pendanaan = $request->sumber_pendanaan;
        if ($request->file()) {
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('data-opd/' . Auth::user()->id, $fileName, 'public');
            $data->file = '/storage/' . $filePath;

        }
        $data->save();

        return redirect()->route('manage-data-opd.index')->with('status', 'Data successfully changed...');
    }

    public function destroy($id) {
        $data = DataOdp::find(Crypt::decrypt($id));
        if(file_exists(public_path($data->file))) {
            unlink(public_path($data->file));
        }
        $data->delete();
        return redirect()->route('manage-data-opd.index')->with('status', 'Data successfully removed...');
    }
}
