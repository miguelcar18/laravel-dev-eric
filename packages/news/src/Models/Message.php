<?php

namespace Packages\News\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Message extends BaseModel
{
    use HasFactory, SoftDeletes,Notifiable;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $fillable = [
        'id',
        'name',
        'subject',
        'sender_name',
        'sender_email',
        'answer_to',
        'footer_text',
        'content',
    ];


}
