<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donate extends Model
{
    use HasFactory;

    protected $table = 'donates';
    protected $primaryKey = 'id_donate';
    public $incrementing = false;

    protected $fillable = [
        'id_donate', // tambahkan 'id_donate' ke dalam $fillable
        'Name',
        'Email',
        'Phone_number',
        'donation_amount',
        'evidence_of_transfer',
        'Description',
        'created_by',
        'updated_by',
        'Active',
    ];

    protected $casts = [
        'Active' => 'boolean',
    ];

    public static function generateNextId()
{
    // Mendapatkan ID terakhir dari database
    $latestId = self::orderBy('id_donate', 'desc')->first();

    // Mengambil nomor dari ID terakhir
    $lastNumber = $latestId ? intval(substr($latestId->id_donate, 1)) : 0;

    // Menambahkan 1 untuk mendapatkan nomor berikutnya
    $nextNumber = $lastNumber + 1;

    // Mengonversi nomor berikutnya ke format yang diinginkan (NXX)
    $nextId = 'D' . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);

    return $nextId;
}

}
