<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Pastikan 'category_id' ada di sini!
    protected $fillable = [
        'title',
        'writer',
        'publisher',
        'publication_year',
        'stock',
        'cover',
        'category_id', // <--- TAMBAHKAN INI
    ];

    // Relasi ke Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}