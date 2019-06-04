<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Sample;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_unless(Auth::user()->access == 1 || Auth::user()->access == 3 || Auth::user()->access == 4 || Auth::user()->access == 6, 403, "Access Denied!");

        return view('patient.patient');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless(Auth::user()->access == 4 || Auth::user()->access == 6, 403, "Access Denied!");

        return view('patient.newpatient');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_unless(Auth::user()->access == 4 || Auth::user()->access == 6, 403, "Access Denied!");

        $patient = Patient::create(request()->validate([
            'nhlsid' => '',
            'surname' => '',
            'firstname' => '',
            'sex' => '',
            'dateofbirth' => '',
            'idcheck' => '',
        ]));

        $sample = new Sample;
        $sample->patient_id = $patient->id;
        $sample->save();
        
        return redirect("/samples/" . $sample->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patient  $Patient
     * @return \Illuminate\Http\Response
     */
    public function show($pid)
    {
        abort_unless(Auth::user()->access == 1 || Auth::user()->access == 3 || Auth::user()->access == 4 || Auth::user()->access == 6, 403, "Access Denied!");
        
        return view('patient.showpatient', [
            'patient' => Patient::findorfail($pid)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $Patient
     * @return \Illuminate\Http\Response
     */
    // public function edit(Patient $patient)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $Patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        abort_unless(Auth::user()->access == 4 || Auth::user()->access == 6, 403, "Access Denied!");

        $patient = Patient::findorfail($request->id);

        $patient->nhlsid = $request->nhlsid;
        $patient->surname = $request->surname;
        $patient->firstname = $request->firstname;
        $patient->sex = $request->sex;
        $patient->dateofbirth = $request->dateofbirth;
        $patient->idcheck = $request->idcheck;
        $patient->save();

        return response()->json(['success' => 'Patient Details updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $Patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        abort_unless(Auth::user()->access == 4 || Auth::user()->access == 6, 403, "Access Denied!");

        Patient::findorfail($request->id)->delete();

        return redirect('/patients');
    }

    public function searchPatients(Request $request)
    {
        abort_unless(Auth::user()->access == 1 || Auth::user()->access == 3 || Auth::user()->access == 4 || Auth::user()->access == 6, 403, "Access Denied!");

        $data = [
            'nhlsid' => $request->nhlsid,
            'name' => $request->name,
            'sex' => $request->sex,
            'dateofbirth' => $request->dateofbirth,
            'idcheck' => $request->idcheck
        ];

        $query = DB::table('patients');

        if ($request->id) {
            $query->where('id', 'like', $request->id);
        } elseif ($data['nhlsid'] != null || $data['name'] != null || $data['dateofbirth'] != null) {
            foreach ($data as $key => $value) {
                if ($value != null) {

                    if ($key == 'idcheck' && $value === '0') {
                        $query->where($key, 'like', $value);
                    } elseif ($key == 'idcheck' && $value === '1') {
                        $query->where($key, 'like', $value);
                    } elseif ($key == 'idcheck' && $value == 'all') {
                        continue;
                    }

                    if ($key == 'sex' && $value === '0') {
                        $query->where($key, 'like', $value);
                    } elseif ($key == 'sex' && $value === '1') {
                        $query->where($key, 'like', $value);
                    } elseif ($key == 'sex' && $value === '2') {
                        $query->where($key, 'like', $value);
                    } elseif ($key == 'sex' && $value === 'any') {
                        continue;
                    }

                    if ($key == 'dateofbirth')  {
                        $query->where($key, 'like', $value."%");
                    }                     

                    if ($key == 'nhlsid')  {
                        $query->where($key, 'like', $value."%");
                    } 
                    
                    if ($key == 'name') {
                        
                        $names = explode(' ', $value);

                        if (count($names) == 1) {
                            $query->where(function($query0) use ($value) {
                                $query0->where('firstname', 'like', $value."%")
                                    ->orWhere('surname', 'like', $value."%");
                            });
                        } else {
                            $surname_1 = array_shift($names);
                            $firstname_1 = implode(' ', $names);
                            $names = explode(' ', $value);
                            $surname_2 = array_pop($names);
                            $firstname_2 = implode(' ', $names);
                            $query->where(function($query2) use ($surname_1, $firstname_1, $surname_2, $firstname_2) {
                                $query2->where(function($query3) use ($surname_1, $firstname_1) {
                                    $query3->where('surname', 'like', $surname_1."%")
                                    ->where('firstname', 'like', $firstname_1."%");
                                })->orWhere(function($query3) use ($surname_2, $firstname_2) {
                                    $query3->where('surname', 'like', $surname_2."%")
                                    ->where('firstname', 'like', $firstname_2."%");
                                });
                            });
                        }
                    }
                }
            }
        } else {
            $query->find(0);
        }

        $response = [
            'status' => 'success',
            'content' => json_encode($query->orderBy('surname', 'asc')->orderBy('firstname', 'asc')->simplePaginate($request->limit))
        ];

        return response()->json($response);
    }
}


