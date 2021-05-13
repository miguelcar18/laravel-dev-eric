<?php

namespace Packages\News\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $keyType = 'string';
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}
