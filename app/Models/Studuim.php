<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studuim extends Model
{
    use HasFactory;
    protected $table = 'studuim';
    protected $fillable = [
        'name',
    ];
}
