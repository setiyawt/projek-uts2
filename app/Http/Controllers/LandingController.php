<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LandingController extends Controller
{
    public function index()
    {
        return view('site.index')->with([
            'produk' => Produk::all(),
            'kategori' => Kategori::all(),
        ]);
    }

    public function about()
    {
        return view('site.about');
    }

    public function contact()
    {
        return view('site.contact');
    }

    public function shop()
    {
        return view('site.shop')->with([
            'produk' => Produk::all(),
         ]);;
    }

    public function kshop($id)
    {
        $produk = Produk::find($id);
        return view('site.detail',compact(['produk']));
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function profil()
    {
        $user = auth()->user()->id;
        return view('admin.profile',compact(['user']));
    }

    public function profilU()
    {
        $user = auth()->user()->id;
        return view('site.profileuser',compact(['user']));
    }

    public function dataAdmin()
    {
        $user = User::all();
        return view('admin.index',compact(['user']));
    }


    public function edit_aView($id)
    {
        $user = User::find($id);
        return view('admin.e_admin',compact(['user']));
    }

    public function editAdmin(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
            'email' => 'required',
        ],[
            'name.required' => 'Nama admin tidak boleh kosong!',
            'telepon.required' => 'Nomor telepon tidak boleh kosong!',
            'alamat.required' => 'Alamat admin tidak boleh kosong!',
            'email.required' => 'Email admin tidak boleh kosong!',
        ]);

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'mimes:jpeg,jpg,png,gif',
            ]);

            $foto_file = $request->file('image');
            $filePath = public_path('global/user/');
            $foto_ekstensi = $foto_file->extension();
            $foto_nama = date('ymdhis') . "." . $foto_ekstensi;
            $foto_file->move($filePath, $foto_nama);

            $user = User::find($id);
            $user->image = $foto_nama;
            $user->save();
        }

        $user = User::find($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->telepon = $request->telepon;
        $user->alamat = $request->alamat;
        $user->email = $request->email;
        $user->save();

        return redirect('admin')->with('success', 'Data Admin berhasil di edit');
    }

    public function tambahAdmin(){
        return view('admin.t_admin');
    }

    public function aksitambah(Request $request)
    {
        $foto_file = $request->file('image');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis') . "." . $foto_ekstensi;
        $foto_file->move(public_path('global/user/'), $foto_nama);

        User::Create([
            'name' => $request->name,
            'username' => $request->username,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'role' => 1,
            'image' => $foto_nama,
        ]);
        return redirect('admin')->with('success', 'Data Berhasil di ditambahkan');;
    }

    public function destroy($id)
    {
        $user = User::findorfail($id);
        $user->delete();;
        return redirect()->back()->with('success', 'Data Berhasil di dihapus');
    }

    public function dataUser()
    {
        $user = User::all();
        return view('admin.user',compact(['user']));
    }

    public function editProfil(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
            'email' => 'required',
        ],[
            'name.required' => 'Nama anda tidak boleh kosong!',
            'username.required' => 'Username anda tidak boleh kosong!',
            'telepon.required' => 'Nomor telepon anda tidak boleh kosong!',
            'alamat.required' => 'Alamat anda tidak boleh kosong!',
            'email.required' => 'Email anda tidak boleh kosong!',
        ]);

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'mimes:jpeg,jpg,png,gif',
            ]);

            $foto_file = $request->file('image');
            $filePath = public_path('global/user/');
            $foto_ekstensi = $foto_file->extension();
            $foto_nama = date('ymdhis') . "." . $foto_ekstensi;
            $foto_file->move($filePath, $foto_nama);

            $user = User::find($id);
            $user->image = $foto_nama;
            $user->save();
        }

        $user = User::find($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->telepon = $request->telepon;
        $user->alamat = $request->alamat;
        $user->email = $request->email;
        $user->save();

        return redirect('profile/{id}')->with('success', 'Data Anda telah berhasil di edit');
    }

    public function gantiPassword(Request $request,$id)
    {
        $request->validate([
            'password' => 'required',
        ]);

        $user = Auth::user();
        if (!Hash::check($request->input('current_pw'), $user->password)) {
            return redirect('profile/{id}')->with('error', 'Password lama Anda salah!');
        }
        if ($request->password == $request->input('confirmpw')) {
            $user = User::find($id);
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect('profile/{id}')->with('success', 'Password Anda telah berhasil dirubah!');
        }else{
            return redirect('profile/{id}')->with('error', 'Konfirmasi password salah!');
        }

    }

    public function editProfilU(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
            'email' => 'required',
        ],[
            'name.required' => 'Nama anda tidak boleh kosong!',
            'username.required' => 'Username anda tidak boleh kosong!',
            'telepon.required' => 'Nomor telepon anda tidak boleh kosong!',
            'alamat.required' => 'Alamat anda tidak boleh kosong!',
            'email.required' => 'Email anda tidak boleh kosong!',
        ]);

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'mimes:jpeg,jpg,png,gif',
            ]);

            $foto_file = $request->file('image');
            $filePath = public_path('global/user/');
            $foto_ekstensi = $foto_file->extension();
            $foto_nama = date('ymdhis') . "." . $foto_ekstensi;
            $foto_file->move($filePath, $foto_nama);

            $user = User::find($id);
            $user->image = $foto_nama;
            $user->save();
        }

        $user = User::find($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->telepon = $request->telepon;
        $user->alamat = $request->alamat;
        $user->email = $request->email;
        $user->save();

        return redirect('profileuser/{id}')->with('success', 'Data Anda telah berhasil di edit');
    }

    public function gantiPasswordU(Request $request,$id)
    {
        $request->validate([
            'password' => 'required',
        ]);

        $user = Auth::user();
        if (!Hash::check($request->input('current_pw'), $user->password)) {
            return redirect('profileuser/{id}')->with('error', 'Password lama Anda salah!');
        }
        if ($request->password == $request->input('confirmpw')) {
            $user = User::find($id);
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect('profileuser/{id}')->with('success', 'Password Anda telah berhasil dirubah!');
        }else{
            return redirect('profileuser/{id}')->with('error', 'Konfirmasi password salah!');
        }

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('index')->with('logout', 'Anda telah Logout');
    }
}
