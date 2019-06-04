$(document).on('DOMContentLoaded', function () {
    $("th").css("text-align", "center")
    $("p:first").css("text-align", "center")
    $("table").css("table-layout", "fixed")
    $('#Received_Date').mask('0000-00-00', { placeholder: "YYYY-MM-DD" })
    $('#NHLS_Reg_Date').mask('0000-00-00', { placeholder: "YYYY-MM-DD" })
})

$(document).on('click', '#reset', function() {
    $('th[id="Study"]').text(null),
    $('th[id="CH_Num"]').text(null),
    $('select[id="Study"]').val(null),
    $('input[id="CH_Num"]').val(null),
    $('input[id="Received_Date"]').val(null),
    $('input[id="Age"]').val(null),
    $('select[id="Category"]').val('0'),
    $('select[id="Clinic"]').val(null),
    $('select[id="Origin"]').val(null),
    $('input[id="NHLS_No"]').val(null),
    $('input[id="NHLS_Reg_Date"]').val(null),
    $('input[id="Remark"]').val(null),
    $('select[id="Auramine"]').val(null),
    $('select[id="ZN"]').val("Pos"),
    $('select[id="Niacin"]').val("Nia"),
    $('select[id="Capreo"]').val(null),
    $('select[id="Inh"]').val(null),
    $('select[id="Rif"]').val(null),
    $('select[id="ETHAM"]').val(null),
    $('select[id="ETHIO"]').val(null),
    $('select[id="Ofloxacin"]').val(null),
    $('select[id="Amikacin"]').val(null),
    $('select[id="SM"]').val(null),
    $('select[id="KANA5"]').val(null),
    $('select[id="Pyriz"]').val(null),
    $('select[id="THIA"]').val(null),
    $('select[id="CYCLO"]').val(null),
    $('select[id="Bedaquiline"]').val(null),
    $('select[id="Clofazimine"]').val(null),
    $('select[id="Delamanid"]').val(null),
    $('select[id="Levofloxacin"]').val(null),
    $('select[id="Linezolid"]').val(null),
    $('select[id="Moxifloxacin_Low"]').val(null),
    $('select[id="Moxifloxacin_High"]').val(null),
    $('select[id="pAminosalicilic_Acid"]').val(null),
    $('select[id="Rifabutin"]').val(null),
    $('select[id="Resistance"]').val(null),
    $('select[id="katG_1"]').val(null),
    $('select[id="katG_2"]').val(null),
    $('select[id="katG_F1"]').val(null),
    $('select[id="katG_F3"]').val(null),
    $('select[id="inhA"]').val(null),
    $('select[id="inhAprom"]').val(null),
    $('select[id="ahpC"]').val(null),
    $('select[id="kasA"]').val(null),
    $('select[id="ndh"]').val(null),
    $('select[id="furA"]').val(null),
    $('select[id="Rv0340"]').val(null),
    $('select[id="fbpC"]').val(null),
    $('select[id="iniA"]').val(null),
    $('select[id="iniB"]').val(null),
    $('select[id="iniC"]').val(null),
    $('select[id="srmRhomo"]').val(null),
    $('select[id="fabD"]').val(null),
    $('select[id="accD6"]').val(null),
    $('select[id="fadE24"]').val(null),
    $('select[id="efpA"]').val(null),
    $('select[id="Rv1592c"]').val(null),
    $('select[id="Rv1772"]').val(null),
    $('select[id="nhoA"]').val(null),
    $('select[id="mabA"]').val(null),
    $('select[id="rpoB_1"]').val(null),
    $('select[id="rpoB_2"]').val(null),
    $('select[id="embB"]').val(null),
    $('select[id="pncA_1"]').val(null),
    $('select[id="pncA_2"]').val(null),
    $('select[id="gyrA"]').val(null),
    $('select[id="rpsL"]').val(null),
    $('select[id="rrs"]').val(null),
    $('select[id="rrs500"]').val(null),
    $('select[id="tlyA"]').val(null),
    $('select[id="mutT2"]').val(null),
    $('select[id="Ogt"]').val(null),
    $('select[id="Rv3908"]').val(null),
    $('select[id="Inh_mic"]').val(null),
    $('select[id="Rif_mic"]').val(null),
    $('select[id="Emb_mic"]').val(null),
    $('select[id="Pza_mic"]').val(null),
    $('select[id="SM_mic"]').val(null),
    $('select[id="Eth_mic"]').val(null),
    $('select[id="Eth_7_2"]').val(null),
    $('select[id="Inh_0_2"]').val(null),
    $('select[id="Rif_1_0"]').val(null),
    $('select[id="Kana_5_0"]').val(null),
    $('select[id="Str_2_0"]').val(null),
    $('select[id="Ofl_2"]').val(null),
    $('select[id="Ami_5"]').val(null),
    $('select[id="Capreo_10"]').val(null),
    $('select[id="Ofl_1"]').val(null),
    $('select[id="Pza_100"]').val(null)
})

