<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $patients = Patient::paginate(20);
        return view('home.index', compact('patients'));
    }

    public function create()
    {
        $doctors = Doctor::all();
        return view('home.create', compact('doctors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'doctor_id' => 'required|exists:doctors,id',
            'bpjs_number' => 'nullable',
            'full_name' => 'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required|date',
            'gender' => 'required',
            'blood_type' => 'required',
            'address' => 'nullable',
            'phone' => 'nullable',
            'notes' => 'nullable',
            'recipe' => 'nullable',
        ]);

        $patient = new Patient($request->all());
        $patient->user_id = Auth::id();
        $patient->save();

        return redirect()->route('home')->with('success', 'Patient created successfully.');
    }

    public function show(string $id)
    {
        $patient = Patient::findOrFail($id);
        return view('home.show', compact('patient'));
    }

    public function verify($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->verified = true;
        $patient->save();

        return redirect()->back()->with('success', 'Patient verify successfully.');
    }
}
