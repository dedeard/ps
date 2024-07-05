<?php

namespace App\Http\Controllers;

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
        return view('home.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required',
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
}
