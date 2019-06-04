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
    $('select[id="Resistance"]').val(null)
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
            'Resistance': $('select[id="Resistance"]').val()
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