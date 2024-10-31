<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = ['nip', 'name', 'address', 'profile'];

    // relationship HasMany to HomeRoom
    public function classroom(): HasMany
    {
        return $this->hasMany(HomeRoom::class, 'teachers_id', 'id');
    }
}
