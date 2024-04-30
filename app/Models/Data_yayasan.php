<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_yayasan extends Model
{
    protected $primaryKey = 'id_data_yayasans';
    protected $table = 'data_yayasans';
    public $incrementing = false;

    protected $fillable = [
        'id_data_yayasans',
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
    protected $casts = [
        'active' => 'boolean',
    ];

    public static function generateNextId(){
        $latestId = self::orderBy('id_data_yayasans', 'desc')->first();

        // Mengambil nomor dari ID terakhir
        $lastNumber = $latestId ? intval(substr($latestId->id_data_yayasans, 1)) : 0;

        // Menambahkan 1 untuk mendapatkan nomor berikutnya
        $nextNumber = $lastNumber + 1;

        // Mengonversi nomor berikutnya ke format yang diinginkan (NXX)
        $nextId = 'DY' . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);

        return $nextId;
    }
}
