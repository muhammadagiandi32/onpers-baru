<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoNewsIklan extends Model
{
    use HasFactory;

    protected $fillable = [
        'video_name',
        'video_url',
    ];
}
