@extends('layout')

@section('title', 'Custom Query')

@section('header', 'TB Sample Manager - Custom Query')

@section('scripts')
    
    <script>
        $(document).on('DOMContentLoaded', function () {
            $('.sampleAttr').each(function() {
                $(this).addClass("button is-small is-primary is-outlined is-fullwidth")
            })
            $('#selectAll').addClass("button is-small is-primary is-outlined is-fullwidth")
        })

        $(document).on('click', '#queryAjax', function() {
            let status = []
            $('#status option:selected').each(function() {
                status.push(this.value)
            })

            let studies = []
            $('#studies option:selected').each(function() {
                studies.push(this.value)
            })
            if (studies.length == 0) {
                alert("Please select a study(s)")
                return
            }
            
            let columns = {};
            let accesslvl = {!! Auth::user()->access !!}
            if ((accesslvl >= '3' && accesslvl <= '6') || accesslvl == '1') { 
                columns = {
                    'firstname' : 'Firstname',
                    'surname' : 'Surname',
                    'nhlsid' : 'NHLS ID',
                    'dateofbirth' : 'Date of Birth',
                    'sex' : 'Sex',
                    'Study' : 'Study'
                }
            }

            $('.sampleAttr').each(function() {
                if (!$(this).hasClass("is-outlined")) {
                    columns[this.name] = this.text
                }
            })

            $.ajax({
                type: 'POST',
                url: '/customq',
                data: {
                    studies: studies,
                    columns: columns,
                    status: status,
                    ch_nums: $('[name="Ch_num_criterion"]').val(),
                    patient_ids: $('[name="patient_id_criterion"]').val(),
                    nhls_nos: $('[name="NHLS_no_criterion"]').val(),
                    batch_min: $('[name="batchMin"]').val(),
                    batch_max: $('[name="batchMax"]').val()
                },
                success: function(data) {
                    window.open('/customq/download/' + data)
                }
            })
        })

        $(document).on('dblclick', '#studies', function() {
            let studies = []
            $('#studies option').each(function() {
                studies.push(this.value)
            })
            $("#studies").val(studies)
        })

        $(document).on('dblclick', '#status', function() {
            let status = []
            $('#status option').each(function() {
                status.push(this.value)
            })
            $("#status").val(status)
        })

        $(document).on('click', '.sampleAttr', function() {
            if ($(this).hasClass("is-outlined")) {
                $(this).removeClass("is-outlined")
            } else {
                $(this).addClass("is-outlined")
            }
        })

        $(document).on('click', '#selectAll', function() {
            if ($(this).hasClass("is-outlined")) {
                $(this).removeClass("is-outlined")
                $(this).html("Deselect All")
            } else {
                $(this).addClass("is-outlined")
                $(this).html("Select All")
            }

            if ($('.sampleAttr.is-outlined').length > 0) {
                $('.sampleAttr').each(function() {
                    $(this).removeClass("is-outlined")
                })
            } else {
                $('.sampleAttr').each(function() {
                    if ($(this).hasClass("is-outlined") == false) {
                        $(this).addClass("is-outlined")
                    }
                })
            }
        })
    </script>
@endsection

