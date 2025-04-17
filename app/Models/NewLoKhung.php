<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewLoKhung extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'des', 'content', 'img','type'];
}


