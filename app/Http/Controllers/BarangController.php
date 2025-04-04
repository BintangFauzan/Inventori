<?php

namespace App\Http\Controllers;

use App\Http\Requests\BarangRequest;
use App\Models\barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    //Untuk melihat keseluruhan data
    public function index(){
        $barangs = barang::query()->latest()->paginate(15);
        return view('barang.index', [
            'barangs' => $barangs
        ]);
    }

    //Form View penambahan
   public function create(){
        return view('barang.form');
   }

   //Data yang ditambahkan disimpan (store)
   public function store(Request $request){
        $request->validate([
            'nama_barang' => 'required|max:20',
            'jenis_barang' => 'required|in:rokok,sabun,makanan',
            'stok' => 'required|max:20',
            'harga' => 'required|max:500000',
        ],
        [
            'nama_barang.required' => 'Nama Barang harus diisi',
            'jenis_barang.required' => 'Jenis Barang harus diisi',
            'stok.required' => 'Stok harus diisi',
            'harga.required' => 'Harga harus diisi',
        ]);

        DB::table('barangs')->insert([
            'nama_barang'=>$request->nama_barang,
            'jenis_barang'=>$request->jenis_barang,
            'stok'=>$request->stok,
            'harga'=>$request->harga
        ]);
        return redirect('/barang');

   }
   //Edit
    public function edit(barang $barang){
        return view('barang.form', compact('barang'));
    }

    public function update(Request $request, barang $barang){
        $request->validate([
            'nama_barang' => 'required|max:20',
            'jenis_barang' => 'required|in:rokok,sabun,makanan',
            'stok' => 'required|max:20',
            'harga' => 'required|max:500000',
        ],
            [
                'nama_barang.required' => 'Nama Barang harus diisi',
                'jenis_barang.required' => 'Jenis Barang harus diisi',
                'stok.required' => 'Stok harus diisi',
                'harga.required' => 'Harga harus diisi',
            ]);
        $barang->update([
            'nama_barang' => $request->nama_barang,
            'jenis_barang' => $request->jenis_barang,
            'stok' => $request->stok,
            'harga' => $request->harga
        ]);

        return redirect('/barang');
    }

    //Hapus data barang
    public function destroy(barang $barang){
        $barang->delete();
        return redirect('/barang');
    }
}
