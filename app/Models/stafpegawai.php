<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StafPegawai extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'stafpegawai';
    protected $fillable = ['nama', 'umur', 'tanggal_bergabung', 'jabatan', 'created_by', 'updated_by', 'active'];
}
