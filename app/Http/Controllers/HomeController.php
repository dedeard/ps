<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Fornes;
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
        $fornes = Fornes::all();
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
            'obat' => 'nullable'
        ]);

        $obat = $request->input('obat');
        $obat = Fornes::where('id', $obat)->first();
        $in = $request->all();

        if ($obat) {
            $in['kelas_terapi'] = $obat->kelas_terapi;
            $in['sub_kelas_terapi'] = $obat->sub_kelas_terapi;
            $in['sub_sub_kelas_terapi'] = $obat->sub_sub_kelas_terapi;
            $in['sub_sub_sub_kelas_terapi'] = $obat->sub_sub_sub_kelas_terapi;
        }
        $patient = new Patient($in);
        // $patient->user_id = Auth::id();
        $patient->save();

        return redirect()->route('home')->with('success', 'Patient created successfully.');
    }

    public function edit($id)
    {
        $doctors = Doctor::all();
        $patient = Patient::findOrFail($id);
        $fornes = Fornes::all();

        return view('home.edit', compact('patient', 'doctors', 'fornes'));
    }

    public function update(Request $request, $id)
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
            'obat' => 'nullable'
        ]);



        $patient = Patient::findOrFail($id);

        $obat = $request->input('obat');
        $obat = Fornes::where('id', $obat)->first();
        $in = $request->all();

        if ($obat) {
            $in['kelas_terapi'] = $obat->kelas_terapi;
            $in['sub_kelas_terapi'] = $obat->sub_kelas_terapi;
            $in['sub_sub_kelas_terapi'] = $obat->sub_sub_kelas_terapi;
            $in['sub_sub_sub_kelas_terapi'] = $obat->sub_sub_sub_kelas_terapi;
        }

        $patient->update($in);



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
