<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resep_obat extends Model
{
    use HasFactory;
    protected $table = 'resep_obat';
    protected $fillable = [
        'obat_id',
        'pasien_id',
        'keterangan',
    ];

    public function obat()
    {
        return $this->belongsTo(obat::class);
    }

    public function pasien()
    {
        return $this->belongsTo(pasien::class);
    }
}
