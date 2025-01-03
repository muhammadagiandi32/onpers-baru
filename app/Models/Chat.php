<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    // Menambahkan kolom 'message' ke dalam $fillable
    protected $fillable = ['message']; // Tambahkan kolom message
}