<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPelita extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'mandarin',
        'jenis_kelamin',
        'umur',
        'alamat',
        'kota',
        'telp',
        'hp',
        'email',
        'tgl_mohonTao',
        'keterangan',
        'cabang_id'
    ];

    public function cabang()
    {
        return $this->belongsTo(Cabang::class);
    }
    

}
