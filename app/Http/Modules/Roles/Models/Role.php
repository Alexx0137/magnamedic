<?php

namespace App\Http\Modules\Roles\Models;

use App\Http\Modules\Users\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code'
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
