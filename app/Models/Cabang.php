<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_id',
        'negara',
        'kota',
        'daerah'
    ];

    public function datapelita()
    {
        return $this->hasMany(DataPelita::class);
    }
    public function kota()
    {
        return $this->belongsTo(Kota::class);
    }
}
