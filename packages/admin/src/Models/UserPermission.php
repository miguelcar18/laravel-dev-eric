<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Junges\ACL\Traits\UsersTrait;

class UserPermission extends Model
{
    use HasFactory, UsersTrait;


}
