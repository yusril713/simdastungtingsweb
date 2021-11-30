<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\DataOdp;
use App\Models\Dokumen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class DokumenController extends Controller
{
    public function index() {
        $user = User::with('roles')->find(Auth::user()->id);
        $data = ($user->roles[0]->name == 'Super Admin' or $user->roles[0]->name == 'Admin') ? Dokumen::with('user')->orderBy('jenis_integrasi')->get() : Dokumen::with('user')->where('user_id', Auth::user()->id)->orderBy('jenis_integrasi')->get();
        return view('admin.dokumen.index', [
            'data' => $data
        ]);
    }

    public function create() {
        return view('admin.dokumen.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'tahun' => 'required',
            'jenis_dokumen' => 'required',
            'kode' => 'required|unique:tb_dokumen,kode',
            'file' => 'required|mimes:pdf,xls,xlsx,doc,docx'
        ]);

        $dok = new Dokumen();
        $dok->user_id = Auth::user()->id;
        $dok->jenis_integrasi = $request->jenis_integrasi;
        $dok->kode = $request->kode;
        $dok->nama = $request->nama;
        $dok->class = $request->class;
        $dok->jenis = $request->jenis;
        $dok->tahun = $request->tahun;
        $dok->dokumen = $request->jenis_dokumen;
        if ($request->file()) {
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('dokumen/' . Auth::user()->id, $fileName, 'public');
            $dok->file = '/storage/' . $filePath;
            $dok->ext = $request->file->getClientMimeType();
        }
        $dok->save();
        return redirect()->route('manage-dokumen.index')->with('status', 'Data berhasil disimpan...');
    }

    public function edit($id) {
        return view('admin.dokumen.edit', [
            'data' => Dokumen::find(Crypt::decrypt($id))
        ]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'tahun' => 'required',
            'jenis_dokumen' => 'required',
        ]);

        $dok = Dokumen::find(Crypt::decrypt($id));
        $dok->nama = $request->nama;
        $dok->jenis_integrasi = $request->jenis_integrasi;
        $dok->jenis = $request->jenis;
        $dok->class = $request->class;
        $dok->kode = $request->kode;
        $dok->tahun = $request->tahun;
        $dok->dokumen = $request->jenis_dokumen;
        if ($request->file()) {
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('dokumen/' . Auth::user()->id, $fileName, 'public');
            $dok->file = '/storage/' . $filePath;
            $dok->ext = $request->file->getClientMimeType();

        }
        $dok->save();
        return redirect()->route('manage-dokumen.index')->with('status', 'Data berhasil diubah...');
    }

    public function show($id) {
        $dok = Dokumen::find(Crypt::decrypt($id));
        return view('admin.dokumen.show', [
            'data' => $dok
        ]);
    }

    public function destroy($id) {
        $dok = Dokumen::find(Crypt::decrypt($id));
        if(file_exists(public_path($dok->file))) {
            unlink(public_path($dok->file));
        }
        $dok->delete();
        return back()->with('status', 'Data berhasil dihapus...');
    }

    public function getOdp() {
        // $odp = Dokumen::with('user.instansi')->where('dokumen', 'Data OPD')->get();
        // return view('user.data-opd', [
        //     'data' => $odp,
        //     'title' => 'Data OPD',
        //     'latest' => Artikel::orderBy('created_at', 'desc')->limit(3)->get()
        // ]);

        $data = [
            "Badan Perencanaan, Penelitian dan Pengembangan Daerah",
            "Dinas Kesehatan, Pengendalian Penduduk dan Keluarga Berencana Daerah",
            "Dinas Pertanian dan Ketahanan Pangan",
            "Dinas Perikanan Daerah",
            "Dinas Pekerjaan Umum dan Penataan Ruang Daerah",
            "Dinas Pendidikan Daerah",
            "Dinas Pemberdayaan Masyarakat, Desa, Pemberdayaan Perempuan dan Perlindungan Anak",
            "Dinas Sosial Daerah",
            "Dinas Kependudukan dan Catatan Sipil Daerah",
            "Dinas Komunikasi dan Informasi Daerah",
            "Dinas Perdagangan dan Perindustrian",
            "Kementerian Agama Kabupaten Morowali"
        ];

        return view('user.opd-kategori', [
            'data' => $data,
            'title' => 'Data OPD',
            'latest' => Artikel::orderBy('created_at', 'desc')->limit(3)->get()
        ]);
        // return $odp;
    }

    public function detailOpd(Request $request) {
        $data = DataOdp::where('jenis', $request->jenis)->get();
        return view('user.detail-opd', [
            'title' => $request->jenis,
            'data' => $data
        ]);
    }

    public function detailIntegrasi(Request $request) {
        $data = Dokumen::where('jenis_integrasi', $request->jenis)->get();
        return view('user.detail-integrasi', [
            'title' => $request->jenis,
            'data' => $data
        ]);
    }

    public function getIntegrasi() {
        $data = [
            "ANALISIS SITUASI",
            "RENCANA KEGIATAN",
            "REMBUK STUNTING",
            "PERWALI/PERBUP PERAN DESA/KELURAHAN",
            "PEMBINAAN KADER PEMBANGUNAN MANUSIA",
            "SISTEM MANAJEMEN DATA",
            "PENGUKURAN DAN PUBLIKASI DATA STUNTING",
            "REVIEW KERJA TAHUNAN"
        ];
        // $odp = Dokumen::with('user.instansi')->where('dokumen', 'Aksi Integrasi')->get();
        return view('user.data-opd', [
            'data' => $data,
            'title' => 'Aksi Integrasi',
            // 'latest' => Artikel::orderBy('created_at', 'desc')->limit(3)->get()
        ]);
    }

    public function findOdp(Request $request) {

        // $odp = Dokumen::with('user.instansi')->where('dokumen', 'Data OPD')
        //     ->where(function ($query) use($request) {
        //         $query->where('kode', 'like', '%' . $request->keyword . '%')
        //             ->orWhere('nama', 'like', '%' . $request->keyword . '%')
        //             ->orWhere('tahun', 'like', '%' . $request->keyword . '%')
        //             ->orWhere('jenis', 'like', '%' . $request->keyword . '%');
        //     })
        //     ->get();
        // return view('user.data-opd', [
        //     'data' => $odp,
        //     'title' => 'Data OPD',
        //     'keyword' => $request->keyword,
        //     'latest' => Artikel::orderBy('created_at', 'desc')->limit(3)->get()
        // ]);
        // return $odp;
    }

    public function findIntegrasi(Request $request) {
        $odp = Dokumen::with('user.instansi')->where('dokumen', 'Aksi Integrasi')
            ->where(function ($query) use($request) {
                $query->where('kode', 'like', '%' . $request->keyword . '%')
                    ->orWhere('nama', 'like', '%' . $request->keyword . '%')
                    ->orWhere('tahun', 'like', '%' . $request->keyword . '%')
                    ->orWhere('jenis', 'like', '%' . $request->keyword . '%');
            })
            ->get();
        return view('user.data-opd', [
            'data' => $odp,
            'title' => 'Aksi Integrasi',
            'keyword' => $request->keyword,
            'latest' => Artikel::orderBy('created_at', 'desc')->limit(3)->get()
        ]);
        // return $odp;
    }
}
