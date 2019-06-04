<?php

namespace App\Http\Controllers;

use App\SampleAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SampleAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sampleAttribute = SampleAttribute::all();

        $data = array();

        foreach ($sampleAttribute as $attr) {
            array_push($data, $attr->sample_attribute);
        }

        $data = array_unique($data);
        sort($data, SORT_FLAG_CASE | SORT_NATURAL);

        return view('sampleattribute.sampleattribute', compact('data'));
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
        abort_unless(Auth::user()->access == 4 || Auth::user()->access == 0, 403, "Access Denied!");
    
        $sampleAttribute = SampleAttribute::create(request()->validate([
            'sample_attribute' => ['required', 'min:1'],
            'sample_value' => ['required', 'min:1'],
        ]));

        $response = [
            'status' => 'success',
            'content' => json_encode($sampleAttribute)
        ];
        
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SampleAttribute  $sampleAttribute
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $query = DB::table('sample_attributes');
        $query->where('sample_attribute', 'like', $request->sample_attribute);
        // $values = SampleAttribute::where('sample_attribute', $request->sample_attribute)->orderBy('sample_value', 'asc');

        $response = [
            'status' => 'success',
            'content' => json_encode($query->orderBy('sample_value', 'asc')->get())
        ];

        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SampleAttribute  $sampleAttribute
     * @return \Illuminate\Http\Response
     */
    // public function edit(SampleAttribute $sampleAttribute)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SampleAttribute  $sampleAttribute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        abort_unless(Auth::user()->access == 4 || Auth::user()->access == 0, 403, "Access Denied!");

        $sampleAttribute = SampleAttribute::findorfail($request->id);

        $sampleAttribute->sample_value = $request->sample_value;
        $sampleAttribute->save();

        return response()->json(['success' => 'Sample Attribute Value updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SampleAttribute  $sampleAttribute
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        abort_unless(Auth::user()->access == 4 || Auth::user()->access == 0, 403, "Access Denied!");

        SampleAttribute::findorfail($request->id)->delete();

        return response()->json(['success' => 'Sample Attribute Value deleted successfully!']);
    }
}
