@extends('layout')

@section('title')

    Samples - Sample Details

@endsection

@section('scripts')

    <script type="text/javascript" src="{!! asset('js/jquery.mask.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/sample.js') !!}"></script>
    <script type="text/javascript">
        $(document).on('DOMContentLoaded', function () {
            $('select[id="Study"]').val("{!! $sample->Study !!}")
            $('input[id="CH_Num"]').val("{!! $sample->CH_Num !!}")
            $('input[id="Received_Date"]').val("{!! $sample->Received_Date !!}")
            $('input[id="Age"]').val("{!! $sample->Age !!}")
            $('select[id="Category"]').val("{!! $sample->Category !!}")
            $('select[id="Clinic"]').val("{!! $sample->Clinic !!}")
            $('select[id="Origin"]').val("{!! $sample->Origin !!}")
            $('input[id="NHLS_No"]').val("{!! $sample->NHLS_No !!}")
            $('input[id="NHLS_Reg_Date"]').val("{!! $sample->NHLS_Reg_Date !!}")
            $('input[id="Remark"]').val("{!! $sample->Remark !!}")
            $('select[id="Auramine"]').val("{!! $sample->Auramine !!}")
            $('select[id="ZN"]').val("{!! $sample->ZN !!}")
            $('select[id="Niacin"]').val("{!! $sample->Niacin !!}")
            $('select[id="Capreo"]').val("{!! $sample->Capreo !!}")
            $('select[id="Inh"]').val("{!! $sample->Inh !!}")
            $('select[id="Rif"]').val("{!! $sample->Rif !!}")
            $('select[id="ETHAM"]').val("{!! $sample->ETHAM !!}")
            $('select[id="ETHIO"]').val("{!! $sample->ETHIO !!}")
            $('select[id="Ofloxacin"]').val("{!! $sample->Ofloxacin !!}")
            $('select[id="Amikacin"]').val("{!! $sample->Amikacin !!}")
            $('select[id="SM"]').val("{!! $sample->SM !!}")
            $('select[id="KANA5"]').val("{!! $sample->KANA5 !!}")
            $('select[id="Pyriz"]').val("{!! $sample->Pyriz !!}")
            $('select[id="THIA"]').val("{!! $sample->THIA !!}")
            $('select[id="CYCLO"]').val("{!! $sample->CYCLO !!}")
            $('select[id="Bedaquiline"]').val("{!! $sample->Bedaquiline !!}")
            $('select[id="Clofazimine"]').val("{!! $sample->Clofazimine !!}")
            $('select[id="Delamanid"]').val("{!! $sample->Delamanid !!}")
            $('select[id="Levofloxacin"]').val("{!! $sample->Levofloxacin !!}")
            $('select[id="Linezolid"]').val("{!! $sample->Linezolid !!}")
            $('select[id="Moxifloxacin_Low"]').val("{!! $sample->Moxifloxacin_Low !!}")
            $('select[id="Moxifloxacin_High"]').val("{!! $sample->Moxifloxacin_High !!}")
            $('select[id="pAminosalicilic_Acid"]').val("{!! $sample->pAminosalicilic_Acid !!}")
            $('select[id="Rifabutin"]').val("{!! $sample->Rifabutin !!}")
            $('select[id="Resistance"]').val("{!! $sample->Resistance !!}")
            $('select[id="katG_1"]').val("{!! $sample->katG_1 !!}")
            $('select[id="katG_2"]').val("{!! $sample->katG_2 !!}")
            $('select[id="katG_F1"]').val("{!! $sample->katG_F1 !!}")
            $('select[id="katG_F3"]').val("{!! $sample->katG_F3 !!}")
            $('select[id="inhA"]').val("{!! $sample->inhA !!}")
            $('select[id="inhAprom"]').val("{!! $sample->inhAprom !!}")
            $('select[id="ahpC"]').val("{!! $sample->ahpC !!}")
            $('select[id="kasA"]').val("{!! $sample->kasA !!}")
            $('select[id="ndh"]').val("{!! $sample->ndh !!}")
            $('select[id="furA"]').val("{!! $sample->furA !!}")
            $('select[id="Rv0340"]').val("{!! $sample->Rv0340 !!}")
            $('select[id="fbpC"]').val("{!! $sample->fbpC !!}")
            $('select[id="iniA"]').val("{!! $sample->iniA !!}")
            $('select[id="iniB"]').val("{!! $sample->iniB !!}")
            $('select[id="iniC"]').val("{!! $sample->iniC !!}")
            $('select[id="srmRhomo"]').val("{!! $sample->srmRhomo !!}")
            $('select[id="fabD"]').val("{!! $sample->fabD !!}")
            $('select[id="accD6"]').val("{!! $sample->accD6 !!}")
            $('select[id="fadE24"]').val("{!! $sample->fadE24 !!}")
            $('select[id="efpA"]').val("{!! $sample->efpA !!}")
            $('select[id="Rv1592c"]').val("{!! $sample->Rv1592c !!}")
            $('select[id="Rv1772"]').val("{!! $sample->Rv1772 !!}")
            $('select[id="nhoA"]').val("{!! $sample->nhoA !!}")
            $('select[id="mabA"]').val("{!! $sample->mabA !!}")
            $('select[id="rpoB_1"]').val("{!! $sample->rpoB_1 !!}")
            $('select[id="rpoB_2"]').val("{!! $sample->rpoB_2 !!}")
            $('select[id="embB"]').val("{!! $sample->embB !!}")
            $('select[id="pncA_1"]').val("{!! $sample->pncA_1 !!}")
            $('select[id="pncA_2"]').val("{!! $sample->pncA_2 !!}")
            $('select[id="gyrA"]').val("{!! $sample->gyrA !!}")
            $('select[id="rpsL"]').val("{!! $sample->rpsL !!}")
            $('select[id="rrs"]').val("{!! $sample->rrs !!}")
            $('select[id="rrs500"]').val("{!! $sample->rrs500 !!}")
            $('select[id="tlyA"]').val("{!! $sample->tlyA !!}")
            $('select[id="mutT2"]').val("{!! $sample->mutT2 !!}")
            $('select[id="Ogt"]').val("{!! $sample->Ogt !!}")
            $('select[id="Rv3908"]').val("{!! $sample->Rv3908 !!}")
            $('select[id="Inh_mic"]').val("{!! $sample->Inh_mic !!}")
            $('select[id="Rif_mic"]').val("{!! $sample->Rif_mic !!}")
            $('select[id="Emb_mic"]').val("{!! $sample->Emb_mic !!}")
            $('select[id="Pza_mic"]').val("{!! $sample->Pza_mic !!}")
            $('select[id="SM_mic"]').val("{!! $sample->SM_mic !!}")
            $('select[id="Eth_mic"]').val("{!! $sample->Eth_mic !!}")
            $('select[id="Eth_7_2"]').val("{!! $sample->Eth_7_2 !!}")
            $('select[id="Inh_0_2"]').val("{!! $sample->Inh_0_2 !!}")
            $('select[id="Rif_1_0"]').val("{!! $sample->Rif_1_0 !!}")
            $('select[id="Kana_5_0"]').val("{!! $sample->Kana_5_0 !!}")
            $('select[id="Str_2_0"]').val("{!! $sample->Str_2_0 !!}")
            $('select[id="Ofl_2"]').val("{!! $sample->Ofl_2 !!}")
            $('select[id="Ami_5"]').val("{!! $sample->Ami_5 !!}")
            $('select[id="Capreo_10"]').val("{!! $sample->Capreo_10 !!}")
            $('select[id="Ofl_1"]').val("{!! $sample->Ofl_1 !!}")
            $('select[id="Pza_100"]').val("{!! $sample->Pza_100 !!}")
        })

        $(document).on('change', 'select[id="Clinic"]', function() {
            let clinics = @json($clinics);
            Object.values(clinics).forEach(function(clinic) {
                if ($('select[id="Clinic"]').val() == clinic.clinic)
                    $('select[id="Origin"]').val(clinic.origin)
            })
        })

        $(document).on('click', '#patient_id', function() {
            location.assign('/patients/' + "{!! $sample->patient_id !!}")
        })

    </script>