@section('content')

    <div class="container">
        <div class="columns is-marginless is-centered">
            <div class="column is-8">
                <br>
                <nav class="card">
                    <header class="card-header">
                        <p class="card-header-title">
                            Selection Criteria
                        </p>
                    </header>

                    <div class="card-content">

                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">CH Num</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <textarea class="textarea has-fixed-size is-medium is-primary" rows="3" name="Ch_num_criterion"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">Patient ID</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <textarea class="textarea has-fixed-size is-medium is-primary" rows="3" name="patient_id_criterion"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">NHLS Num</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <textarea class="textarea has-fixed-size is-medium is-primary" rows="3" name="NHLS_no_criterion"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">Study</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <div class="select is-multiple is-primary is-fullwidth">
                                        <select id="studies" name="Study" multiple="multiple" size="5">
                                            @foreach($studies as $study)
                                                <option value='{!! $study !!}'>{!! $study !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">WGS Status</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <div class="select is-multiple is-primary is-fullwidth">
                                        <select id="status" name="Status" multiple="multiple" size="3">
                                            <option selected value='8'>WGS Complete</option>
                                            <option selected value='7'>Sequencing</option>
                                            <option selected value='6'>Quality Control</option>
                                            <option selected value='5'>DNA Extraction Done</option>
                                            <option selected value='4'>Reculture</option>
                                            <option selected value='3'>Request Submitted</option>
                                            <option selected value='2'>Not Yet Requested</option>
                                            <option selected value='1'>Unknown</option>
                                            <option selected value='0'>Not Viable</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">Batch Range</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <input name="batchMin" value="1" class="input is-rounded is-fullwidth is-primary" type="text">
                                    </p>
                                </div>
                                <div class="field-label" style="white-space: nowrap">
                                    <label class="label">To</label>
                                </div>

                                <div class="field">
                                    <p class="control">
                                        <input name="batchMax" value="10000" class="input is-rounded is-fullwidth is-primary" type="text">
                                    </p>
                                </div>

                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">Sample Attributes</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <div class="columns is-variable is-1 is-multiline is-marginless">
                                        <div class="column is-one-quarter has-text-centered">
                                            <a id="selectAll">Select All</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='patient_id' class="sampleAttr">Patient ID</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='samples.id' class="sampleAttr">Sample ID</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='WGS_Status' class="sampleAttr">WGS Status</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='CH_Num' class="sampleAttr">CH Num</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='Received_Date' class="sampleAttr">Received Date</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='Age' class="sampleAttr">Age</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='Category' class="sampleAttr">Category</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='Clinic' class="sampleAttr">Clinic</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='Origin' class="sampleAttr">Origin</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='NHLS_No' class="sampleAttr">NHLS Number</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='NHLS_Reg_Date' class="sampleAttr">NHLS Reg Date</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='Remark' class="sampleAttr">Remark</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='Auramine' class="sampleAttr">Auramine</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='ZN' class="sampleAttr">ZN</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='Niacin' class="sampleAttr">Niacin</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='Capreo' class="sampleAttr">Capreo</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='Inh' class="sampleAttr">Inh</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='Rif' class="sampleAttr">Rif</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='ETHAM' class="sampleAttr">ETHAM</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='ETHIO' class="sampleAttr">ETHIO</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='Ofloxacin' class="sampleAttr">Ofloxacin</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='Amikacin' class="sampleAttr">Amikacin</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='SM' class="sampleAttr">SM</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='KANA5' class="sampleAttr">KANA5</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='Pyriz' class="sampleAttr">Pyriz</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='THIA' class="sampleAttr">THIA</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='CYCLO' class="sampleAttr">CYCLO</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='Bedaquiline' class="sampleAttr">Bedaquiline</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='Clofazimine' class="sampleAttr">Clofazimine</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='Delamanid' class="sampleAttr">Delamanid</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='Levofloxacin' class="sampleAttr">Levofloxacin</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='Linezolid' class="sampleAttr">Linezolid</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='Moxifloxacin_Low' class="sampleAttr">Moxifloxacin Low</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='Moxifloxacin_High' class="sampleAttr">Moxifloxacin High</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='pAminosalicilic_Acid' class="sampleAttr">pAminosalicilic Acid</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='Rifabutin' class="sampleAttr">Rifabutin</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='Resistance' class="sampleAttr">Resistance</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='katG_1' class="sampleAttr">katG 1</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='katG_2' class="sampleAttr">katG 2</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='katG_F1' class="sampleAttr">katG F1</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='katG_F3' class="sampleAttr">katG F3</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='inhA' class="sampleAttr">inhA</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='inhAprom' class="sampleAttr">inhAprom</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='ahpC' class="sampleAttr">ahpC</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='kasA' class="sampleAttr">kasA</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='ndh' class="sampleAttr">ndh</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='furA' class="sampleAttr">furA</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='Rv0340' class="sampleAttr">Rv0340</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='fbpC' class="sampleAttr">fbpC</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='iniA' class="sampleAttr">iniA</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='iniB' class="sampleAttr">iniB</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='iniC' class="sampleAttr">iniC</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='srmRhomo' class="sampleAttr">srmRhomo</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='fabD' class="sampleAttr">fabD</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='accD6' class="sampleAttr">accD6</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='fadE24' class="sampleAttr">fadE24</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='efpA' class="sampleAttr">efpA</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='Rv1592c' class="sampleAttr">Rv1592c</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='Rv1772' class="sampleAttr">Rv1772</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='nhoA' class="sampleAttr">nhoA</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='mabA' class="sampleAttr">mabA</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='rpoB_1' class="sampleAttr">rpoB 1</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='rpoB_2' class="sampleAttr">rpoB 2</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='embB' class="sampleAttr">embB</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='pncA_1' class="sampleAttr">pncA 1</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='pncA_2' class="sampleAttr">pncA 2</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='gyrA' class="sampleAttr">gyrA</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='rpsL' class="sampleAttr">rpsL</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='rrs' class="sampleAttr">rrs</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='rrs500' class="sampleAttr">rrs500</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='tlyA' class="sampleAttr">tlyA</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='mutT2' class="sampleAttr">mutT2</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='Ogt' class="sampleAttr">Ogt</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='Rv3908' class="sampleAttr">Rv3908</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='Inh_mic' class="sampleAttr">Inh mic</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='Rif_mic' class="sampleAttr">Rif mic</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='Emb_mic' class="sampleAttr">Emb mic</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='Pza_mic' class="sampleAttr">Pza mic</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='SM_mic' class="sampleAttr">SM mic</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='Eth_mic' class="sampleAttr">Eth mic</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='Eth_7_2' class="sampleAttr">Eth 7.2</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='Inh_0_2' class="sampleAttr">Inh 0.2</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='Rif_1_0' class="sampleAttr">Rif 1.0</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='Kana_5_0' class="sampleAttr">Kana 5.0</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='Str_2_0' class="sampleAttr">Str 2.0</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='Ofl_2' class="sampleAttr">Ofl 2</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='Ami_5' class="sampleAttr">Ami 5</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='Capreo_10' class="sampleAttr">Capreo 10</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='Ofl_1' class="sampleAttr">Ofl 1</a>
                                        </div>
                                        <div class="column is-one-quarter has-text-centered">
                                            <a name='Pza_100' class="sampleAttr">Pza 100</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="column">
                                <button id="queryAjax" class="button is-primary is-fullwidth">Export Query</button>
                            </div>
                        </div>
                        
                    </div>
                </nav>
            </div>
        </div>
        <br>
    </div>
@endsection