<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    use HasFactory;
    protected $table = 'laptops';
protected $fillable = ['merk_laptop', 'spesifikasi_laptop', 'stok_laptop', 'harga_laptop', 'image_path'];
}
