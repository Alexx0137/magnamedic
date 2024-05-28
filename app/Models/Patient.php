<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'identification',
        'name',
        'last_name',
        'gender',
        'date_of_birth',
        'address', 'city',
        'telephone',
        'email',
    ];
}
