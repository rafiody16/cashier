<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailTransaksi extends Model
{
    protected $fillable = ['id_detail_transaksi','id_transaksi', 'id_produk', 'quantity', 'harga_bayar'];
    protected $hidden = ['created_at', 'updated_at'];
    protected $table = "detail_transaksi";
    protected $primaryKey = 'id_detail_transaksi';
}
