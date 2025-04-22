<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TitleSeo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'description',
        'keywords',
        'h1',
        'page'
    ];
}
