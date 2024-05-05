<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_yayasan extends Model
{
    protected $primaryKey = 'id_foundation_data';
    protected $table = 'foundation_data';
    public $incrementing = false;

    protected $fillable = [
        'id_foundation_data',
        'foundation_name',
        'history',
        'visi',
        'misi',
        'created_by',
        'updated_by',
        'active',
    ];
    protected $casts = [
        'active' => 'boolean',
    ];

    public static function generateNextId(){
        $latestId = self::orderBy('id_foundation_data', 'desc')->first();

        // Mengambil nomor dari ID terakhir
        $lastNumber = $latestId ? intval(substr($latestId->id_foundation_data, 2)) : 0;

        // Menambahkan 1 untuk mendapatkan nomor berikutnya
        $nextNumber = $lastNumber + 1;

        // Mengonversi nomor berikutnya ke format yang diinginkan (NXX)
        $nextId = 'FD' . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);

        return $nextId;
    }
}
