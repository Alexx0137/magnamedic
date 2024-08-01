<?php

namespace App\Http\Modules\Patients\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'identification_type_id',
        'identification',
        'name',
        'last_name',
        'gender_id',
        'blood_type_id',
        'address',
        'telephone',
        'email',
        'birth_date',
        'state'
    ];
}
