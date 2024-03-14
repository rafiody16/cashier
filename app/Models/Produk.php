<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = ['id_produk','nama_produk', 'kategori_produk', 'harga_produk', 'stok'];
    protected $hidden = ['created_at', 'updated_at'];
    protected $table = "produk";
    protected $primaryKey = 'id_produk';
}
