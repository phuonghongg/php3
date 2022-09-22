<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
    use HasFactory;
    protected $table = 'genres';
    protected $primaryKey = 'slug';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'slug',
        'name',
    ];
}
