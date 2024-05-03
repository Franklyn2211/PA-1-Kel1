<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StafPegawai extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_staff';
    protected $table = 'staff';
    public $incrementing = false;
    protected $fillable = [
        'id_staff',
        'name',
        'age',
        'date_joined',
        'job_title',
        'photo',
        'created_by',
        'updated_by',
        'active',
    ];
    protected $casts = [
        'active' => 'boolean',
    ];

    public static function generateNextId(){
        $latestId = self::orderBy('id_staff', 'desc')->first();

        // Mengambil nomor dari ID terakhir
        $lastNumber = $latestId ? intval(substr($latestId->id_staff, 2)) : 0;

        // Menambahkan 1 untuk mendapatkan nomor berikutnya
        $nextNumber = $lastNumber + 1;

        // Mengonversi nomor berikutnya ke format yang diinginkan (NXX)
        $nextId = 'S' . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);

        return $nextId;
    }
}
