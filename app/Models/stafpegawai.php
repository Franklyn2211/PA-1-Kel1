<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StafPegawai extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_stafpegawai';
    protected $table = 'stafpegawai';
    public $incrementing = false;
    protected $fillable = [
        'id_stafpegawai',
        'nama',
        'umur',
        'tanggal_bergabung',
        'jabatan',
        'created_by',
        'updated_by',
        'active',
    ];
    protected $casts = [
        'active' => 'boolean',
    ];

    public static function generateNextId(){
        $latestId = self::orderBy('id_stafpegawai', 'desc')->first();

        // Mengambil nomor dari ID terakhir
        $lastNumber = $latestId ? intval(substr($latestId->id_stafpegawai, 1)) : 0;

        // Menambahkan 1 untuk mendapatkan nomor berikutnya
        $nextNumber = $lastNumber + 1;

        // Mengonversi nomor berikutnya ke format yang diinginkan (NXX)
        $nextId = 'SP' . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);

        return $nextId;
    }
}
