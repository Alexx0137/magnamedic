<?php

namespace App\Http\Modules\Users\Models;

use App\Http\Modules\Roles\Models\Role;
use App\Http\Modules\IdentificationTypes\Models\IdentificationType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable
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
     * Get the role associated with the user.
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Get the identification type associated with the user.
     */
    public function identificationType()
    {
        return $this->belongsTo(IdentificationType::class, 'identification_type_id');
    }
}
