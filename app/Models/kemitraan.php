<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kemitraan extends Model
{
    use HasFactory;

    protected $table = 'kemitraan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
        'logo',
        'program',
        'created_by',
        'updated_by',
        'active',
    ];
}
