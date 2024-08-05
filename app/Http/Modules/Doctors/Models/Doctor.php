<?php

namespace App\Http\Modules\Doctors\Models;

use App\Http\Modules\Genders\Models\Gender;
use App\Http\Modules\IdentificationTypes\Models\IdentificationType;
use App\Http\Modules\MedicalSpecialities\Models\MedicalSpeciality;
use App\Http\Modules\Roles\Models\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'identification_type_id',
        'identification',
        'name',
        'last_name',
        'gender_id',
        'address',
        'telephone',
        'email',
        'birth_date',
        'license_number',
        'medical_speciality_id',
        'state',
    ];



    /**
     * Relación con el modelo Role.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Relación con el modelo IdentificationType.
     */
    public function identificationType()
    {
        return $this->belongsTo(IdentificationType::class, 'identification_type_id');
    }

    /**
     * Relación con el modelo Gender.
     */
    public function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }

    /**
     * Relación con el modelo MedicalSpeciality.
     */
    public function medicalSpecialities(): BelongsTo
    {
        return $this->belongsTo(MedicalSpeciality::class, 'medical_speciality_id');
    }



}
