<?php

namespace App\Exports;

use App\Sample;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;


class SamplesExport implements FromQuery, ShouldAutoSize, WithHeadings
{
    use Exportable;

    public function __construct($columns, $studies, $ch_nums, $patient_ids, $nhls_nos, $statuses, $batch_min, $batch_max)
    {
        $this->columns = [];
        $this->headers = [];
        $this->show_status = false;
        foreach ($columns as $key => $value) {
            if ($key == 'WGS_Status') {
                $this->show_status = true;
            } else {
                array_push($this->columns, $key);
            }
            array_push($this->headers, $value);
        }
        $this->studies = $studies;
        $this->ch_nums = $ch_nums;
        $this->patient_ids = $patient_ids;
        $this->nhls_nos = $nhls_nos;
        $this->statuses = $statuses;
        $this->batch_min = $batch_min;
        $this->batch_max = $batch_max;
    }

    public function query()
    {
        $query = DB::table('samples')->join('patients', 'patients.id', '=', 'samples.patient_id')
                              ->select($this->columns);
        
        if ($this->show_status == true) {
            $query->selectRaw("replace(replace(replace(replace(replace(replace(replace(replace(replace(WGS_Status,'0','Not Viable'),'1','Unknown'),'2','Not Yet Requested'),'3','Request Submitted'),'4','Culture Setup'),'5','DNA Extraction Done'),'6','Quality Control'),'7','Sequencing'),'8','WGS Complete') as WGS_Status");
        }

        if (!empty($this->studies)) {
            $query->where(function ($q) {
                foreach ($this->studies as $study) {
                    $q->orWhere('Study', $study);
                }
            });
        }

        if (!empty($this->ch_nums)) {
            $query->where(function ($q) {
                foreach ($this->ch_nums as $ch_num) {
                    $q->orWhere('Ch_num', $ch_num);
                }
            });
        }

        if (!empty($this->patient_ids)) {
            $query->where(function ($q) {
                foreach ($this->patient_ids as $patient_id) {
                    $q->orWhere('patient_id', $patient_id);
                }
            });
        }

        if (!empty($this->nhls_nos)) {
            $query->where(function ($q) {
                foreach ($this->nhls_nos as $nhls_no) {
                    $q->orWhere('NHLS_no', $nhls_no);
                }
            });
        }

        if (!empty($this->statuses)) {
            $query->where(function ($q) {
                foreach ($this->statuses as $status) {
                    $q->orWhere('WGS_Status', $status);
                }
            });
        }

        return $query->offset($this->batch_min - 1)->limit($this->batch_max)->orderBy('CH_Num');
    }

    public function headings() : array
    {
        return $this->headers;
    }
}