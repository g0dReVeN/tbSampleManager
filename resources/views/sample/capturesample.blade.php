@extends('layouts.app')

@section('title')

    Samples - Sample Details

@endsection

@section('scripts')

    <script type="text/javascript" src="{!! asset('js/jquery.mask.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/capturesample.js') !!}"></script>
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