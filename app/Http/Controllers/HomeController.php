<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index(){
//        dd(Auth::check());
        $totalBarang = barang::count();
        $totalStok = barang::sum('stok');
        $totalRokok = barang::where('jenis_barang', 'rokok')->sum('stok');
        $totalSabun = barang::where('jenis_barang', 'sabun')->sum('stok');
        $totalMakanan = barang::where('jenis_barang', 'makanan')->sum('stok');

        return view('welcome', compact('totalBarang', 'totalStok', 'totalRokok', 'totalSabun', 'totalMakanan'));
    }
}
