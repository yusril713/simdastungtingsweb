<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Dokumen;
use App\Models\Galeri;
use App\Models\Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    public function infoStunting() {
        return view('user.info-stunting', [
            'data' => Info::first(),
            'artikel' => Artikel::orderBy('created_at', 'desc')->limit(3)->get(),
        ]);
    }

    public function getArtikel() {
        return view('user.artikel', [
            'data' => Artikel::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    public function search(Request $req) {
        return view('user.artikel', [
            'keyword' => $req->keyword,
            'data' => Artikel::where('judul', 'like', '%'. $req->keyword . '%')
                ->orWhere('konten', 'like', '%' . $req->keyword . '%')
                ->orWhere('editor', 'like', '%' . $req->keyword . '%')
                ->orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    public function detailArtikel($slug) {
        return view('user.artikel-detail', [
            'artikel' => Artikel::where('slug', $slug)->first(),
            'latest' => Artikel::orderBy('created_at', 'desc')->limit(3)->get()
        ]);
    }

    public function getGaleri() {
        return view('user.galeri', [
            'data' => Galeri::where('jenis', 'gambar')->paginate(18),
            'latest' => Artikel::orderBy('created_at', 'desc')->limit(3)->get()
        ]);
    }

    public function getVideo() {
        return view('user.video', [
            'video' => Galeri::where('jenis', 'video')->paginate(18),
            'latest' => Artikel::orderBy('created_at', 'desc')->limit(3)->get()
        ]);
    }

    public function preview($id) {
        return view('user.preview', [
            'data' => Dokumen::find(Crypt::decrypt($id))
        ]);
    }
}
