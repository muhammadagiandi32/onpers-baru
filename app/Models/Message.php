<?php

// Model Message
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['sender', 'to', 'message'];
    // Model Message
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender', 'email');
    }

    public function to() // Ini sekarang menggunakan 'to' untuk penerima
    {
        return $this->belongsTo(User::class, 'to', 'email');
    }
}
