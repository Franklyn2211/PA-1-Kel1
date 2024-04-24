<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'volunteer';
    protected $fillable = ['nama', 'email', 'jumlah_donasi', 'gender', 'created_by', 'updated_by', 'active'];
}

