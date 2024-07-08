<?php

namespace App\Models;

use Database\Factories\DoctorFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'specialization',
        'gender',
        'date_of_birth', // Ensure this matches the column name in your table
        'phone',
        'address',
    ];

    protected $casts = [
        'date_of_birth' => 'datetime', // Cast date_of_birth to datetime
    ];

    protected static function newFactory(): Factory
    {
        return DoctorFactory::new();
    }

    public static function getListOfSpecialist()
    {
        return  [
            "Internal Medicine Specialist",
            "General Surgeon",
            "Neurosurgeon",
            "Orthopedic Surgeon",
            "Obstetrician-Gynecologist",
            "Cardiologist",
            "Pediatrician",
            "Dermatologist",
            "Pulmonologist",
            "ENT Specialist",
            "Ophthalmologist",
            "Neurologist",
            "Psychiatrist",
            "Nutritionist",
            "Anesthesiologist",
            "Urologist",
            "Radiologist",
            "Pathologist",
            "Dentist",
            "Plastic Surgeon",
            "Infectious Disease Specialist",
            "Endocrinologist",
            "Hematologist",
            "Oncologist",
        ];
    }
}
