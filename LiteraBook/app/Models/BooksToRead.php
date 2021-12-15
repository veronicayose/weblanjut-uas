<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BooksToRead extends Model
{
    use HasFactory;
    public $table = '_to_read';
    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'bookTitle','releaseYear','author'
    ];
}
