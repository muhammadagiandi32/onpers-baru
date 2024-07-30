<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;

class News extends Model
{

    use HasFactory;

    protected $casts = [
        'published_at' => 'datetime',
    ];

    // Jika Anda memiliki kolom created_at dan updated_at
    public function getPublishedAtAttribute($value)
    {
        return Carbon::parse($value);
    }


    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'title',
        'slug',
        'content',
        'image_name',
        'image_url',
        'author_id',
        'category_id',
        'published_at',

    ];



    // Relasi dengan tabel penulis (Authors)
    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }

    // Relasi dengan tabel kategori (Categories)
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function readingTime()
    {
        $wordCount = Str::wordCount(strip_tags($this->content)); // Menghitung jumlah kata dalam konten
        $minutes = ceil($wordCount / 200); // Anggap 200 kata per menit
        return $minutes;
    }
}
