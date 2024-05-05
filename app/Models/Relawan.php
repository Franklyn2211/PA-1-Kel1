<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relawan extends Model
{

    use HasFactory;

    protected $table = 'volunteers';
    protected $primaryKey = 'id_volunteers';
    public $incrementing = false;

    protected $fillable = [
        'id_volunteers',
        'name',
        'email',
        'phone_number',
        'date_of_birth',
        'location',
        'cv',
        'created_by',
        'updated_by',
        'active',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'active' => 'boolean',
    ];

    public static function generateNextId()
{
    // Mendapatkan ID terakhir dari database
    $latestId = self::orderBy('id_volunteers', 'desc')->first();

    // Mengambil nomor dari ID terakhir
    $lastNumber = $latestId ? intval(substr($latestId->id_volunteers, 1)) : 0;

    // Menambahkan 1 untuk mendapatkan nomor berikutnya
    $nextNumber = $lastNumber + 1;

    // Mengonversi nomor berikutnya ke format yang diinginkan (VXX)
    $nextId = 'V' . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);

    return $nextId;
}

}
