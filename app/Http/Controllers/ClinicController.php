<?php

namespace App\Http\Controllers;

use App\Clinic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClinicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clinics = Clinic::all()->sortBy('clinic');

        return view('clinic.clinic', compact('clinics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_unless(Auth::user()->access == 4 || Auth::user()->access == 6, 403, "Access Denied!");
    
        Clinic::create(request()->validate([
            'clinic' => ['required'],
            'origin' => ['required', 'min:3'],
            'type' => ''
        ]));
        
        return redirect("/clinics")->with("status", "New Clinic added successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clinic  $clinic
     * @return \Illuminate\Http\Response
     */
    // public function show(Clinic $clinic)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clinic  $clinic
     * @return \Illuminate\Http\Response
     */
    // public function edit(Clinic $clinic)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clinic  $clinic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        abort_unless(Auth::user()->access == 6 || Auth::user()->access == 4, 403, "Access Denied!");

        $clinic = Clinic::findorfail($request->id);

        $clinic->clinic = $request->clinic;
        $clinic->origin = $request->origin;
        $clinic->type = $request->type;
        $clinic->save();

        return response()->json(['success' => 'Clinic Details updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clinic  $clinic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        abort_unless(Auth::user()->access == 4 || Auth::user()->access == 6, 403, "Access Denied!");

        Clinic::findorfail($request->id)->delete();

        return response()->json(['success' => 'Clinic Details deleted successfully']);
    }
}
