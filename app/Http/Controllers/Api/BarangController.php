<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BarangResource;
use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index(){
        $barang = Barang::query()->latest()->paginate(20);
        return new BarangResource($barang, true, "Seluruh Barang");
    }

    public function store(Request $request){
        try {
            $request->validate([
                "nama_barang" => "required|max:20",
                "jenis_barang" => "required|in:rokok,sabun,makanan",
                "stok" => "required|max:20",
                "harga" => "required|max:500000",
            ],
                [
                    "nama_barang" => "Nama Barang harus diisi",
                    "jenis_barang" => "Jenis Barang harus diisi",
                    "stok" => "Stok Barang harus diisi",
                    "harga" => "Harga Barang harus diisi",
                ]
            );

            $barang = new Barang();
            $barang->nama_barang = $request->nama_barang;
            $barang->jenis_barang = $request->jenis_barang;
            $barang->stok = $request->stok;
            $barang->harga = $request->harga;
            $barang->save();

            return new BarangResource($barang, true, "insert berhasil");
        }catch (\Exception $e){
            return response()->json(
                [
                "status" => false,
                "message" => "Gagal menyimpan data!",
                    "error" => $e->getMessage()
                ],422
            );
        }
    }

    public function show($id){
        $barang = Barang::find($id);
        return new BarangResource($barang, true, "Barang dari ID");
    }

    public function update(Request $request, $id){
        try {
            $validator = $request->validate([
                "nama_barang" => "required|max:20",
                "jenis_barang" => "required|in:rokok,sabun,makanan",
                "stok" => "required|max:20",
                "harga" => "required|max:500000",
            ],
                [
                    "nama_barang" => "Nama Barang harus diisi",
                    "jenis_barang" => "Jenis Barang harus diisi",
                    "stok" => "Stok Barang harus diisi",
                    "harga" => "Harga Barang harus diisi",
                ]
            );

            $barang = Barang::findOrFail($id);
            $barang->update($validator);

            return new BarangResource(true, "Update Barang Berhasil", $barang);
        }catch (\Exception $e){
            return response()->json(
                ["status" => false,
                    "message" => "Gagal mengupdate data!",
                    "error" => $e->getMessage()
                ], 422);
        }

    }

    public function destroy($id){
        $barang = Barang::find($id);

        $barang->delete();

        return new BarangResource($barang, true, "Delete Barang Berhasil");
    }

}
