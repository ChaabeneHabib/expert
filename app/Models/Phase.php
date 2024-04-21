<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phase extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'competition_id',
        'updated_at',
        'created_at',
    ];
    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }
}
