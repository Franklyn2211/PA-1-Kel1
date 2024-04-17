<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relawan extends Model
{
    use HasFactory;

    protected $table = 'relawan';
    protected $primaryKey = 'id_relawan';
    public $incrementing = false;

    protected $fillable = [
        'id_relawan',
        'nama_relawan',
        'email',
        'no_hp',
        'tanggallahir',
        'lokasi',
        'cv',
        'created_by',
        'updated_by',
        'active',
    ];

    protected $casts = [
        'tanggallahir' => 'date',
        'active' => 'boolean',
    ];

    public static function generateNextId()
    {
        $latestId = self::orderBy('id_relawan', 'desc')->first();

        if ($latestId) {
            $number = intval(substr($latestId->id_relawan, 1)) + 1;
        } else {
            $number = 1;
        }

        $nextId = 'R' . str_pad($number, 2, '0', STR_PAD_LEFT);

        return $nextId;
    }
}
