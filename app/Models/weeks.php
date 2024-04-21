<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class weeks extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phase_id',
    ];
    public function phase()
    {
        return $this->belongsTo(Phase::class);
    }
}