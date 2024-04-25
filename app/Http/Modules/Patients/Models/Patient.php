<?php

namespace App\Http\Modules\Patients\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'identification',
        'identification_type_id',
        'name',
        'last_name',
        'gender_id',
        'date_of_birth',
        'address',
        'city',
        'telephone',
        'email',
        'blood_type_id',
    ];
}
