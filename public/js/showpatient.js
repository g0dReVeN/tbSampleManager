$(document).on('DOMContentLoaded', function () {
    $('#dateofbirth').mask('0000-00-00', { placeholder: "YYYY-MM-DD" });
})

$(document).on('click', '#ajaxUpdate', function() { 
    let id = $(this).attr('name')

    $.ajax({
        type: 'PATCH',
        url: '/patients',
        data: {
            'id': id,
            'nhlsid': $('#nhlsid').val(),
            'surname': $('#surname').val(),
            'firstname': $('#firstname').val(),
            'sex': $('#sex').val(),
            'dateofbirth': $('#dateofbirth').val(),
            'idcheck': $('#idcheck').prop('checked') ? 1 : 0,
        },
        success: function(result) {
            $('article').attr("class", "message is-success")
            $('card-content').show()
            $('#alert').show()
            $('#alert').html(result.success)
        },
        error: function(XMLHttpRequest) { 
            let errorText = ""
            let error = Object.entries(JSON.parse(XMLHttpRequest.responseText).errors)
            error.forEach(function(value) {
                errorText += "Error: " + value[1] + "<br>"
            })  
            $('article').attr("class", "message is-danger")
            $('card-content').show()
            // $('#alert').show()
            $('#alert').html(errorText)
        }
    })
})

$(document).on('click', 'tr[name="sample"]', function() {
    location.assign('/samples/' + $(this).attr('id'))
})