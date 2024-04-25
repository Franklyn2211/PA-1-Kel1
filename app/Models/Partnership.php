<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partnership extends Model
{
    use HasFactory;

    protected $table = 'partnerships';

    protected $fillable = [
        'Name',
        'Logo',
        'Program',
        'Created_by',
        'Updated_by',
        'Active'
    ];
}
