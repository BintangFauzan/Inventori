<?php

namespace App\Http\Controllers;

use App\Models\PembelianBarang;
use App\Models\Pembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    public function index()
    {
        $pembelian = Pembelian::query()->latest()->paginate(10); // Ambil semua data pembelian
        return view('pembelian.history', compact('pembelian'));
    }
}