$(document).on('click', '#ajaxUpdate', function() { 
    $.ajax({
        type: 'PATCH',
        url: '/samples',
        data: {
            'id': $('#id').text(),
            'Study': $('select[id="Study"]').val(),
            'CH_Num': $('input[id="CH_Num"]').val(),
            'Received_Date': $('input[id="Received_Date"]').val(),
            'Age': $('input[id="Age"]').val(),
            'Category': $('select[id="Category"]').val(),
            'Clinic': $('select[id="Clinic"]').val(),
            'Origin': $('select[id="Origin"]').val(),
            'NHLS_No': $('input[id="NHLS_No"]').val(),
            'NHLS_Reg_Date': $('input[id="NHLS_Reg_Date"]').val(),
            'Remark': $('input[id="Remark"]').val(),
            'Auramine': $('select[id="Auramine"]').val(),
            'ZN': $('select[id="ZN"]').val(),
            'Niacin': $('select[id="Niacin"]').val(),
            'Capreo': $('select[id="Capreo"]').val(),
            'Inh': $('select[id="Inh"]').val(),
            'Rif': $('select[id="Rif"]').val(),
            'ETHAM': $('select[id="ETHAM"]').val(),
            'ETHIO': $('select[id="ETHIO"]').val(),
            'Ofloxacin': $('select[id="Ofloxacin"]').val(),
            'Amikacin': $('select[id="Amikacin"]').val(),
            'SM': $('select[id="SM"]').val(),
            'KANA5': $('select[id="KANA5"]').val(),
            'Pyriz': $('select[id="Pyriz"]').val(),
            'THIA': $('select[id="THIA"]').val(),
            'CYCLO': $('select[id="CYCLO"]').val(),
            'Bedaquiline': $('select[id="Bedaquiline"]').val(),
            'Clofazimine': $('select[id="Clofazimine"]').val(),
            'Delamanid': $('select[id="Delamanid"]').val(),
            'Levofloxacin': $('select[id="Levofloxacin"]').val(),
            'Linezolid': $('select[id="Linezolid"]').val(),
            'Moxifloxacin_Low': $('select[id="Moxifloxacin_Low"]').val(),
            'Moxifloxacin_High': $('select[id="Moxifloxacin_High"]').val(),
            'pAminosalicilic_Acid': $('select[id="pAminosalicilic_Acid"]').val(),
            'Rifabutin': $('select[id="Rifabutin"]').val(),
            'Resistance': $('select[id="Resistance"]').val(),
            'katG_1': $('select[id="katG_1"]').val(),
            'katG_2': $('select[id="katG_2"]').val(),
            'katG_F1': $('select[id="katG_F1"]').val(),
            'katG_F3': $('select[id="katG_F3"]').val(),
            'inhA': $('select[id="inhA"]').val(),
            'inhAprom': $('select[id="inhAprom"]').val(),
            'ahpC': $('select[id="ahpC"]').val(),
            'kasA': $('select[id="kasA"]').val(),
            'ndh': $('select[id="ndh"]').val(),
            'furA': $('select[id="furA"]').val(),
            'Rv0340': $('select[id="Rv0340"]').val(),
            'fbpC': $('select[id="fbpC"]').val(),
            'iniA': $('select[id="iniA"]').val(),
            'iniB': $('select[id="iniB"]').val(),
            'iniC': $('select[id="iniC"]').val(),
            'srmRhomo': $('select[id="srmRhomo"]').val(),
            'fabD': $('select[id="fabD"]').val(),
            'accD6': $('select[id="accD6"]').val(),
            'fadE24': $('select[id="fadE24"]').val(),
            'efpA': $('select[id="efpA"]').val(),
            'Rv1592c': $('select[id="Rv1592c"]').val(),
            'Rv1772': $('select[id="Rv1772"]').val(),
            'nhoA': $('select[id="nhoA"]').val(),
            'mabA': $('select[id="mabA"]').val(),
            'rpoB_1': $('select[id="rpoB_1"]').val(),
            'rpoB_2': $('select[id="rpoB_2"]').val(),
            'embB': $('select[id="embB"]').val(),
            'pncA_1': $('select[id="pncA_1"]').val(),
            'pncA_2': $('select[id="pncA_2"]').val(),
            'gyrA': $('select[id="gyrA"]').val(),
            'rpsL': $('select[id="rpsL"]').val(),
            'rrs': $('select[id="rrs"]').val(),
            'rrs500': $('select[id="rrs500"]').val(),
            'tlyA': $('select[id="tlyA"]').val(),
            'mutT2': $('select[id="mutT2"]').val(),
            'Ogt': $('select[id="Ogt"]').val(),
            'Rv3908': $('select[id="Rv3908"]').val(),
            'Inh_mic': $('select[id="Inh_mic"]').val(),
            'Rif_mic': $('select[id="Rif_mic"]').val(),
            'Emb_mic': $('select[id="Emb_mic"]').val(),
            'Pza_mic': $('select[id="Pza_mic"]').val(),
            'SM_mic': $('select[id="SM_mic"]').val(),
            'Eth_mic': $('select[id="Eth_mic"]').val(),
            'Eth_7_2': $('select[id="Eth_7_2"]').val(),
            'Inh_0_2': $('select[id="Inh_0_2"]').val(),
            'Rif_1_0': $('select[id="Rif_1_0"]').val(),
            'Kana_5_0': $('select[id="Kana_5_0"]').val(),
            'Str_2_0': $('select[id="Str_2_0"]').val(),
            'Ofl_2': $('select[id="Ofl_2"]').val(),
            'Ami_5': $('select[id="Ami_5"]').val(),
            'Capreo_10': $('select[id="Capreo_10"]').val(),
            'Ofl_1': $('select[id="Ofl_1"]').val(),
            'Pza_100': $('select[id="Pza_100"]').val()
        },
        success: function(result) {
            if (result.failure) {
                $('article').attr("class", "message is-danger")
                $('#alert').show()
                $('#alert').html(result.failure)
            }
            else {
                $('th[id="Study"]').text($('select[id="Study"]').val()),
                $('th[id="CH_Num"]').text($('input[id="CH_Num"]').val()),
                $('article').attr("class", "message is-success")
                $('#alert').show()
                $('#alert').html(result.success)
            }
        },
        error: function(XMLHttpRequest) { 
            let errorText = null
            let error = Object.entries(JSON.parse(XMLHttpRequest.responseText).errors)
            error.forEach(function(value) {
                errorText += "Error: " + value[1] + "<br>"
            })  
            $('article').attr("class", "message is-danger")
            $('#alert').show()
            $('#alert').html(errorText)
        }
    })
})

