<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $table = 'kamar';
    public $timestamps = false;

    protected $fillable = [
        'nama_kamar', 'tipe', 'ukuran', 'harga', 'fasilitas', 'gambar',
    ];

    // pengganti fungsi rupiah() -> dipakai: $k->harga_rupiah
    protected function hargaRupiah(): Attribute
    {
        return Attribute::make(
            get: fn () => 'Rp' . number_format($this->harga, 0, ',', '.')
        );
    }

    // pengganti array_filter(explode(...)) -> dipakai: $k->daftar_fasilitas
    protected function daftarFasilitas(): Attribute
    {
        return Attribute::make(
            get: fn () => array_filter(array_map('trim', explode(',', $this->fasilitas ?? '')))
        );
    }
}