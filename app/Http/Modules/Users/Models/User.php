<?php

namespace App\Http\Modules\Users\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'identification_type_id',
        'identification',
        'name',
        'last_name',
        'email',
        'password',
        'role_id',
        'state',
    ];
}