$(document).on('change', '.resist', function() {
    if ($('select[id="Inh"]').val() == "" && $('select[id="Rif"]').val() == "")
        $('select[id="Resistance"]').val("Unclassified")
    if ($('select[id="Inh"]').val() == "R")
        $('select[id="Resistance"]').val("Inh Mono")
    if ($('select[id="Rif"]').val() == "R")
        $('select[id="Resistance"]').val("Rif Mono")
    if (($('select[id="Ofloxacin"]').val() == "R" || $('select[id="Amikacin"]').val() == "R") && ($('select[id="Inh"]').val() == "R" || $('select[id="Rif"]').val() == "R"))
        $('select[id="Resistance"]').val("Poly")
    if ($('select[id="Inh"]').val() == "R" && $('select[id="Rif"]').val() == "R")
        $('select[id="Resistance"]').val("MDR")
    if ($('select[id="Inh"]').val() == "R" && $('select[id="Rif"]').val() == "R" && ($('select[id="Ofloxacin"]').val() == "R" || $('select[id="Amikacin"]').val() == "R"))
        $('select[id="Resistance"]').val("Pre XDR")
    if ($('select[id="Inh"]').val() == "R" && $('select[id="Rif"]').val() == "R" && $('select[id="Ofloxacin"]').val() == "R" && $('select[id="Amikacin"]').val() == "R")
        $('select[id="Resistance"]').val("XDR")
})