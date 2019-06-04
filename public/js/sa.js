$(document).on('DOMContentLoaded', function () {
    $('button[id="ajaxList"]').click(function(e) {
        e.preventDefault()

        $('#alert').hide()
        
        $.ajax({
            type: 'POST',
            url: '/sampleattribute',
            data: {
                'sample_attribute': $("#sample_attribute").val()
            },
            success: function(data) {
                values = JSON.parse(data.content)
                $('#valueBlock').show()
                $("#sattr").text($("#sample_attribute").val())
                $('.row').remove()
                if (values.length) {
                    values.forEach(function(v) {
                        row = '<tr class="row">'
                        row += '<td style="width: 67%">' + v.sample_value + '</td>'
                        row += '</tr>'
                        $("#valueResults tbody").append(row)
                    })
                } else {
                    $("#valueResults tbody").append('<tr class="row"><td style="text-align: center">No Values Found!</td></tr>')
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
                let errorText = ""
                let error = Object.entries(JSON.parse(XMLHttpRequest.responseText).errors)
                error.forEach(function(value) {
                    errorText += "Error: " + value[1] + "<br>"
                })    
                $('#alert').show()
                $('#alert').html(errorText)
            }
        })
    })
})