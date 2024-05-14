<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;

    protected $table = 'sponsor';

    protected $primaryKey = 'id_sponsor';
    public $incrementing = false;

    protected $fillable = [
        'id_sponsor',
        'Name',
        'photo',
        'Description',
        'created_by',
        'updated_by',
        'Active',
    ];

    protected $casts = [
        'Active' => 'boolean',
    ];
    public static function generateNextId(){
        $latestId = self::orderBy('id_sponsor', 'desc')->first();

        // Mengambil nomor dari ID terakhir
        $lastNumber = $latestId ? intval(substr($latestId->id_sponsor, 1)) : 0;

        // Menambahkan 1 untuk mendapatkan nomor berikutnya
        $nextNumber = $lastNumber + 1;

        // Mengonversi nomor berikutnya ke format yang diinginkan (NXX)
        $nextId = 'S' . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);

        return $nextId;
    }
}
