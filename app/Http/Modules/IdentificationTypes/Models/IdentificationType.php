<?php

namespace App\Http\Modules\IdentificationTypes\Models;

use App\Http\Modules\Users\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdentificationType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
