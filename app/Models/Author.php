<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'name',
        'user_uuid',
    ];

    // Relasi dengan tabel berita (News)
    public function news()
    {
        return $this->hasMany(News::class, 'author_id', 'id');
    }
    // Relasi dengan tabel users
    public function user()
    {
        return $this->belongsTo(User::class, 'user_uuid', 'uuid'); // ubah 'uuid' menjadi 'user_uuid'
    }
}
