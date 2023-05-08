<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('produk.index')->with([
            'produk' => Produk::all(),
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
        $produk = Produk::all();
        $kategori = Kategori::all();
        return view('produk.t_produk',compact(['produk','kategori']));
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
            'category_id' => 'required',
            'product_name' => 'required',
            'product_price' => 'required',
            'product_description' => 'required',
            'product_image' => 'required|mimes:jpeg,jpg,png,gif',
            'product_status' => 'required',
        ],[
            'category_id.required' => 'Jenis Kategori Harus Dipilih!',
            'product_name.required' => 'Nama Produk Harus Diisi!',
            'product_price.required' => 'Harga Produk Harus Diisi!',
            'product_description.required' => 'Deskripsi Produk Harus Diisi!',
            'product_image.required' => 'Gambar Produk Harus Diisi!',
            'product_status.required' => 'Status Produk Harus Diisi!',
            'product_image.mimes' => 'Tipe Gambar Harus Berupa jpeg,jpg,png,gif'
        ]);

        $foto_file = $request->file('product_image');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis') . "." . $foto_ekstensi;
        $foto_file->move(public_path('global/produk/'), $foto_nama);

        $produk = new Produk;
        $produk->category_id = $request->category_id;
        $produk->product_name = $request->product_name;
        $produk->product_price = $request->product_price;
        $produk->product_description = $request->product_description;
        $produk->product_image = $foto_nama;
        $produk->product_status = $request->product_status;
        $produk->save();

        return to_route('produk.index')->with('success','Data Berhasil di Tambah.');
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
        $kategori = Kategori::all();
        return view('produk.e_produk',compact(['kategori']))->with([
            'produk' => Produk::find($id),
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
            'category_id' => 'required',
            'product_name' => 'required',
            'product_price' => 'required',
            'product_description' => 'required',
            'product_status' => 'required',
        ],[
            'category_id.required' => 'Jenis Kategori Harus Dipilih!',
            'product_name.required' => 'Nama Produk Harus Diisi!',
            'product_price.required' => 'Harga Produk Harus Diisi!',
            'product_description.required' => 'Deskripsi Produk Harus Diisi!',
            'product_status.required' => 'Status Produk Harus Diisi!',
        ]);

        if ($request->hasFile('product_image')) {
            $request->validate([
                'product_image' => 'mimes:jpeg,jpg,png,gif',
            ],[
                'product_image.mimes' => 'Tipe Gambar Harus Berupa jpeg,jpg,png,gif'
            ]);

            $foto_file = $request->file('product_image');
            $filePath = public_path('global/produk/');
            $foto_ekstensi = $foto_file->extension();
            $foto_nama = date('ymdhis') . "." . $foto_ekstensi;
            $foto_file->move($filePath, $foto_nama);

            $produk = Produk::find($id);
            $produk->product_image = $foto_nama;
            $produk->save();
        }

        $produk = Produk::find($id);
        $produk->category_id = $request->category_id;
        $produk->product_name = $request->product_name;
        $produk->product_price = $request->product_price;
        $produk->product_description = $request->product_description;
        $produk->product_status = $request->product_status;
        $produk->save();

        return to_route('produk.index')->with('success','Data Berhasil di Edit.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::find($id);
        $produk->delete();

        return back()->with('success','Data Berhasil di Hapus!.');
    }
}
