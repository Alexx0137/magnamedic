<?php

namespace App\Http\Modules\MedicalSpecialities\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalSpeciality extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'consulting_room'
    ];
}
