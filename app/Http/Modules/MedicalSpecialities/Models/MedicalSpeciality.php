<?php

namespace App\Http\Modules\MedicalSpecialities\Models;

use App\Http\Modules\Doctors\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MedicalSpeciality extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'consulting_room'
    ];


    /**
     * Relación con el modelo Doctor.
     */
    public function doctors(): HasMany
    {
        return $this->hasMany(Doctor::class, 'medical_speciality_id');
    }
}
