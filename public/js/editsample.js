$(document).on('DOMContentLoaded', function () {
    $("th").css("text-align", "center")
    $("tr").css("height", "41px")
    $("td").css("text-align", "center")
    $("p:first").css("text-align", "center")
    $("table").css("table-layout", "fixed")
})

$(document).on('click', '#ajaxUpdate', function() { 
    $.ajax({
        type: 'PATCH',
        url: '/samples',
        data: {
            'id': $('#id').text(),
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
            $('article').attr("class", "message is-success")
            $('#alert').show()
            $('#alert').html(result.success)
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