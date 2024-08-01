<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'identification',
        'name',
        'last_name',
        'birth_date',
        'address',
        'telephone',
        'especialidad',
        'professional_card',
        'email',
    ];
}
