<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;
    protected $table = 'announcements';
    protected $primaryKey = 'id_announcements';
    public $incrementing = false;

    protected $fillable = [
        'id_announcements',
        'title',
        'photo',
        'location',
        'description',
        'announcement_category_id',
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
    $latestId = self::orderBy('id_announcements', 'desc')->first();

    // Mengambil nomor dari ID terakhir
    $lastNumber = $latestId ? intval(substr($latestId->id_announcements, 1)) : 0;

    // Menambahkan 1 untuk mendapatkan nomor berikutnya
    $nextNumber = $lastNumber + 1;

    // Mengonversi nomor berikutnya ke format yang diinginkan (NXX)
    $nextId = 'A' . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);

    return $nextId;
}


    public function category()
    {
        return $this->belongsTo(Announcement_category::class, 'announcement_category_id');
    }
}
