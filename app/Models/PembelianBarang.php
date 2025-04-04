<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianBarang extends Model
{
    use HasFactory;
    protected $fillable = [
        'barang_id',
        'jumlah_beli',
        'total_harga'
    ];
    public function barang()
    {
        return $this->belongsTo(barang::class);
    }
}
