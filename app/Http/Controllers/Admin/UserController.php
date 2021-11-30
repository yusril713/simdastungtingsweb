<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Instansi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Str;

class UserController extends Controller
{
    public function index() {
        return view('admin.users.index', [
            'data' => User::with('roles', 'instansi')->get()
        ]);
    }

    public function create() {
        return view('admin.users.create', [
            'role' => Role::where('name', '!=', 'Super Admin')->get(),
            'instansi' => Instansi::all()
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed',
            'instansi' => 'required',
            'jenis_kelamin' => 'required',
            'role' => 'required'
        ]);

        $user = new User();
        $user->email = $request->email;
        $user->name = $request->nama;
        $user->password = Hash::make($request->password);
        $user->instansi_id = $request->instansi;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->no_telp = $request->no_telp;
        $user->alamat = $request->alamat;
        $user->save();

        $user->assignRole($request->role);

        return redirect()->route('manage-users.index')->with('status', 'Data berhasil disimpan...');
    }

    public function edit($id) {
        return view('admin.users.edit', [
            'data' => User::with('roles', 'instansi')->find(Crypt::decrypt($id)),
            'role' => Role::where('name', '!=', 'Super Admin')->get(),
            'instansi' => Instansi::all()
        ]);
    }

    public function profile() {
        return view('admin.users.edit', [
            'data' => User::with('roles', 'instansi')->find(Auth::user()->id),
            'role' => Role::where('name', '!=', 'Super Admin')->get(),
            'instansi' => Instansi::all()
        ]);
    }

    public function update(Request $request, $id) {
        $user = User::find(Crypt::decrypt($id));
        $user->email = $request->email;
        $user->name = $request->nama;
        $user->instansi_id = $request->instansi;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->no_telp = $request->no_telp;
        $user->alamat = $request->alamat;
        $user->save();

        $user->syncRoles($request->role);
        return redirect()->route('manage-users.index')->with('status', 'Data berhasil diubah...');
    }

    public function destroy($id) {
        $user = User::find(Crypt::decrypt($id))->delete();
        return back()->with('status', 'Data berhasil dihapus...');
    }

    public function resetPassword($id) {
        $user = User::find(Crypt::decrypt($id));
        $newPass = Str::random(8);
        $user->password = Hash::make($newPass);
        $user->save();
        return back()->with('status', 'Password berhasil direset. Password baru: ' . $newPass);
    }

    public function changePassword() {
        return view('admin.users.change-password');
    }

    public function storePassword(Request $request) {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed'
        ]);
        $user = User::find(Auth::user()->id);

        if (Hash::check($request->old_password, $user->password)) {
            $user->fill([
             'password' => Hash::make($request->password)
             ])->save();

            $request->session()->flash('success', 'Password changed');
             return redirect()->route('manage-users.change-password');

         } else {
             $request->session()->flash('error', 'Password does not match');
             return redirect()->route('manage-users.change-password');
         }
    }
}
