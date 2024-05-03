<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnakSekolahInformal extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_informal_school_child';
    protected $table = 'informal_school_child';
    public $incrementing = false;
    protected $fillable = [
        'id_informal_school_child',
        'name',
        'age',
        'date_joined',
        'created_by',
        'updated_by',
        'active',
    ];
protected $casts = [
    'active' => 'boolean',
];

public static function generateNextId(){
    $latestId = self::orderBy('id_informal_school_child', 'desc')->first();

    // Mengambil nomor dari ID terakhir
    $lastNumber = $latestId ? intval(substr($latestId->id_informal_school_child, 3)) : 0;

    // Menambahkan 1 untuk mendapatkan nomor berikutnya
    $nextNumber = $lastNumber + 1;

    // Mengonversi nomor berikutnya ke format yang diinginkan (NXX)
    $nextId = 'ISC' . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);

    return $nextId;
}
}
