$(document).on('DOMContentLoaded', function () {
    $('button[id="ajaxList"]').click(function() {
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
                        row = '<tr id="' + v.id + '" class="row">'
                        row += '<td style="width: 67%"><input class="input" id="' + v.id + '" value="' + v.sample_value + '" type="text"></td>'
                        row += '<td><div class="columns"><div class="column">'
                        row += '<button id="ajaxUpdate" name="' + v.id + '" class="button is-primary is-fullwidth">Update</button></div><div class="column">'
                        row += '<button id="ajaxDelete" name="' + v.id + '" class="button is-primary is-fullwidth">Delete</button></div></div></td>'
                        row += '</tr>'
                        $("#valueResults tbody").append(row)
                    })
                } else {
                    $("#valueResults tbody").append('<tr class="row"><td colspan="2" style="text-align: center">No Values Found!</td></tr>')
                }
                row = '<tr id="newValue" class="row">'
                row += '<td style="width: 67%"><input class="input" name="sample_value" type="text"></td>'
                row += '<td><button id="ajaxNewValue" name="' + $("#sample_attribute").val() + '"class="button is-primary is-fullwidth">Add New Value</button></td>'
                row += '</tr>'
                $("#valueResults tbody").append(row)
            },
            error: function(XMLHttpRequest) { 
                let errorText = ""
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
})

$(document).on('click', '#ajaxNewValue', function() { 
    $.ajax({
        type: 'POST',
        url: '/samplevalue',
        data: {
            'sample_attribute': $('#ajaxNewValue').attr('name'),
            'sample_value': $('input[name="sample_value"]').val()
        },
        success: function(result) {
            $('#alert').hide()
            $('input[name="sample_value"]').val("")
            let v = JSON.parse(result.content)
            let row = '<tr id="' + v.id + '" class="row">'
            row += '<td style="width: 67%"><input class="input" id="' + v.id + '" value="' + v.sample_value + '" type="text"</td>'
            row += '<td><div class="columns"><div class="column">'
            row += '<button id="ajaxUpdate" name="' + v.id + '" class="button is-primary is-fullwidth">Update</button></div><div class="column">'
            row += '<button id="ajaxDelete" name="' + v.id + '" class="button is-primary is-fullwidth">Delete</button></div></div></td>'
            row += '</tr>'
            $('#newValue').before(row)
        },
        error: function(XMLHttpRequest) { 
            let errorText = ""
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

$(document).on('click', '#ajaxUpdate', function() { 
    let id = $(this).attr('name')

    $.ajax({
        type: 'PATCH',
        url: '/sampleattribute',
        data: {
            'id': id,
            'sample_value': $('input[id="' + id + '"]').val()
        },
        success: function(result) {
            $('article').attr("class", "message is-success")
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
            $('#alert').show()
            $('#alert').html(errorText)
        }
    })
})

$(document).on('click', '#ajaxDelete', function() { 
    let id = $(this).attr('name')

    $.ajax({
        type: 'DELETE',
        url: '/sampleattribute',
        data: {
            'id': id,
        },
        success: function(result) {
            $('tr[id="' + id + '"]').remove()
            $('article').attr("class", "message is-success")
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
            $('#alert').show()
            $('#alert').html(errorText)
        }
    })
})