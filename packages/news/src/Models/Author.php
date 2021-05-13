<?php

namespace Packages\News\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Author extends BaseModel
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'id',
        'email',
        'name',
        'lastName',
        'dni',
        'phone',
    ];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
