<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;

    protected $table = 'sponsor';

    protected $primaryKey = 'id';

    protected $fillable = [
        'Name', 'poto', 'Description', 'created_by', 'updated_by', 'Active',
    ];

    protected $casts = [
        'Active' => 'boolean',
    ];

    public $timestamps = true;
}
