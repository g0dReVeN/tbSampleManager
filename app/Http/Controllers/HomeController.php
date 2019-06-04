<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Clinic;
use App\Sample;
use App\SampleAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Khill\Lavacharts\Lavacharts;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_unless(Auth::user(), "Access Denied!");
        
        $reasons = \Lava::DataTable();

        $reasons->addStringColumn('Sex')
                ->addNumberColumn('Percent')
                ->addRow(['Male', Patient::where('sex', '0')->count()])
                ->addRow(['Female', Patient::where('sex', '1')->count()])
                ->addRow(['Unknown', Patient::where('sex', '2')->count()]);

        \Lava::DonutChart('Patients', $reasons, [
            'pieHole' => 0.5,
            'titleTextStyle' => [
                'fontName' => 'Arial',
                'fontSize' => 16,
                'fontColor' => 'blue'
            ],
            'chartArea' => [
                'left' => 15,
                'top' => 5,
                'right' => 0,
                'bottom' => 5,
            ]
        ]);

        $cDate = getdate()["year"];
        $data12 = $cDate - 12;
        $data13 = $cDate - 13;
        $data17 = $cDate - 17;
        $data18 = $cDate - 18;
        $data24 = $cDate - 24;
        $data25 = $cDate - 25;
        $data44 = $cDate - 44;
        $data45 = $cDate - 45;
        $data64 = $cDate - 64;
        $data65 = $cDate - 65;

        $reasons2 = \Lava::DataTable();

        $reasons2->addStringColumn('Age')
                ->addNumberColumn('Percent')
                ->addRow(['Unknown', Patient::where('dateofbirth', null)->count()])
                ->addRow(['Age: <= 12', Patient::whereYear('dateofbirth', '>=', $data12)->count()])
                ->addRow(['Age: 13-17', Patient::whereYear('dateofbirth', '>=', $data17)->whereYear('dateofbirth', '<=', $data13)->count()])
                ->addRow(['Age: 18-24', Patient::whereYear('dateofbirth', '>=', $data24)->whereYear('dateofbirth', '<=', $data18)->count()])
                ->addRow(['Age: 25-44', Patient::whereYear('dateofbirth', '>=', $data44)->whereYear('dateofbirth', '<=', $data25)->count()])
                ->addRow(['Age: 45-64', Patient::whereYear('dateofbirth', '>=', $data64)->whereYear('dateofbirth', '<=', $data45)->count()])
                ->addRow(['Age: >= 65', Patient::whereYear('dateofbirth', '<=', $data65)->count()]);

        \Lava::DonutChart('PatientsAge', $reasons2, [
            'pieHole' => 0.5,
            'titleTextStyle' => [
                'fontName' => 'Arial',
                'fontSize' => 16,
                'fontColor' => 'blue'
            ],
            'chartArea' => [
                'left' => 15,
                'top' => 5,
                'right' => 0,
                'bottom' => 5,
            ]
        ]); 


        $reasons3 = \Lava::DataTable();

        $reasons3->addStringColumn('Types')
                ->addNumberColumn('Percent')
                ->addRow(['Unknown', Clinic::where('type', null)->count()])
                ->addRow(['Clinic', Clinic::where('type', "0")->count()])
                ->addRow(['Mobile', Clinic::where('type', "1")->count()])
                ->addRow(['Secondary Hospital', Clinic::where('type', "2")->count()])
                ->addRow(['Aided Hospital', Clinic::where('type', "3")->count()])
                ->addRow(['TB Hospital', Clinic::where('type', "4")->count()])
                ->addRow(['Tertiary Hospital', Clinic::where('type', "5")->count()]);

        \Lava::DonutChart('Clinics', $reasons3, [
            'pieHole' => 0.5,
            'titleTextStyle' => [
                'fontName' => 'Arial',
                'fontSize' => 16,
                'fontColor' => 'blue'
            ],
            'chartArea' => [
                'left' => 15,
                'top' => 5,
                'right' => 0,
                'bottom' => 5,
            ]
        ]);

        $query = SampleAttribute::where('sample_attribute', 'like', 'Studies')->get();

        $studies = array();

        foreach ($query as $value) {
            array_push($studies, $value->sample_value);
        }

        sort($studies, SORT_FLAG_CASE | SORT_NATURAL);

        $reasons4 = \Lava::DataTable();

        $reasons4->addStringColumn('Samples/Study')
                ->addNumberColumn('Percent')
                ->addRow(['Unclassified', Sample::where('Study', null)->count()]);
        foreach ($studies as $study) {
            $reasons4->addRow([$study, Sample::where('Study', $study)->count()]);
        }

        \Lava::DonutChart('SamplesStudy', $reasons4, [
            'pieHole' => 0.5,
            'titleTextStyle' => [
                'fontName' => 'Arial',
                'fontSize' => 16,
                'fontColor' => 'blue'
            ],
            'chartArea' => [
                'left' => 15,
                'top' => 5,
                'right' => 0,
                'bottom' => 5,
            ]
        ]);

        $reasons5 = \Lava::DataTable();

        $reasons5->addStringColumn('Samples/Category')
                ->addNumberColumn('Percent')
                ->addRow(['Unclassified', Sample::where('Category', "0")->count()])
                ->addRow(['New', Sample::where('Category', "1")->count()])
                ->addRow(['Retreatment', Sample::where('Category', "2")->count()])
                ->addRow(['Pre-treatment', Sample::where('Category', "3")->count()]);

        \Lava::DonutChart('SamplesCat', $reasons5, [
            'pieHole' => 0.5,
            'titleTextStyle' => [
                'fontName' => 'Arial',
                'fontSize' => 16,
                'fontColor' => 'blue'
            ],
            'chartArea' => [
                'left' => 15,
                'top' => 5,
                'right' => 0,
                'bottom' => 5,
            ]
        ]);

        $reasons6 = \Lava::DataTable();

        $reasons6->addStringColumn('Samples/Status')
                ->addNumberColumn('Percent')
                ->addRow(['Not Viable', Sample::where('WGS_Status', "0")->count()])
                ->addRow(['Unknown', Sample::where('WGS_Status', "1")->count()])
                ->addRow(['Not Yet Requested', Sample::where('WGS_Status', "2")->count()])
                ->addRow(['Request Submitted', Sample::where('WGS_Status', "3")->count()])
                ->addRow(['Reculture', Sample::where('WGS_Status', "4")->count()])
                ->addRow(['DNA Extraction Done', Sample::where('WGS_Status', "5")->count()])
                ->addRow(['Quality Check', Sample::where('WGS_Status', "6")->count()])
                ->addRow(['Sequencing', Sample::where('WGS_Status', "7")->count()])
                ->addRow(['WGS Done', Sample::where('WGS_Status', "8")->count()]);

        \Lava::DonutChart('SamplesStat', $reasons6, [
            'pieHole' => 0.5,
            'titleTextStyle' => [
                'fontName' => 'Arial',
                'fontSize' => 16,
                'fontColor' => 'blue'
            ],
            'chartArea' => [
                'left' => 15,
                'top' => 5,
                'right' => 0,
                'bottom' => 5,
            ]
        ]);

        $reasons7 = \Lava::DataTable();

        $reasons7->addStringColumn('Samples/Resistance')
                ->addNumberColumn('Percent')
                ->addRow(['Unclassified', Sample::where('Resistance', "Unclassified")->count()])
                ->addRow(['Poly', Sample::where('Resistance', "Poly")->count()])
                ->addRow(['Inh Mono', Sample::where('Resistance', "Inh Mono")->count()])
                ->addRow(['Rif Mono', Sample::where('Resistance', "Rif Mono")->count()])
                ->addRow(['MDR', Sample::where('Resistance', "MDR")->count()])
                ->addRow(['Pre XDR', Sample::where('Resistance', "Pre XDR")->count()])
                ->addRow(['XDR', Sample::where('Resistance', "XDR")->count()]);

        \Lava::DonutChart('SamplesResist', $reasons7, [
            'pieHole' => 0.5,
            'titleTextStyle' => [
                'fontName' => 'Arial',
                'fontSize' => 16,
                'fontColor' => 'blue'
            ],
            'chartArea' => [
                'left' => 15,
                'top' => 5,
                'right' => 0,
                'bottom' => 5,
            ]
        ]);

        $reasons8 = \Lava::DataTable();

        $reasons8->addStringColumn('Total')
                ->addNumberColumn('Percent')
                ->addRow(['Patients', Patient::all()->count()])
                ->addRow(['Samples', Sample::all()->count()]);

        \Lava::DonutChart('Total', $reasons8, [
            'pieHole' => 0.5,
            'titleTextStyle' => [
                'fontName' => 'Arial',
                'fontSize' => 16,
                'fontColor' => 'blue'
            ],
            'chartArea' => [
                'left' => 15,
                'top' => 5,
                'right' => 0,
                'bottom' => 5,
            ]
        ]);

        return view('home');
    }
}