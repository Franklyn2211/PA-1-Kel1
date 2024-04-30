<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hero_Section extends Model
{
    protected $primaryKey = 'id_hero__sections';
protected $table = 'hero__sections';
public $incrementing = false;

    protected $fillable = [
        'id_hero__sections',
        'header',
        'paragraph',
        'bg_image',
        'created_by',
        'updated_by',
        'active',
    ];
    protected $casts = [
        'active' => 'boolean',
    ];

    public static function generateNextId(){
        $latestId = self::orderBy('id_hero__sections', 'desc')->first();

        // Mengambil nomor dari ID terakhir
        $lastNumber = $latestId ? intval(substr($latestId->id_hero__sections, 1)) : 0;

        // Menambahkan 1 untuk mendapatkan nomor berikutnya
        $nextNumber = $lastNumber + 1;

        // Mengonversi nomor berikutnya ke format yang diinginkan (NXX)
        $nextId = 'HS' . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);

        return $nextId;
    }
}
