<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pasien extends Model
{
    use HasFactory;
    protected $table = 'pasien';
    protected $fillable = [
        'nama_pasien',
        'alamat_pasien',
        'no_telp_pasien',
    ];

    public function resep_obat()
    {
        return $this->hasMany(resep_obat::class);
    }
}
