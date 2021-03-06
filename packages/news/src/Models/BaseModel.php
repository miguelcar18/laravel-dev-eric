<?php

namespace Packages\News\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseModel extends Model
{
    use HasFactory, SoftDeletes;

    public $incrementing = false;
    public $keyType = 'string';
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}
