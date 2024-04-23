<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hero_Section extends Model
{
    protected $primaryKey = 'id_hero__sections';

    protected $fillable = [
        'header',
        'paragraph',
        'bg_image',
    ];
}
