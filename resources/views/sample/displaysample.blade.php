@extends('layouts.app')

@section('title')

    Samples - Sample Details

@endsection

@section('scripts')

    <script type="text/javascript" src="{!! asset('js/jquery.mask.min.js') !!}"></script>
    <script type="text/javascript">
        $(document).on('DOMContentLoaded', function () {
            $("th").css("text-align", "center")
            $("td").css("text-align", "center")
            $("tr").css("height", "41px")
            $("p:first").css("text-align", "center")
            $("table").css("table-layout", "fixed")
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
            $('td[id="katG_1"]').html("{!! $sample->katG_1 !!}")
            $('td[id="katG_2"]').html("{!! $sample->katG_2 !!}")
            $('td[id="katG_F1"]').html("{!! $sample->katG_F1 !!}")
            $('td[id="katG_F3"]').html("{!! $sample->katG_F3 !!}")
            $('td[id="inhA"]').html("{!! $sample->inhA !!}")
            $('td[id="inhAprom"]').html("{!! $sample->inhAprom !!}")
            $('td[id="ahpC"]').html("{!! $sample->ahpC !!}")
            $('td[id="kasA"]').html("{!! $sample->kasA !!}")
            $('td[id="ndh"]').html("{!! $sample->ndh !!}")
            $('td[id="furA"]').html("{!! $sample->furA !!}")
            $('td[id="Rv0340"]').html("{!! $sample->Rv0340 !!}")
            $('td[id="fbpC"]').html("{!! $sample->fbpC !!}")
            $('td[id="iniA"]').html("{!! $sample->iniA !!}")
            $('td[id="iniB"]').html("{!! $sample->iniB !!}")
            $('td[id="iniC"]').html("{!! $sample->iniC !!}")
            $('td[id="srmRhomo"]').html("{!! $sample->srmRhomo !!}")
            $('td[id="fabD"]').html("{!! $sample->fabD !!}")
            $('td[id="accD6"]').html("{!! $sample->accD6 !!}")
            $('td[id="fadE24"]').html("{!! $sample->fadE24 !!}")
            $('td[id="efpA"]').html("{!! $sample->efpA !!}")
            $('td[id="Rv1592c"]').html("{!! $sample->Rv1592c !!}")
            $('td[id="Rv1772"]').html("{!! $sample->Rv1772 !!}")
            $('td[id="nhoA"]').html("{!! $sample->nhoA !!}")
            $('td[id="mabA"]').html("{!! $sample->mabA !!}")
            $('td[id="rpoB_1"]').html("{!! $sample->rpoB_1 !!}")
            $('td[id="rpoB_2"]').html("{!! $sample->rpoB_2 !!}")
            $('td[id="embB"]').html("{!! $sample->embB !!}")
            $('td[id="pncA_1"]').html("{!! $sample->pncA_1 !!}")
            $('td[id="pncA_2"]').html("{!! $sample->pncA_2 !!}")
            $('td[id="gyrA"]').html("{!! $sample->gyrA !!}")
            $('td[id="rpsL"]').html("{!! $sample->rpsL !!}")
            $('td[id="rrs"]').html("{!! $sample->rrs !!}")
            $('td[id="rrs500"]').html("{!! $sample->rrs500 !!}")
            $('td[id="tlyA"]').html("{!! $sample->tlyA !!}")
            $('td[id="mutT2"]').html("{!! $sample->mutT2 !!}")
            $('td[id="Ogt"]').html("{!! $sample->Ogt !!}")
            $('td[id="Rv3908"]').html("{!! $sample->Rv3908 !!}")
            $('td[id="Inh_mic"]').html("{!! $sample->Inh_mic !!}")
            $('td[id="Rif_mic"]').html("{!! $sample->Rif_mic !!}")
            $('td[id="Emb_mic"]').html("{!! $sample->Emb_mic !!}")
            $('td[id="Pza_mic"]').html("{!! $sample->Pza_mic !!}")
            $('td[id="SM_mic"]').html("{!! $sample->SM_mic !!}")
            $('td[id="Eth_mic"]').html("{!! $sample->Eth_mic !!}")
            $('td[id="Eth_7_2"]').html("{!! $sample->Eth_7_2 !!}")
            $('td[id="Inh_0_2"]').html("{!! $sample->Inh_0_2 !!}")
            $('td[id="Rif_1_0"]').html("{!! $sample->Rif_1_0 !!}")
            $('td[id="Kana_5_0"]').html("{!! $sample->Kana_5_0 !!}")
            $('td[id="Str_2_0"]').html("{!! $sample->Str_2_0 !!}")
            $('td[id="Ofl_2"]').html("{!! $sample->Ofl_2 !!}")
            $('td[id="Ami_5"]').html("{!! $sample->Ami_5 !!}")
            $('td[id="Capreo_10"]').html("{!! $sample->Capreo_10 !!}")
            $('td[id="Ofl_1"]').html("{!! $sample->Ofl_1 !!}")
            $('td[id="Pza_100"]').html("{!! $sample->Pza_100 !!}")
        })

        $(document).on('click', '#patient_id', function() {
            if ("{{ Auth::user()->access }}" == '1')
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
                                            <td id="katG_1"></td>
                                            <td id="katG_2"></td>
                                            <td id="katG_F1"></td>
                                            <td id="katG_F3"></td>
                                            <td id="inhA"></td>
                                        </tr>
                                        <tr>
                                            <th>inhAprom</th>
                                            <th>ahpC</th>
                                            <th>kasA</th>
                                            <th>ndh</th>
                                            <th>furA</th>
                                        </tr>
                                        <tr>
                                            <td id="inhAprom"></td>
                                            <td id="ahpC"></td>
                                            <td id="kasA"></td>
                                            <td id="ndh"></td>
                                            <td id="furA"></td>
                                        </tr>
                                        <tr>
                                            <th>Rv0340</th>
                                            <th>fbpC</th>
                                            <th>iniA</th>
                                            <th>iniB</th>
                                            <th>iniC</th>
                                        </tr>
                                        <tr>
                                            <td id="Rv0340"></td>
                                            <td id="fbpC"></td>
                                            <td id="iniA"></td>
                                            <td id="iniB"></td>
                                            <td id="iniC"></td>
                                        </tr>
                                        <tr>
                                            <th>srmRhomo</th>
                                            <th>fabD</th>
                                            <th>accD6</th>
                                            <th>fadE24</th>
                                            <th>efpA</th>
                                        </tr>
                                        <tr>
                                            <td id="srmRhomo"></td>
                                            <td id="fabD"></td>
                                            <td id="accD6"></td>
                                            <td id="fadE24"></td>
                                            <td id="efpA"></td>
                                        </tr>
                                        <tr>
                                            <th>Rv1592c</th>
                                            <th>Rv1772</th>
                                            <th>nhoA</th>
                                            <th>mabA</th>
                                            <th>rpoB_1</th>
                                        </tr>
                                        <tr>
                                            <td id="Rv1592c"></td>
                                            <td id="Rv1772"></td>
                                            <td id="nhoA"></td>
                                            <td id="mabA"></td>
                                            <td id="rpoB_1"></td>
                                        </tr>
                                        <tr>
                                            <th>rpoB_2</th>
                                            <th>embB</th>
                                            <th>pncA_1</th>
                                            <th>pncA_2</th>
                                            <th>gyrA</th>
                                        </tr>
                                        <tr>
                                            <td id="rpoB_2"></td>
                                            <td id="embB"></td>
                                            <td id="pncA_1"></td>
                                            <td id="pncA_2"></td>
                                            <td id="gyrA"></td>
                                        </tr>
                                        <tr>
                                            <th>rpsL</th>
                                            <th>rrs</th>
                                            <th>rrs 500</th>
                                            <th>tlyA</th>
                                            <th>mutT2</th>
                                        </tr>
                                        <tr>
                                            <td id="rpsL"></td>
                                            <td id="rrs"></td>
                                            <td id="rrs500"></td>
                                            <td id="tlyA"></td>
                                            <td id="mutT2"></td>
                                        </tr>
                                        <tr>
                                            <th>Ogt</th>
                                            <th>Rv3908</th>
                                        </tr>
                                        <tr>
                                            <td id="Ogt"></td>
                                            <td id="Rv3908"></td>
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
                                            <td id="Inh_mic"></td>
                                            <td id="Rif_mic"></td>
                                            <td id="Emb_mic"></td>
                                            <td id="Pza_mic"></td>
                                            <td id="SM_mic"></td>
                                        </tr>
                                        <tr>
                                            <th>Eth</th>
                                        </tr>
                                        <tr>
                                            <td id="Eth_mic"></td>
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
                                            <td id="Eth_7_2"></td>
                                            <td id="Inh_0_2"></td>
                                            <td id="Rif_1_0"></td>
                                            <td id="Kana_5_0"></td>
                                            <td id="Str_2_0"></td>
                                        </tr>
                                        <tr>
                                            <th>Ofl 2</th>
                                            <th>Ami 5</th>
                                            <th>Capreo 10</th>
                                            <th>Ofl 1</th>
                                            <th>Pza 100</th>
                                        </tr>
                                        <tr>
                                            <td id="Ofl_2"></td>
                                            <td id="Ami_5"></td>
                                            <td id="Capreo_10"></td>
                                            <td id="Ofl_1"></td>
                                            <td id="Pza_100"></td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </nav>
                <br>
            </div>
        </div>
    </div>

@endsection