<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relawan extends Model
{
    use HasFactory;

    protected $table = 'relawan';
    protected $primaryKey = 'id_relawan';
    public $incrementing = false;

    protected $fillable = [
        'id_relawan',
        'nama_relawan',
        'email',
        'no_hp',
        'tanggallahir',
        'lokasi',
        'cv',
        'created_by',
        'updated_by',
        'active',
    ];

    protected $casts = [
        'tanggallahir' => 'date',
        'active' => 'boolean',
    ];

    public static function generateNextId()
{
    // Mendapatkan ID terakhir dari database
    $latestId = self::orderBy('id_relawan', 'desc')->first();

    // Mengambil nomor dari ID terakhir
    $lastNumber = $latestId ? intval(substr($latestId->id_relawan, 1)) : 0;

    // Menambahkan 1 untuk mendapatkan nomor berikutnya
    $nextNumber = $lastNumber + 1;

    // Mengonversi nomor berikutnya ke format yang diinginkan (NXX)
    $nextId = 'R' . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);

    return $nextId;
}

}
