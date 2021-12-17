<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Summary extends Model
{
    use HasFactory;
    public $table = 'summary';
    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'bookTitle','releaseYear','author', 'totalPages'
    ];
}
