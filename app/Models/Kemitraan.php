<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kemitraan extends Model
{
    use HasFactory;

    protected $table = 'partnership';
    protected $primaryKey = 'id_partnership';
    public $incrementing = false;

    protected $fillable = [
        'id_partnership',
        'name',
        'logo',
        'program',
        'created_by',
        'updated_by',
        'active',
    ];
    protected $casts = [
        'active' => 'boolean',
    ];
    public static function generateNextId(){
        $latestId = self::orderBy('id_partnership', 'desc')->first();

        // Mengambil nomor dari ID terakhir
        $lastNumber = $latestId ? intval(substr($latestId->id_partnership, 1)) : 0;

        // Menambahkan 1 untuk mendapatkan nomor berikutnya
        $nextNumber = $lastNumber + 1;

        // Mengonversi nomor berikutnya ke format yang diinginkan (NXX)
        $nextId = 'P' . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);

        return $nextId;
    }
}
