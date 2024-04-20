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
        $latestId = self::orderBy('id_news_categories', 'desc')->first();

        if ($latestId) {
            $number = intval(substr($latestId->id_news_categories, 2)) + 1;
        } else {
            $number = 1;
        }

        $nextId = 'NC' . str_pad($number, 2, '0', STR_PAD_LEFT);

        return $nextId;
    }
}
