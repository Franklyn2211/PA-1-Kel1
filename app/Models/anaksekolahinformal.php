<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnakSekolahInformal extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'anaksekolahinformal';
    protected $fillable = ['id','nama', 'umur', 'tanggal_bergabung', 'created_by', 'updated_by', 'active'];

    /**
     * Get the user that created the child with disability.
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the user that last updated the child with disability.
     */
    public function editor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
