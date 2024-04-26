<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement_category extends Model
{
    use HasFactory;
    protected $table = 'announcement_categories';
    protected $primaryKey = 'id_announcement_categories';
    public $incrementing = false;
    protected $fillable = [
        'id_announcement_categories',
        'name',
        'description',
        'created_by',
        'updated_by',
        'active',
    ];
    protected $casts = [
        'active' => 'boolean',
    ];
    public static function generateNextId(){
        $latestId = self::orderBy('id_announcement_categories', 'desc')->first();

        // Mengambil nomor dari ID terakhir
        $lastNumber = $latestId ? intval(substr($latestId->id_announcement_categories, 1)) : 0;

        // Menambahkan 1 untuk mendapatkan nomor berikutnya
        $nextNumber = $lastNumber + 1;

        // Mengonversi nomor berikutnya ke format yang diinginkan (NXX)
        $nextId = 'AC' . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);

        return $nextId;
    }
}
