<?php

namespace App\Models;

use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Riwayat extends Model
{
    use HasFactory;
    protected $table = 'riwayats';
    protected $fillable = ['id_transaksi', 'id_user', 'nama_user_r', 'merk_laptop_r', 'harga_laptop_r', 'jumlah_laptop_r', 'total_harga_r'];

    public function transaksi(): BelongsTo
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi');
    }

    public function transaksiName(): BelongsTo
    {
        return $this->belongsTo(Transaksi::class, 'merk_laptop_r');
    }

    public function transaksiPrice(): BelongsTo
    {
        return $this->belongsTo(Transaksi::class, 'harga_laptop_r');
    }

    public function transaksiJumlah(): BelongsTo
    {
        return $this->belongsTo(Transaksi::class, 'jumlah_laptop_r');
    }

    public function transaksiTotalHarga(): BelongsTo
    {
        return $this->belongsTo(Transaksi::class, 'total_harga_r');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
