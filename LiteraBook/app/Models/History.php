<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    public $table = 'reading';
    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
}
