<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksis';
    protected $fillable = ['id_laptop', 'merk_laptop_t', 'harga_laptop_t', 'jumlah_laptop', 'total_harga'];

    public function laptop(): BelongsTo
    {
        return $this->belongsTo(Laptop::class, 'id_laptop');
    }

    public function laptopName(): BelongsTo
    {
        return $this->belongsTo(Laptop::class, 'merk_laptop_t');
    }

    public function laptopPrice(): BelongsTo
    {
        return $this->belongsTo(Laptop::class, 'harga_laptop_t');
    }

}
