<?php

namespace App\Models;
use App\Models\NewsCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    protected $primaryKey = 'id_news';
    public $incrementing = false;

    protected $fillable = [
        'id_news',
        'title',  
        'location',
        'tanggal',
        'photo',
        'description',
        'created_by',
        'updated_by',
        'active', 
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    public static function generateNextId()
    {
        $latestId = self::orderBy('id_news', 'desc')->first();

        if ($latestId) {
            $number = intval(substr($latestId->id_news, 2)) + 1;
        } else {
            $number = 1;
        }

        $nextId = 'N' . str_pad($number, 2, '0', STR_PAD_LEFT);

        return $nextId;
    }

    public function category()
    {
        return $this->belongsTo(NewsCategory::class, 'news_category_id');
    }
}
