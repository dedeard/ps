<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DoctorController extends Controller
{
    /**
     * Display a listing of the doctors.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::all();
        return view('doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new doctor.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specializations = Doctor::getListOfSpecialist();
        return view('doctors.create', compact('specializations'));
    }

    /**
     * Store a newly created doctor in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $specializations = Doctor::getListOfSpecialist();

        // Validate incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => ['required', 'string', 'max:255', Rule::in($specializations)],
            'gender' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);

        // Create new Doctor instance
        Doctor::create([
            'name' => $request->name,
            'specialization' => $request->specialization,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('doctors.index')->with('success', 'Doctor added successfully.');
    }

    /**
     * Show the form for editing the specified doctor.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        $specializations = Doctor::getListOfSpecialist();
        return view('doctors.edit', compact('doctor', 'specializations'));
    }

    /**
     * Update the specified doctor in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        $specializations = Doctor::getListOfSpecialist();

        // Validate incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => ['required', 'string', 'max:255', Rule::in($specializations)],
            'gender' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);

        // Update the Doctor instance
        $doctor->update([
            'name' => $request->name,
            'specialization' => $request->specialization,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully.');
    }

    /**
     * Remove the specified doctor from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();

        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully.');
    }
}
