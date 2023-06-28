<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class obat extends Model
{
    use HasFactory;
    protected $table = 'obat';
    protected $fillable = [
        'nama_obat',
        'harga_obat',
        'stok_obat',
    ];

    public function resep_obat()
    {
        return $this->hasMany(resep_obat::class);
    }

    
}
