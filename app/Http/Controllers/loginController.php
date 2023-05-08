<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    public function login()
    {

        if($user = Auth::user()){
            if($user -> role == '1'){
                return redirect('dashboard');
            }elseif($user -> role == '2'){
                return redirect('');
            }
        }

        return view('index');
    }

    public function aksilogin(request $request)
    {
        $data = [
            'username' => $request->username,
            'password'=> $request->password,
        ];

        if(Auth::attempt($data)) {
            $request->session()->regenerate();
            $user1 = Auth::user();
            if ($user1 -> role == '1') {
                return redirect('dashboard');
            }else if($user1 -> role =='2'){
                return redirect('');
            }
        }else{
            return redirect('index')->withErrors('');
        }

        return redirect()->intended('index');
    }

    public function register()
    {
       return view('register');
    }

    public function aksiregister(Request $request)
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
            'image' => $foto_nama,
        ]);
        return view('index');
    }
}
