<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;

    protected $table = 'kontak';
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'email', 'phone', 'message', 'created_by', 'updated_by', 'active'];
}
