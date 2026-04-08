<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'tblproducts';  // hubungkan ke tabel yang benar
    protected $fillable = ['nama', 'deskripsi', 'foto', 'harga'];
}