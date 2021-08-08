<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = [

        'user_id',
        'book_name',
        'image',
        'author_name',
        'published_date'
    ];

    public function users()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
}
