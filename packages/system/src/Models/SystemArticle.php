<?php

namespace Packages\System\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemArticle extends BaseModel
{
    use HasFactory;

    protected $fillable =   [
        'id',
        'title',
        'body',
        'author',
    ];
}
