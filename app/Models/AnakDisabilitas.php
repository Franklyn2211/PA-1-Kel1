<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnakDisabilitas extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_child_with_disabilities';
    protected $table = 'child_with_disabilities';
    public $incrementing = false;
    protected $fillable = [
        'id_child_with_disabilities',
        'name',
        'date_of_birth',
        'gender',
        'date_joined',
        'created_by',
        'updated_by',
        'active',
    ];
protected $casts = [
    'active' => 'boolean',
];

public static function generateNextId(){
    $latestId = self::orderBy('id_child_with_disabilities', 'desc')->first();

    // Mengambil nomor dari ID terakhir
    $lastNumber = $latestId ? intval(substr($latestId->id_child_with_disabilities, 3)) : 0;

    // Menambahkan 1 untuk mendapatkan nomor berikutnya
    $nextNumber = $lastNumber + 1;

    // Mengonversi nomor berikutnya ke format yang diinginkan (NXX)
    $nextId = 'CWD' . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);

    return $nextId;
}
}
