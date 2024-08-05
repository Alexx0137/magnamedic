<?php

namespace App\Http\Modules\MedicalAppointments\Models;

use App\Http\Modules\AppointmentsStates\Models\AppointmentState;
use App\Http\Modules\Doctors\Models\Doctor;
use App\Http\Modules\MedicalSpecialities\Models\MedicalSpeciality;
use App\Http\Modules\Patients\Models\Patient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MedicalAppointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'appointment_state_id',
        'medical_speciality_id',
        'doctor_id',
        'date',
        'time',
        'observations',
    ];


    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }


    public function medicalSpeciality(): BelongsTo
    {
        return $this->belongsTo(MedicalSpeciality::class, 'medical_speciality_id');
    }

    public function appointmentStates(): BelongsTo
    {
        return $this->belongsTo(AppointmentState::class, 'appointment_state_id');
    }

}
