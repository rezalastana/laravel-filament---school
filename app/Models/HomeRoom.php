<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HomeRoom extends Model
{
    use HasFactory;

    protected $guarded = [];

    // relationship
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class, 'teachers_id', 'id');
    }

    public function classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class, 'classrooms_id', 'id');
    }

    public function periode(): BelongsTo
    {
        return $this->belongsTo(Periode::class, 'periodes_id', 'id');
    }
}
