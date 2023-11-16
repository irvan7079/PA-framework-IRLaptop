<?php

namespace App\Models;

use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Laptop extends Model
{
    use HasFactory;
    protected $table = 'laptops';
    protected $fillable = ['merk_laptop', 'spesifikasi_laptop', 'stok_laptop', 'harga_laptop', 'image_path'];
    public function transaksi(): HasMany
    {
        return $this->hasMany(Transaksi::class);
    }
}
