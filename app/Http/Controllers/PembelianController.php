<?php

namespace App\Http\Controllers;

use App\Models\Barang; // Pastikan nama model sesuai dengan konvensi
use App\Models\pembelian;
use App\Models\PembelianBarang; // Pastikan model ini ada
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\alert;

class PembelianController extends Controller
{
    public function index()
    {
        return view('pembelian.form', [
            'barang' => Barang::all() // Mengambil semua data barang
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah_beli' => 'required|integer|min:1',
        ],
        [
            'barang_id.required' => 'Barang harus dipilih',
            'jumlah_beli.required' => 'Jumlah beli harus diisi',
        ]);

        // Menghitung total harga (misalnya, ambil harga dari model Barang)
        $barang = Barang::find($request->barang_id);

        if ($barang->stok <= 0){
            return redirect()->back()->with('error', 'Stok barang tidak mencukupi');
        }

        // Menyimpan data pembelian
        $pembelian = new pembelian();
        $pembelian->barang_id = $request->barang_id;
        $pembelian->jumlah_beli = $request->jumlah_beli;
        $pembelian->total_harga = $barang->harga * $request->jumlah_beli;
        $pembelian->save();

        // Mengurangi stok barang
        $barang->stok -= $request->jumlah_beli;
        $barang->save();

        return redirect('/history');
    }

}
