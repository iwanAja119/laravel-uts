<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_satuan',
    ];
    protected $table = 'satuan';

    public function barangs()
    {
        return $this->hasMany(Barang::class, 'satuan_barang_id');
    }
}
