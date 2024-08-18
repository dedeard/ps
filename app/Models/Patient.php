<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{

    protected $fillable = [
        'doctor_id',
        'nik',
        'bpjs_number',
        'full_name',
        'place_of_birth',
        'date_of_birth',
        'gender',
        'blood_type',
        'address',
        'phone',
        'notes',
        'recipe',
        'verified',
        "status"
    ];


    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
