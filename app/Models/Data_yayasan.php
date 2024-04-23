<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_yayasan extends Model
{
    protected $primaryKey = 'id_data_yayasans';

    protected $fillable = [
        'nama_yayasan',
        'singkatan_nama_yayasan',
        'sejarah',
        'visi',
        'misi',
        'logo_yayasan',
        'created_by',
        'updated_by',
        'active',
    ];
}
