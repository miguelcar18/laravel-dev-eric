<?php

namespace Packages\System\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemArticle extends Model
{
    use HasFactory;

    protected $fillable =   [
        'id',
        'title',
        'body',
        'author',
    ];
}
