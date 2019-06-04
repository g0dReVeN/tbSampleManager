<?php

namespace App\Http\Controllers;

use Excel;
use App\Sample;
use App\SampleAttribute;
use App\Clinic;
use App\Exports\SamplesExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_unless(Auth::user(), "Access Denied!");

        $query = SampleAttribute::where('sample_attribute', 'like', 'Studies')->get();

        $studies = array();

        foreach ($query as $value) {
            array_push($studies, $value->sample_value);
        }

        sort($studies, SORT_FLAG_CASE | SORT_NATURAL);

        return view('sample.sample', compact('studies'));
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

        $sample = new Sample;
        $sample->patient_id = $request->id;
        $sample->save();

        return redirect("/samples/" . $sample->id);        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sample  $sample
     * @return \Illuminate\Http\Response
     */
    public function show($sid)
    {
        abort_unless(Auth::user(), "Access Denied!");

        $sample = Sample::findorfail($sid);
        $attributes = SampleAttribute::all()->sortBy('sample_attribute')->sortBy('sample_value');
        $clinics = Clinic::all()->sortBy('clinic');

        $wgs_status = array("0" => "Not Viable", "1" => "Unknown", "2" => "Not Yet Requested", "3" => "Requested Submitted", "4" => "Reculture", "5" => "DNA Extraction Done", "6" => "Quality Check", "7" => "Sequencing", "8" => "WGS Complete");

        if (Auth::user()->access == 6)
            return view('sample.showsample', compact('sample'), compact('attributes'))->with(compact('clinics'))->with(compact('wgs_status'));
        else if (Auth::user()->access == 2 || Auth::user()->access == 3)
            return view('sample.editsample', compact('sample'), compact('attributes'))->with(compact('wgs_status'));
        else if (Auth::user()->access == 4)
            return view('sample.capturesample', compact('sample'), compact('attributes'))->with(compact('clinics'))->with(compact('wgs_status'));
        else
            return view('sample.displaysample', compact('sample'), compact('wgs_status'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sample  $sample
     * @return \Illuminate\Http\Response
     */
    // public function edit(Sample $sample)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sample  $sample
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        abort_unless(Auth::user()->access == 4 || Auth::user()->access == 6 || Auth::user()->access == 2 || Auth::user()->access == 3, 403, "Access Denied!");

        $sample = Sample::findorfail($request->id);

        if (Auth::user()->access == 4 || Auth::user()->access == 6) {
            if ($request->Study && $request->CH_Num && ($sample->Study != $request->Study || $sample->CH_Num != $request->CH_Num))
                if (DB::table('samples')->where('Study', $request->Study)->where('CH_Num', $request->CH_Num)->exists())
                    return response()->json(['failure' => "A sample already exists under study: " . $request->Study . " & CH Num: " . $request->CH_Num . " !"]);

            $sample->Study = $request->Study;
            $sample->CH_Num = $request->CH_Num;
            $sample->Received_Date = $request->Received_Date;
            $sample->Age = $request->Age;
            $sample->Category = $request->Category;
            $sample->Clinic = $request->Clinic;
            $sample->Origin = $request->Origin;
            $sample->NHLS_No = $request->NHLS_No;
            $sample->NHLS_Reg_Date = $request->NHLS_Reg_Date;
            $sample->Remark = $request->Remark;
            $sample->Auramine = $request->Auramine;
            $sample->ZN = $request->ZN;
            $sample->Niacin = $request->Niacin;
            $sample->Capreo = $request->Capreo;
            $sample->Inh = $request->Inh;
            $sample->Rif = $request->Rif;
            $sample->ETHAM = $request->ETHAM;
            $sample->ETHIO = $request->ETHIO;
            $sample->Ofloxacin = $request->Ofloxacin;
            $sample->Amikacin = $request->Amikacin;
            $sample->SM = $request->SM;
            $sample->KANA5 = $request->KANA5;
            $sample->Pyriz = $request->Pyriz;
            $sample->THIA = $request->THIA;
            $sample->CYCLO = $request->CYCLO;
            $sample->Bedaquiline = $request->Bedaquiline;
            $sample->Clofazimine = $request->Clofazimine;
            $sample->Delamanid = $request->Delamanid;
            $sample->Levofloxacin = $request->Levofloxacin;
            $sample->Linezolid = $request->Linezolid;
            $sample->Moxifloxacin_Low = $request->Moxifloxacin_Low;
            $sample->Moxifloxacin_High = $request->Moxifloxacin_High;
            $sample->pAminosalicilic_Acid = $request->pAminosalicilic_Acid;
            $sample->Rifabutin = $request->Rifabutin;
            $sample->Resistance = $request->Resistance;
        }

        if (Auth::user()->access == 2 || Auth::user()->access == 3 || Auth::user()->access == 6) {
            $sample->katG_1 = $request->katG_1;
            $sample->katG_2 = $request->katG_2;
            $sample->katG_F1 = $request->katG_F1;
            $sample->katG_F3 = $request->katG_F3;
            $sample->inhA = $request->inhA;
            $sample->inhAprom = $request->inhAprom;
            $sample->ahpC = $request->ahpC;
            $sample->kasA = $request->kasA;
            $sample->ndh = $request->ndh;
            $sample->furA = $request->furA;
            $sample->Rv0340 = $request->Rv0340;
            $sample->fbpC = $request->fbpC;
            $sample->iniA = $request->iniA;
            $sample->iniB = $request->iniB;
            $sample->iniC = $request->iniC;
            $sample->srmRhomo = $request->srmRhomo;
            $sample->fabD = $request->fabD;
            $sample->accD6 = $request->accD6;
            $sample->fadE24 = $request->fadE24;
            $sample->efpA = $request->efpA;
            $sample->Rv1592c = $request->Rv1592c;
            $sample->Rv1772 = $request->Rv1772;
            $sample->nhoA = $request->nhoA;
            $sample->mabA = $request->mabA;
            $sample->rpoB_1 = $request->rpoB_1;
            $sample->rpoB_2 = $request->rpoB_2;
            $sample->embB = $request->embB;
            $sample->pncA_1 = $request->pncA_1;
            $sample->pncA_2 = $request->pncA_2;
            $sample->gyrA = $request->gyrA;
            $sample->rpsL = $request->rpsL;
            $sample->rrs = $request->rrs;
            $sample->rrs500 = $request->rrs500;
            $sample->tlyA = $request->tlyA;
            $sample->mutT2 = $request->mutT2;
            $sample->Ogt = $request->Ogt;
            $sample->Rv3908 = $request->Rv3908;
            $sample->Inh_mic = $request->Inh_mic;
            $sample->Rif_mic = $request->Rif_mic;
            $sample->Emb_mic = $request->Emb_mic;
            $sample->Pza_mic = $request->Pza_mic;
            $sample->SM_mic = $request->SM_mic;
            $sample->Eth_mic = $request->Eth_mic;
            $sample->Eth_7_2 = $request->Eth_7_2;
            $sample->Inh_0_2 = $request->Inh_0_2;
            $sample->Rif_1_0 = $request->Rif_1_0;
            $sample->Kana_5_0 = $request->Kana_5_0;
            $sample->Str_2_0 = $request->Str_2_0;
            $sample->Ofl_2 = $request->Ofl_2;
            $sample->Ami_5 = $request->Ami_5;
            $sample->Capreo_10 = $request->Capreo_10;
            $sample->Ofl_1 = $request->Ofl_1;
            $sample->Pza_100 = $request->Pza_100;
        }

        $sample->save();

        return response()->json(['success' => 'Sample Details updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sample  $sample
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        abort_unless(Auth::user()->access == 4 || Auth::user()->access == 6, 403, "Access Denied!");

        $sample = Sample::findorfail($request->id);
        $id = $sample->patient_id;
        $sample->delete();

        return redirect('/patients/' . $id);
    }

    public function findSample(Request $request)
    {
        abort_unless(Auth::user(), "Access Denied!");

        $data = [
            'Study' => $request->Study,
            'CH_Num' => $request->CH_Num,
        ];

        $sample = 0;

        if ($request->sampleid) {
            $sample = Sample::find($request->sampleid);
        } else {
            $sample = Sample::where('Study', $data['Study'])->where('CH_Num', $data['CH_Num'])->first();
        }

        if ($sample)
            return redirect("/samples/" . $sample->id);
        return redirect("/samples")->with("status", "Sample not found!");
    }

    public function customQuery()
    {
        abort_unless(Auth::user(), 403, "Access Denied!");

        $query = SampleAttribute::where('sample_attribute', 'like', 'Studies')->get();

        $studies = array();

        foreach ($query as $value) {
            array_push($studies, $value->sample_value);
        }

        sort($studies, SORT_FLAG_CASE | SORT_NATURAL);

        return view('customq.customq', compact('studies'));
    }

    public function querySamples(Request $request)
    {
        $now = round(microtime(true) * 1000);
        $filename = $now.'.xlsx';

        $columns = $request->columns;
        $studies = $request->studies;
        $ch_nums = array_filter(explode(',', preg_replace('/\s/', '', $request->ch_nums)), function($value) { return $value !== ''; });
        $patient_ids = array_filter(explode(',', preg_replace('/\s/', '', $request->patient_ids)), function($value) { return $value !== ''; });
        $nhls_nos = array_filter(explode(',', preg_replace('/\s/', '', $request->nhls_nos)), function($value) { return $value !== ''; });
        $statuses = $request->statuses;
        $batch_min = $request->batch_min;
        $batch_max = $request->batch_max;
        
        Excel::store(new SamplesExport($columns, $studies, $ch_nums, $patient_ids, $nhls_nos, $statuses, $batch_min, $batch_max), $filename);
        
        return $filename;
    }

    public function download($file)
    {
        $path = storage_path('app/'.$file);
        date_default_timezone_set('Africa/Johannesburg');
        $filename = date("Y_m_d-H_i_s") . '.xlsx';
        $headers = ['Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

        return response()->download($path, $filename, $headers)->deleteFileAfterSend(true);
    }
}
