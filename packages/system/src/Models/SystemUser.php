<?php

namespace Packages\System\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SystemUser extends BaseModel
{
    use HasFactory, Notifiable;

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
