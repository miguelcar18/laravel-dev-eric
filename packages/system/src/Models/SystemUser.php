<?php

namespace Packages\System\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemUser extends Model
{
    use HasFactory;

    protected $fillable =   [
        'id',
        'rut',
        'name',
        'maternalName',
        'paternalName',
        'phone',
        'mobile',
        'email',
        'nationality',
        'password',
    ];
}
