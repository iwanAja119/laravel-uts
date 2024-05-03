<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nama_barang',
        'harga_barang',
        'deskripsi_barang',
        'satuan_barang_id',
    ];
    protected $table = 'barang';

    public function satuan()
    {
        return $this->belongsTo(Satuan::class, 'satuan_barang_id');
    }
}
