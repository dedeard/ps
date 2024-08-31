<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Fornes;
use App\Models\Patient;
use App\Models\TherapeuticClass;
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
        $fornes = TherapeuticClass::with(['sub1.sub2.sub3', 'drug', 'sub1.drug', 'sub1.sub2.drug', 'sub1.sub2.sub3.drug'])->get();
        return view('home.create', compact('doctors', 'fornes'));
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
            'therapeutic_class' => 'nullable', // Must exist in therapeutic_classes
            'sub1' => 'nullable', // Must exist in therapeutic_sub1
            'sub2' => 'nullable', // Must exist in therapeutic_sub2
            'sub3' => 'nullable'  // Must exist in therapeutic_sub3
        ]);

        $in = $request->all();

        $patient = new Patient($in);
        // $patient->user_id = Auth::id();
        $patient->save();

        return redirect()->route('home')->with('success', 'Patient created successfully.');
    }

    public function edit($id)
    {
        $doctors = Doctor::all();
        $patient = Patient::findOrFail($id);
        $fornes = TherapeuticClass::with(['sub1.sub2.sub3', 'drug', 'sub1.drug', 'sub1.sub2.drug', 'sub1.sub2.sub3.drug'])->get();

        return view('home.edit', compact('patient', 'doctors', 'fornes'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
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
            'therapeutic_class' => 'nullable', // Must exist in therapeutic_classes
            'sub1' => 'nullable', // Must exist in therapeutic_sub1
            'sub2' => 'nullable', // Must exist in therapeutic_sub2
            'sub3' => 'nullable'  // Must exist in therapeutic_sub3
        ]);



        $patient = Patient::findOrFail($id);

        $patient->update($data);


        return redirect()->route('home')->with('success', 'Patient updated successfully.');
    }

    public function show(string $id)
    {
        $patient = Patient::findOrFail($id);
        return view('home.show', compact('patient'));
    }

    public function verify($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->status = 2;
        $patient->save();

        return redirect()->back()->with('success', 'Patient verify successfully.');
    }

    public function submitData($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->status = 3;
        $patient->save();

        return redirect()->back()->with('success', 'Patient verify successfully.');
    }

    public function giveMedicin($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->status = 4;
        $patient->save();

        return redirect()->back()->with('success', 'Patient verify successfully.');
    }
}
