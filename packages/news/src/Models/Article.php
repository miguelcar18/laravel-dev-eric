<?php

namespace Packages\News\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Article extends BaseModel
{
    use HasFactory,Notifiable,SoftDeletes;

    protected $dates = ['deleted_at'];
//    public $primaryKey = 'author_id';
    protected $fillable = [
        'title',
        'subtitle',
        'section',
        'author_id',
        'body',
        'created_at',
        'update_at',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
