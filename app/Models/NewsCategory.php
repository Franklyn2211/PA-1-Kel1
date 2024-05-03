<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    use HasFactory;

    protected $table = 'news_categories';
    protected $primaryKey = 'id_news_categories';
    public $incrementing = false;

    protected $fillable = [
        'id_news_categories',
        'Name',
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
    $latestId = self::orderBy('id_news_categories', 'desc')->first();

    // Mengambil nomor dari ID terakhir
    $lastNumber = $latestId ? intval(substr($latestId->id_news_categories, 2)) : 0;

    // Menambahkan 1 untuk mendapatkan nomor berikutnya
    $nextNumber = $lastNumber + 1;

    // Mengonversi nomor berikutnya ke format yang diinginkan (NXX)
    $nextId = 'NC' . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);

    return $nextId;
}

}
