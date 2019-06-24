<?php

namespace App\Http\Controllers;

use DB;
use App\Patient;
use App\Sample;
use Illuminate\Http\Request;

class MigrationController extends Controller
{
    public function patients() {

        $old = DB::query()->from('patient')->get();
        
        $x = 1;

        foreach ($old as $row) {
            $patient = new Patient;
            
            $patient->id = $row->ID;
            $patient->nhls_id = $row->NHLSID;
            $patient->surname = $row->Surname;
            $patient->firstname = $row->Firstname;
            $patient->sex = $row->Sex;
            $patient->date_of_birth = $row->DOB;
            $patient->identity_check = $row->identity_check;
            $patient->created_at = $row->timestmp;
            $patient->updated_at = $row->timestmp;

            $patient->save();

            print("<h6>" . $x++ . " - " . $row->ID . "</h6>");
        }
    }

    public function samples() {

        $old = DB::query()->from('sample')->get();

        $x = 1;

        foreach ($old as $row) {
            $sample = new Sample;
            
            $sample->id = $row->sample_id;
            $sample->patient_id = $row->Patient_ID;
            $sample->Study = $row->DB;
            $sample->CH_Num = $row->Ch_num;
            $sample->Received_Date = $row->Received_Date;
            $sample->Age = $row->Age;
            if (strtolower($row->Category) == "unclassified") {
                $sample->Category = '0';
            } else if (strtolower($row->Category) == "new") {
                $sample->Category = '1';
            } else if (strtolower($row->Category) == "retreatment") {
                $sample->Category = '2';
            } else if (strtolower($row->Category) == "pre-treatment") {
                $sample->Category = '3';
            }
            $sample->Clinic = $row->Clinic;
            $sample->Origin = $row->Origin;
            $sample->NHLS_No = $row->NHLSno;
            $sample->NHLS_Reg_Date = $row->NHLSregDate;
            $sample->Remark = $row->Remark;
            $sample->Auramine = $row->Auramine;
            $sample->ZN = $row->ZN;
            $sample->Niacin = $row->Niacin;
            $sample->Capreo = $row->Capreo;
            $sample->Inh = $row->Inh;
            $sample->Rif = $row->Rif;
            $sample->ETHAM = $row->ETHAM;
            $sample->ETHIO = $row->ETHIO;
            $sample->Ofloxacin = $row->Ofloxacin;
            $sample->Amikacin = $row->Amikacin;
            $sample->SM = $row->SM;
            $sample->KANA5 = $row->KANA5;
            $sample->Pyriz = $row->Pyriz;
            $sample->THIA = $row->THIA;
            $sample->CYCLO = $row->CYCLO;
            $sample->Bedaquiline = $row->Bedaquiline;
            $sample->Clofazimine = $row->Clofazimine;
            $sample->Delamanid = $row->Delamanid;
            $sample->Levofloxacin = $row->Levofloxacin;
            $sample->Linezolid = $row->Linezolid;
            $sample->Moxifloxacin_Low = $row->Moxifloxacin_low;
            $sample->Moxifloxacin_High = $row->Moxifloxacin_high;
            $sample->pAminosalicilic_Acid = $row->pAminosalicilic_acid;
            $sample->Rifabutin = $row->Rifabutin;
            $sample->Resistance = $row->Resistance;
            $sample->katG_1 = $row->katG_1;
            $sample->katG_2 = $row->katG_2;
            $sample->katG_F1 = $row->katG_F1;
            $sample->katG_F3 = $row->katG_F3;
            $sample->inhA = $row->inhA;
            $sample->inhAprom = $row->inhAPROM;
            $sample->ahpC = $row->ahpC;
            $sample->kasA = $row->kasA;
            $sample->ndh = $row->ndh;
            $sample->furA = $row->furA;
            $sample->Rv0340 = $row->Rv0340;
            $sample->fbpC = $row->fbpc;
            $sample->iniA = $row->iniA;
            $sample->iniB = $row->iniB;
            $sample->iniC = $row->iniC;
            $sample->srmRhomo = $row->srmRhomolog;
            $sample->fabD = $row->fabD;
            $sample->accD6 = $row->accD6;
            $sample->fadE24 = $row->fadE24;
            $sample->efpA = $row->efpA;
            $sample->Rv1592c = $row->Rv1592;
            $sample->Rv1772 = $row->Rv1772;
            $sample->nhoA = $row->nhoA;
            $sample->mabA = $row->mabA;
            $sample->rpoB_1 = $row->rpoB_1;
            $sample->rpoB_2 = $row->rpoB_2;
            $sample->embB = $row->embB;
            $sample->pncA_1 = $row->pncA_1;
            $sample->pncA_2 = $row->pncA_2;
            $sample->gyrA = $row->gyrA;
            $sample->rpsL = $row->rpsL;
            $sample->rrs = $row->rrs;
            $sample->rrs500 = $row->rrs500;
            $sample->tlyA = $row->tlyA;
            $sample->mutT2 = $row->mutT2;
            $sample->Ogt = $row->ogt;
            $sample->Rv3908 = $row->Rv3908;
            $sample->Inh_mic = $row->inh_mic;
            $sample->Rif_mic = $row->rif_mic;
            $sample->Emb_mic = $row->emb_mic;
            $sample->Pza_mic = $row->pza_mic;
            $sample->SM_mic = $row->sm_mic;
            $sample->Eth_mic = $row->eth_mic;
            $sample->Eth_7_2 = $row->Eth_7_2;
            $sample->Inh_0_2 = $row->Inh_0_2;
            $sample->Rif_1_0 = $row->Rif_1_0;
            $sample->Kana_5_0 = $row->Kana_5_0;
            $sample->Str_2_0 = $row->Str_2_0;
            $sample->Ofl_2 = $row->Ofl_2;
            $sample->Ami_5 = $row->Ami_5;
            $sample->Capreo_10 = $row->Capreo_10;
            $sample->Ofl_1 = $row->Ofl_1;
            $sample->Pza_100 = $row->Pza_100;
            $sample->WGS_Status = '1';
            $sample->created_at = $row->timestmp;
            $sample->updated_at = $row->timestmp;

            $sample->save();

            print("<h6>" . $x++ . " - " . $row->sample_id . "</h6>");
        }
    }
}