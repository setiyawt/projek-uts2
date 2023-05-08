<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kategori.index')->with([
            'kategori' => Kategori::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.t_kategori');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'category_image' => 'mimes:jpeg,jpg,png,gif'
        ],[
            'category_name.required' => 'Nama Kategori Harus diisi!',
            'category_image.mimes' => 'Foto harus dalam format jpeg,jpg,png,gif!'
        ]);

        $foto_file = $request->file('category_image');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis') . "." . $foto_ekstensi;
        $foto_file->move(public_path('global/kategori/'), $foto_nama);

        $kategori = new Kategori;
        $kategori->category_name = $request->category_name;
        $kategori->category_image = $foto_nama;
        $kategori->save();

        return to_route('kategori.index')->with('success','Data Berhasil di Tambah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('kategori.e_kategori')->with([
           'kategori' => Kategori::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required',
        ],[
            'category_name.required' => 'Nama Kategori tidak boleh menjadi kosong!',
        ]);

        if ($request->hasFile('category_image')) {
            $request->validate([
                'category_image' => 'mimes:jpeg,jpg,png,gif',
            ],[
                'category_image.mimes' => 'Foto harus dalam format jpeg,jpg,png,gif!'
            ]);

            $foto_file = $request->file('category_image');
            $filePath = public_path('global/kategori/');
            $foto_ekstensi = $foto_file->extension();
            $foto_nama = date('ymdhis') . "." . $foto_ekstensi;
            $foto_file->move($filePath, $foto_nama);

            $kategori = Kategori::find($id);
            $kategori->category_image = $foto_nama;
            $kategori->save();
        }

        $kategori = Kategori::find($id);
        $kategori->category_name = $request->category_name;
        $kategori->save();

        return to_route('kategori.index')->with('success','Data Berhasil di Edit.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();

        return back()->with('success','Data Berhasil di Hapus!.');
    }
}
