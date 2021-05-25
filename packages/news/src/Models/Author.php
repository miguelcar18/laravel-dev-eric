<?php

namespace Packages\News\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Author extends BaseModel
{
    use Notifiable, SoftDeletes;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

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

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = strtolower($name);
    }

    public function setLastNameAttribute($lastName)
    {
        $this->attributes['lastName'] = strtolower($lastName);
    }

    public function getNameAttribute($name)
    {
        return ucfirst($name);
    }

    public function getlastNameAttribute($lastName)
    {
        return ucfirst($lastName);
    }

    public function getFullnameAttribute()
    {
        return (ucfirst($this->name).' '.ucfirst($this->lastName));
    }
}
