<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CarouselController extends Controller
{
    public function index() {
        return view('admin.carousel.index', [
            'data' => Carousel::orderBy('created_at','desc')->get()
        ]);
    }

    public function create() {
        return view('admin.carousel.create');
    }

    public function store(Request $request) {
        $request->validate([
            'gambar' => 'required|mimes:png,jpg,jpeg',
            'status' => 'required'
        ]);

        $carousel = new Carousel();
        if ($request->file()) {
            $fileName = time().'_'.$request->gambar->getClientOriginalName();
            $filePath = $request->file('gambar')->storeAs('carousel', $fileName, 'public');
            $carousel->img_source = '/storage/' . $filePath;
            $carousel->status = $request->status;
            $carousel->save();
            return redirect()->route('manage-carousel.index')->with('status', 'Data berhasil disimpan...');
        }
    }

    public function edit($id) {
        return view('admin.carousel.edit', [
            'data' => Carousel::find(Crypt::decrypt($id))
        ]);
    }

    public function update(Request $request, $id) {
        $carousel = Carousel::find(Crypt::decrypt($id));
        if ($request->file()) {
            $fileName = time().'_'.$request->gambar->getClientOriginalName();
            $filePath = $request->file('gambar')->storeAs('carousel', $fileName, 'public');
            $carousel->img_source = '/storage/' . $filePath;
        }
        $carousel->status = $request->status;
        $carousel->save();
        return redirect()->route('manage-carousel.index')->with('status', 'Data berhasil diubah...');
    }


    public function destroy($id) {
        $carousel = Carousel::find(Crypt::decrypt($id));
        if (file_exists(public_path($carousel->img_source))) {
            unlink(public_path($carousel->img_source));
            // return $carousel->img_source;
        }
        $carousel->delete();
        return back()->with('status', 'Data berhasil dihapus...');
    }
}
