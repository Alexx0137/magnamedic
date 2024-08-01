<?php

namespace App\Http\Modules\AppointmentsStates\Models;

use App\Http\Modules\Users\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AppointmentState extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code'
    ];

}
