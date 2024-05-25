<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $table = 'programs'; // Perbaikan nama properti dari $tabel ke $table
    protected $primaryKey = 'id_programs'; // Perbaikan nama properti dari $primarykey ke $primaryKey
    public $incrementing = false;

    protected $fillable = [
        'id_programs',
        'program_title',
        'Description',
        'Created_by',
        'Updated_by',
        'Active',
    ];

    protected $casts = [
        'Active' => 'boolean',
    ];

    public static function generateNextId()
    {
        // Mendapatkan ID terakhir dari database
        $latestId = self::orderBy('id_programs', 'desc')->first();

        // Mengambil nomor dari ID terakhir
        $lastNumber = $latestId ? intval(substr($latestId->id_programs, 2)) : 0;

        // Menambahkan 1 untuk mendapatkan nomor berikutnya
        $nextNumber = $lastNumber + 1;

        // Mengonversi nomor berikutnya ke format yang diinginkan (NXX)
        $nextId = 'OR' . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);

        return $nextId;
    }
}
