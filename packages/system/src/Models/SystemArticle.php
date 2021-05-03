<?php

namespace Packages\System\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SystemArticle extends BaseModel
{
    use HasFactory, Notifiable;

    protected $fillable =   [
        'id',
        'title',
        'body',
        'author',
    ];
}
