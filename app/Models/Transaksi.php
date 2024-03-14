<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = ['id_transaksi','id_user', 'total'];
    protected $hidden = ['created_at', 'updated_at'];
    protected $table = "transaksi";
    protected $primaryKey = 'id_transaksi';
}
