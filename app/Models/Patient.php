<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nik',
        'bpjs_number',
        'full_name',
        'place_of_birth',
        'date_of_birth',
        'gender',
        'blood_type',
        'address',
        'phone',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