@endsection

@section('header')

    Samples - Sample Details

@endsection

@section('content')

    <div class="container">
        <div class="columns is-marginless is-centered">
            <div class="column is-12">
                <br>
                <nav class="card">
                    <header class="card-header">
                        <div class="column is-12">

                            <form id="delete-form" method="POST" action="/samples">
                                {!! csrf_field() !!}
                                {!! method_field('DELETE') !!}
                                <input type="hidden" name="id" value="{!! $sample->id !!}">
                            </form>

                            <p class="panel-heading">
                                <b>Sample Details</b>
                            </p>

                            <table class="table is-bordered is-fullwidth">
                                <thead>
                                    <tr>
                                        <th>Patient ID</th>
                                        <th>Sample ID</th>
                                        <th>Study</th>
                                        <th>CH Number</th>
                                        <th>WGS Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th id="patient_id">
                                            {!! $sample->patient_id !!}
                                        </th>
                                        <th id="id">
                                            {!! $sample->id !!}
                                        </th>
                                        <th id="Study">
                                            {!! $sample->Study !!}
                                        </th>
                                        <th id="CH_Num">
                                            {!! $sample->CH_Num !!}
                                        </th>
                                        <th id="WGS_Status">
                                            {!! $wgs_status[$sample->WGS_Status] !!}
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </header>
 
                    <div class="card-content">
                        <div class="columns is-marginless is-centered">
                            <div class="column is-12">

                                <p class="panel-heading">
                                    <b>General</b>
                                </p>
                                <table id="general" class="table is-bordered is-striped is-hoverable is-fullwidth">
                                    <tbody>
                                        <tr>
                                            <th>Study</th>
                                            <th>CH Number</th>
                                            <th>Received Date</th>
                                            <th>Age</th>
                                            <th>Category</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="Study" id="Study">
                                                        @foreach ($attributes as $studies)
                                                            @if ($studies->sample_attribute == "Studies")
                                                                <option value="{!! $studies->sample_value !!}">{!! $studies->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td><input class="input" name="CH_Num" id="CH_Num" type="number"></td>
                                            <td><input class="input" name="Received_Date" id="Received_Date" type="text"></td>
                                            <td><input class="input" name="Age" id="Age" type="number"></td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="Category" id="Category">
                                                        <option value="0" selected>Unclassified</option>
                                                        <option value="1">New</option>
                                                        <option value="2">Retreatment</option>
                                                        <option value="3">Pre-treatment</option>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Clinic</th>
                                            <th>Origin</th>
                                            <th>NHLS No.</th>
                                            <th>NHLS Reg. Date</th>
                                            <th>Remark</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="Clinic" id="Clinic">
                                                        <option></option>
                                                        @foreach ($clinics as $clinic)
                                                            <option value="{!! $clinic->clinic !!}">{!! $clinic->clinic !!}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="Origin" id="Origin">
                                                        <option></option>
                                                        @php
                                                                $data = array();
                                                                foreach ($clinics as $clinic) {
                                                                    if ($clinic->origin)
                                                                        array_push($data, $clinic->origin);
                                                                }
                                                                $data = array_unique($data);
                                                                sort($data, SORT_FLAG_CASE | SORT_NATURAL);
                                                                foreach ($data as $origin) {
                                                                    echo "<option value='$origin'>$origin</option>";
                                                                }
                                                        @endphp
                                                    </select>
                                                </div>
                                            </td>
                                            <td><input class="input" name="NHLS_No" id="NHLS_No" type="text"></td>
                                            <td><input class="input" name="NHLS_Reg_Date" id="NHLS_Reg_Date" type="text"></td>
                                            <td><input class="input" name="Remark" id="Remark" type="text"></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <p class="panel-heading">
                                    <b>NHLS Smear & DST</b>
                                </p>
                                <table id="smearDST" class="table is-bordered is-striped is-hoverable is-fullwidth">
                                    <tbody>
                                        <tr>
                                            <th>Auramine</th>
                                            <th>ZN</th>
                                            <th>Niacin</th>
                                            <th>Capreo</th>
                                            <th>Inh</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="Auramine" id="Auramine">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "Auramine")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="ZN" id="ZN">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "ZN")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="Niacin" id="Niacin">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "Niacin")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="Capreo" id="Capreo">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "Capreo")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select class="resist" name="Inh" id="Inh">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "Inh")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Rif</th>
                                            <th>Etham</th>
                                            <th>Ethio</th>
                                            <th>Ofloxacin</th>
                                            <th>Amikacin</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select class="resist" name="Rif" id="Rif">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "Rif")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="ETHAM" id="ETHAM">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "ETHAM")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="ETHIO" id="ETHIO">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "ETHIO")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select class="resist" name="Ofloxacin" id="Ofloxacin">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "Ofloxacin")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select class="resist" name="Amikacin" id="Amikacin">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "Amikacin")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>SM</th>
                                            <th>KANA5</th>
                                            <th>Pyriz</th>
                                            <th>THIA</th>
                                            <th>CYCLO</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="SM" id="SM">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "SM")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="KANA5" id="KANA5">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "KANA5")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="Pyriz" id="Pyriz">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "Pyriz")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="THIA" id="THIA">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "THIA")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="CYCLO" id="CYCLO">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "CYCLO")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Bedaquiline</th>
                                            <th>Clofazimine</th>
                                            <th>Delamanid</th>
                                            <th>Levofloxacin</th>
                                            <th>Linezolid</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="Bedaquiline" id="Bedaquiline">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "Bedaquiline")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="Clofazimine" id="Clofazimine">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "Clofazimine")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="Delamanid" id="Delamanid">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "Delamanid")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="Levofloxacin" id="Levofloxacin">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "Levofloxacin")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="Linezolid" id="Linezolid">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "Linezolid")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Moxifloxacin Low</th>
                                            <th>Moxifloxacin High</th>
                                            <th>pAminosalicilic Acid</th>
                                            <th>Rifabutin</th>
                                            <th>Resistance</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="Moxifloxacin_Low" id="Moxifloxacin_Low">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "Moxifloxacin_Low")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="Moxifloxacin_High" id="Moxifloxacin_High">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "Moxifloxacin_High")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="pAminosalicilic_Acid" id="pAminosalicilic_Acid">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "pAminosalicilic_Acid")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="Rifabutin" id="Rifabutin">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "Rifabutin")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="Resistance" id="Resistance">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "Resistance")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <p class="panel-heading">
                                    <b>Mutations</b>
                                </p>
                                <table id="mutations" class="table is-bordered is-striped is-hoverable is-fullwidth">
                                    <tbody>
                                        <tr>
                                            <th>katG_1</th>
                                            <th>katG_2</th>
                                            <th>katG_F1</th>
                                            <th>katG_F3</th>
                                            <th>inhA</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="katG_1" id="katG_1">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "katG")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="katG_2" id="katG_2">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "katG")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="katG_F1" id="katG_F1">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "katG_F")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="katG_F3" id="katG_F3">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "katG_F")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="inhA" id="inhA">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "inhA")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>inhAprom</th>
                                            <th>ahpC</th>
                                            <th>kasA</th>
                                            <th>ndh</th>
                                            <th>furA</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="inhAprom" id="inhAprom">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "inhAprom")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="ahpC" id="ahpC">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "ahpC")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="kasA" id="kasA">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "kasA")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="ndh" id="ndh">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "ndh")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="furA" id="furA">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "furA")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Rv0340</th>
                                            <th>fbpC</th>
                                            <th>iniA</th>
                                            <th>iniB</th>
                                            <th>iniC</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="Rv0340" id="Rv0340">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "Rv0340")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="fbpC" id="fbpC">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "fbpC")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="iniA" id="iniA">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "iniA")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="iniB" id="iniB">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "iniB")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="iniC" id="iniC">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "iniC")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>srmRhomo</th>
                                            <th>fabD</th>
                                            <th>accD6</th>
                                            <th>fadE24</th>
                                            <th>efpA</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="srmRhomo" id="srmRhomo">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "srmRhomo")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="fabD" id="fabD">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "fabD")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="accD6" id="accD6">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "accD6")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="fadE24" id="fadE24">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "fadE24")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="efpA" id="efpA">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "efpA")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Rv1592c</th>
                                            <th>Rv1772</th>
                                            <th>nhoA</th>
                                            <th>mabA</th>
                                            <th>rpoB_1</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="Rv1592c" id="Rv1592c">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "Rv1592c")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="Rv1772" id="Rv1772">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "Rv1772")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="nhoA" id="nhoA">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "nhoA")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="mabA" id="mabA">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "mabA")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="rpoB_1" id="rpoB_1">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "rpoB")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>rpoB_2</th>
                                            <th>embB</th>
                                            <th>pncA_1</th>
                                            <th>pncA_2</th>
                                            <th>gyrA</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="rpoB_2" id="rpoB_2">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "rpoB")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="embB" id="embB">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "embB")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="pncA_1" id="pncA_1">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "pncA")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="pncA_2" id="pncA_2">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "pncA")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="gyrA" id="gyrA">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "gyrA")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>rpsL</th>
                                            <th>rrs</th>
                                            <th>rrs 500</th>
                                            <th>tlyA</th>
                                            <th>mutT2</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="rpsL" id="rpsL">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "rpsL")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="rrs" id="rrs">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "rrs")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="rrs500" id="rrs500">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "rrs500")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="tlyA" id="tlyA">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "tlyA")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="mutT2" id="mutT2">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "mutT2")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Ogt</th>
                                            <th>Rv3908</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="Ogt" id="Ogt">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "Ogt")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="Rv3908" id="Rv3908">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "Rv3908")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <p class="panel-heading">
                                    <b>MIC</b>
                                </p>
                                <table id="mic" class="table is-bordered is-striped is-hoverable is-fullwidth">
                                    <tbody>
                                        <tr>
                                            <th>Inh</th>
                                            <th>Rif</th>
                                            <th>Emb</th>
                                            <th>Pza</th>
                                            <th>SM</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="Inh_mic" id="Inh_mic">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "Inh_mic")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="Rif_mic" id="Rif_mic">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "Rif_mic")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="Emb_mic" id="Emb_mic">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "Emb_mic")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="Pza_mic" id="Pza_mic">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "Pza_mic")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="SM_mic" id="SM_mic">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "SM_mic")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Eth</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="Eth_mic" id="Eth_mic">
                                                        <option></option>
                                                        @foreach ($attributes as $attribute)
                                                            @if ($attribute->sample_attribute == "Eth_mic")
                                                                <option value="{!! $attribute->sample_value !!}">{!! $attribute->sample_value !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <p class="panel-heading">
                                    <b>SU Lab DST</b>
                                </p>
                                <table id="labDST" class="table is-bordered is-striped is-hoverable is-fullwidth">
                                    <tbody>
                                        <tr>
                                            <th>Eth 7.2</th>
                                            <th>Inh 0.2</th>
                                            <th>Rif 1.0</th>
                                            <th>Kana 5.0</th>
                                            <th>Str 2.0</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="Eth_7_2" id="Eth_7_2">
                                                        <option selected value=''></option>
                                                        <option value='R'>R</option>
                                                        <option value='S'>S</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="Inh_0_2" id="Inh_0_2">
                                                        <option selected value=''></option>
                                                        <option value='R'>R</option>
                                                        <option value='S'>S</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="Rif_1_0" id="Rif_1_0">
                                                        <option selected value=''></option>
                                                        <option value='R'>R</option>
                                                        <option value='S'>S</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="Kana_5_0" id="Kana_5_0">
                                                        <option selected value=''></option>
                                                        <option value='R'>R</option>
                                                        <option value='S'>S</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="Str_2_0" id="Str_2_0">
                                                        <option selected value=''></option>
                                                        <option value='R'>R</option>
                                                        <option value='S'>S</option>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Ofl 2</th>
                                            <th>Ami 5</th>
                                            <th>Capreo 10</th>
                                            <th>Ofl 1</th>
                                            <th>Pza 100</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="Ofl_2" id="Ofl_2">
                                                        <option selected value=''></option>
                                                        <option value='R'>R</option>
                                                        <option value='S'>S</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="Ami_5" id="Ami_5">
                                                        <option selected value=''></option>
                                                        <option value='R'>R</option>
                                                        <option value='S'>S</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="Capreo_10" id="Capreo_10">
                                                        <option selected value=''></option>
                                                        <option value='R'>R</option>
                                                        <option value='S'>S</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="Ofl_1" id="Ofl_1">
                                                        <option selected value=''></option>
                                                        <option value='R'>R</option>
                                                        <option value='S'>S</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <select name="Pza_100" id="Pza_100">
                                                        <option selected value=''></option>
                                                        <option value='R'>R</option>
                                                        <option value='S'>S</option>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="columns">
                                    <div class="column">
                                        <button id="reset" class="button is-primary is-fullwidth">Reset</button>
                                    </div>

                                    <div class="column">
                                        <button id="ajaxUpdate" name="{!! $sample->id !!}" class="button is-primary is-fullwidth">Update</button>
                                    </div>

                                    <div class="column">
                                        <button id="delete" form="delete-form" class="button is-primary is-fullwidth">Delete</button>
                                    </div>
                                </div>

                                <article class="message is-success"><div id="alert" class="message-body" style="display: none;"></div></article>

                            </div>
                        </div>
                    </div>
                </nav>
                <br>
            </div>
        </div>
    </div>

@endsection