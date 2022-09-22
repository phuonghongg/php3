<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stories extends Model
{
    use HasFactory;
    protected $table = 'stories';
    protected $primaryKey = 'slug';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'slug',
        'name',
        'author',
        'summary',
        'url_img',
        'slug_genre',
        'status',
        'source',
        'created_at',
        'update_at'
    ];
}
