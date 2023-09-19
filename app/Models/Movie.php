<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = ['id_api', 'title', 'overview', 'original_language', 'popularity', 'release_date', 'vote_average', 'vote_count' ];

}
