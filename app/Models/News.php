<?php

namespace App\Models;

use App\Models\NewsCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    protected $primaryKey = 'id_news';
    public $incrementing = false;

    protected $fillable = [
        'id_news',
        'title',
        'slug', // Menambahkan kolom slug
        'location',
        'date',
        'photo',
        'news_category_id',
        'description',
        'created_by',
        'updated_by',
        'active',
        'total_visitors', // Menambahkan kolom total pengunjung
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    public static function generateNextId()
    {
        // Mendapatkan ID terakhir dari database
        $latestId = self::orderBy('id_news', 'desc')->first();

        // Mengambil nomor dari ID terakhir
        $lastNumber = $latestId ? intval(substr($latestId->id_news, 1)) : 0;

        // Menambahkan 1 untuk mendapatkan nomor berikutnya
        $nextNumber = $lastNumber + 1;

        // Mengonversi nomor berikutnya ke format yang diinginkan (NXX)
        $nextId = 'N' . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);

        return $nextId;
    }

    public function category()
    {
        return $this->belongsTo(NewsCategory::class, 'news_category_id');
    }

    public static function boot()
    {
        parent::boot();

        // Generate slug before saving
        static::creating(function ($news) {
            $news->slug = Str::slug($news->title); // Generate slug from title
        });
    }
}
