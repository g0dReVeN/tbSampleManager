@extends('layout')

@section('title')

    Samples - Sample Details

@endsection

@section('scripts')

    <script type="text/javascript" src="{!! asset('js/jquery.mask.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/editsample.js') !!}"></script>
    <script type="text/javascript">
        $(document).on('DOMContentLoaded', function () {
            $('td[id="Study"]').html("{!! $sample->Study !!}")
            $('td[id="CH_Num"]').html("{!! $sample->CH_Num !!}")
            $('td[id="Received_Date"]').html("{!! $sample->Received_Date !!}")
            $('td[id="Age"]').html("{!! $sample->Age !!}")
            $('td[id="Category"]').html("{!! $sample->Category !!}")
            $('td[id="Clinic"]').html("{!! $sample->Clinic !!}")
            $('td[id="Origin"]').html("{!! $sample->Origin !!}")
            $('td[id="NHLS_No"]').html("{!! $sample->NHLS_No !!}")
            $('td[id="NHLS_Reg_Date"]').html("{!! $sample->NHLS_Reg_Date !!}")
            $('td[id="Remark"]').html("{!! $sample->Remark !!}")
            $('td[id="Auramine"]').html("{!! $sample->Auramine !!}")
            $('td[id="ZN"]').html("{!! $sample->ZN !!}")
            $('td[id="Niacin"]').html("{!! $sample->Niacin !!}")
            $('td[id="Capreo"]').html("{!! $sample->Capreo !!}")
            $('td[id="Inh"]').html("{!! $sample->Inh !!}")
            $('td[id="Rif"]').html("{!! $sample->Rif !!}")
            $('td[id="ETHAM"]').html("{!! $sample->ETHAM !!}")
            $('td[id="ETHIO"]').html("{!! $sample->ETHIO !!}")
            $('td[id="Ofloxacin"]').html("{!! $sample->Ofloxacin !!}")
            $('td[id="Amikacin"]').html("{!! $sample->Amikacin !!}")
            $('td[id="SM"]').html("{!! $sample->SM !!}")
            $('td[id="KANA5"]').html("{!! $sample->KANA5 !!}")
            $('td[id="Pyriz"]').html("{!! $sample->Pyriz !!}")
            $('td[id="THIA"]').html("{!! $sample->THIA !!}")
            $('td[id="CYCLO"]').html("{!! $sample->CYCLO !!}")
            $('td[id="Bedaquiline"]').html("{!! $sample->Bedaquiline !!}")
            $('td[id="Clofazimine"]').html("{!! $sample->Clofazimine !!}")
            $('td[id="Delamanid"]').html("{!! $sample->Delamanid !!}")
            $('td[id="Levofloxacin"]').html("{!! $sample->Levofloxacin !!}")
            $('td[id="Linezolid"]').html("{!! $sample->Linezolid !!}")
            $('td[id="Moxifloxacin_Low"]').html("{!! $sample->Moxifloxacin_Low !!}")
            $('td[id="Moxifloxacin_High"]').html("{!! $sample->Moxifloxacin_High !!}")
            $('td[id="pAminosalicilic_Acid"]').html("{!! $sample->pAminosalicilic_Acid !!}")
            $('td[id="Rifabutin"]').html("{!! $sample->Rifabutin !!}")
            $('td[id="Resistance"]').html("{!! $sample->Resistance !!}")
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
        
        $(document).on('click', '#patient_id', function() {
            if ("{{ Auth::user()->access }}" == '3')
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
                                            <td id="Study"></td>
                                            <td id="CH_Num"></td>
                                            <td id="Received_Date"></td>
                                            <td id="Age"></td>
                                            <td id="Category"></td>
                                        </tr>
                                        <tr>
                                            <th>Clinic</th>
                                            <th>Origin</th>
                                            <th>NHLS No.</th>
                                            <th>NHLS Reg. Date</th>
                                            <th>Remark</th>
                                        </tr>
                                        <tr>
                                            <td id="Clinic"></td>
                                            <td id="Origin"></td>
                                            <td id="NHLS_No"></td>
                                            <td id="NHLS_Reg_Date"></td>
                                            <td id="Remark"></td>
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
                                            <td id="Auramine"></td>
                                            <td id="ZN"></td>
                                            <td id="Niacin"></td>
                                            <td id="Capreo"></td>
                                            <td id="Inh"></td>
                                        </tr>
                                        <tr>
                                            <th>Rif</th>
                                            <th>Etham</th>
                                            <th>Ethio</th>
                                            <th>Ofloxacin</th>
                                            <th>Amikacin</th>
                                        </tr>
                                        <tr>
                                            <td id="Rif"></td>
                                            <td id="ETHAM"></td>
                                            <td id="ETHIO"></td>
                                            <td id="Ofloxacin"></td>
                                            <td id="Amikacin"></td>
                                        </tr>
                                        <tr>
                                            <th>SM</th>
                                            <th>KANA5</th>
                                            <th>Pyriz</th>
                                            <th>THIA</th>
                                            <th>CYCLO</th>
                                        </tr>
                                        <tr>
                                            <td id="SM"></td>
                                            <td id="KANA5"></td>
                                            <td id="Pyriz"></td>
                                            <td id="THIA"></td>
                                            <td id="CYCLO"></td>
                                        </tr>
                                        <tr>
                                            <th>Bedaquiline</th>
                                            <th>Clofazimine</th>
                                            <th>Delamanid</th>
                                            <th>Levofloxacin</th>
                                            <th>Linezolid</th>
                                        </tr>
                                        <tr>
                                            <td id="Bedaquiline"></td>
                                            <td id="Clofazimine"></td>
                                            <td id="Delamanid"></td>
                                            <td id="Levofloxacin"></td>
                                            <td id="Linezolid"></td>
                                        </tr>
                                        <tr>
                                            <th>Moxifloxacin Low</th>
                                            <th>Moxifloxacin High</th>
                                            <th>pAminosalicilic Acid</th>
                                            <th>Rifabutin</th>
                                            <th>Resistance</th>
                                        </tr>
                                        <tr>
                                            <td id="Moxifloxacin_Low"></td>
                                            <td id="Moxifloxacin_High"></td>
                                            <td id="pAminosalicilic_Acid"></td>
                                            <td id="Rifabutin"></td>
                                            <td id="Resistance"></td>
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
                                        <button id="ajaxUpdate" name="{!! $sample->id !!}" class="button is-primary is-fullwidth">Update</button>
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