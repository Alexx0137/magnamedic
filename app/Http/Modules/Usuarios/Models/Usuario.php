<?php

namespace App\Http\Modules\Usuarios\Models;

use App\Http\Modules\Roles\Models\Role;
use App\Http\Modules\IdentificationTypes\Models\IdentificationType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Usuario extends Authenticatable
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



    /**
     * Get the role associated with the usuario.
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Get the identification type associated with the usuario.
     */
    public function identificationType(): BelongsTo
    {
        return $this->belongsTo(IdentificationType::class, 'identification_type_id');
    }
}
