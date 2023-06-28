<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $fillable = [
        'pasien_id',
        'total_harga',
    ];

    public function resep_obat()
    {
        return $this->belongsTo(resep_obat::class);
    }
}
