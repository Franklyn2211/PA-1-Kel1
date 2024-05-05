<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contact';
    protected $primaryKey = 'id_contact';
    public $incrementing = false;

    protected $fillable = [
        'id_contact', 
        'name',
        'email',
        'phone_number',
        'message',
        'created_by',
        'updated_by',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    public static function generateNextId()
    {
        // Mendapatkan ID terakhir dari database
        $latestId = self::orderBy('id_contact', 'desc')->first();

        // Mengambil nomor dari ID terakhir
        $lastNumber = $latestId ? intval(substr($latestId->id_contact, 1)) : 0;

        // Menambahkan 1 untuk mendapatkan nomor berikutnya
        $nextNumber = $lastNumber + 1;

        // Mengonversi nomor berikutnya ke format yang diinginkan (CXX)
        $nextId = 'C' . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);

        return $nextId;
    }
}
