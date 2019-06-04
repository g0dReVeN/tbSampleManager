<?php

namespace App\Http\Controllers;

use App\Request as WGS;
use App\SampleAttribute;
use App\Sample;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_unless(Auth::user() && Auth::user()->access != 4, 403, "Access Denied!");

        $query = SampleAttribute::where('sample_attribute', 'like', 'Studies')->get();

        $studies = array();

        foreach ($query as $value) {
            array_push($studies, $value->sample_value);
        }

        sort($studies, SORT_FLAG_CASE | SORT_NATURAL);
        // $studies =  DB::query() ->from('sample_attributes')
        //                         ->select('sample_value')
        //                         ->where('sample_attribute', 'Studies')
        //                         ->get()->toArray();

        return view('request.showrequest', compact('studies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_unless(Auth::user() && Auth::user()->access != 4, 403, "Access Denied!");

        if ($request->has("user_email") && $request->has("sample_id")) {
            $samples = array();
            foreach ($request->sample_id as $sample)
                array_push($samples, $sample);

            $data = array("user_email" => $request->user_email, "sample_id" => $samples[0]);
            $wgs = WGS::create($data);
            $id = $wgs->id;
            $wgs->batch_id = $id;
            $wgs->save();

            for ($i = 1; $i < count($samples); $i++) {
                $wgs = new WGS;
                $wgs->batch_id = $id;
                $wgs->user_email = $request->user_email;
                $wgs->sample_id = $samples[$i];
                $wgs->save();
            }
            
            return redirect("/request")->with("status", "Request submitted successfully!");
        } else {
            return redirect("/request")->with("error", "Error: Sample ID required!");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($batch_id)
    {
        //
    }

    public function showRequest()
    {
        abort_unless(Auth::user() && Auth::user()->access != 4, 403, "Access Denied!");

        $query = SampleAttribute::where('sample_attribute', 'like', 'Studies')->get();

        $studies = array();

        foreach ($query as $value) {
            array_push($studies, $value->sample_value);
        }

        sort($studies, SORT_FLAG_CASE | SORT_NATURAL);

        return view('request.request', compact('studies'));
    }

    public function makeRequest(Request $request)
    {
        abort_unless(Auth::user() && Auth::user()->access != 4, 403, "Access Denied!");

        $access = false;
        if (Auth::user()->access >= "5")
            $access = true;
        
        $data = preg_split('/(\n|,)/', str_replace(' ', '', $request->CH_Num_List));

        $query = DB::table('samples');
        if (count($data)) {
            foreach ($data as $CH_Num) {
                $query->orWhere('CH_Num', 'like', $CH_Num);
            }
            $query->having('Study', 'like', $request->Study);
        } else {
            $query->find(0);
        }

        $response = [
            'status' => 'success',
            'content' => json_encode($query->orderBy('CH_Num', 'asc')->get()),
            'access' => $access
        ];

        return response()->json($response);
    }

    public function get_batches(Request $request)
    {
        $WGS = [
            'Not Viable',
            'Unknown',
            'Not Yet Requested',
            'Request Submitted',
            'Culture Setup',
            'DNA Extraction Done',
            'Quality Control',
            'Sequencing',
            'WGS Complete'
        ];

        $data = [
            'user_email'    => $request->user_email,
            'Study'         => $request->Study,
            'CH_Num'        => $request->CH_Num,
            'WGS_Status'    => $request->WGS_Status
        ];

        $query = DB::query()->from('requests AS R')
                            ->select('batch_id', 'user_email')
                            ->selectRaw('(SELECT COUNT(*) FROM requests WHERE requests.batch_id = R.batch_id) AS sample_count')
                            ->selectRaw('(SELECT MIN(created_at) FROM requests WHERE requests.batch_id = R.batch_id) AS created_at')
                            ->selectRaw('MIN(WGS_Status) AS status')
                            ->join('samples', 'R.sample_id', '=', 'samples.id')
                            ->groupBy('batch_id', 'user_email');

        if ($request->batch_id != null) {
            $batches = array_filter(preg_split('/(\n|,)/', str_replace(' ', '', $request->batch_id)));
            foreach ($batches as $batch) {
                $query->orWhere('batch_id', $batch);
            }
        } else {
            foreach ($data as $key => $value) {
                if ($value != null) {
                    if ($key == "user_email") {
                        $users = array_filter(preg_split('/(\n|,)/', str_replace(' ', '', $value)));
                        $query->where(function($q) use ($users) {
                            foreach ($users as $user) {
                                $q->orWhere('user_email', 'like', $user.'%');
                            }
                        });
                    }
                    if (in_array($key, ['Study', 'CH_Num'])) {
                        if ($query->joins == null) {
                            $query->join('samples', 'samples.id', '=', 'R.sample_id');
                        }
                        if ($key == "Study") {
                            $query->where('samples.Study', $value);
                        }
                        if ($key == "CH_Num") {
                            $CH_Nums = array_filter(preg_split('/(\n|,)/', str_replace(' ', '', $value)));
                            $query->where(function($q) use ($CH_Nums) {
                                foreach ($CH_Nums as $CH_Num) {
                                    $q->orWhere('samples.CH_Num', $CH_Num);
                                }
                            });
                        }
                    }
                    if ($key == "WGS_Status") {
                        $query->having('status', $WGS[$value]);
                    }
                }
            }
        }

        return $query->simplePaginate($request->limit);
    }

    public function get_batch($batch_id)
    {
        $query = DB::query()->from('requests')
                            ->join('samples', 'requests.sample_id', '=', 'samples.id')
                            ->select('batch_id as batch', 'user_email', 'sample_id as id', 'WGS_Status as status', 'Study as study', 'CH_Num as ch_num', 'requests.created_at as created_at')
                            ->where('batch_id', $batch_id);

        return $query->get();
    }

    public function statusUpdate(Request $request)
    {
        if ($request->status != -1) {
            foreach ($request->samples as $id) {
                $sample = Sample::find($id);
                $sample->WGS_Status = $request->status;
                $sample->save();
            }
        } else {
            foreach ($request->samples as $id) {
                $sample = WGS::where('sample_id', $id)->where('batch_id', $request->batch)->first();
                $sample->delete();
            }
        }

        $query = DB::query()->from('requests')
                                ->join('samples', 'requests.sample_id', '=', 'samples.id')
                                ->select('batch_id as batch', 'user_email', 'sample_id as id', 'WGS_Status as status', 'Study as study', 'CH_Num as ch_num', 'requests.created_at as created_at')
                                ->where('batch_id', $request->batch);

        return $query->get();
    }
}
