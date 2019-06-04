$(document).on('DOMContentLoaded', function () {
    $('button[id="ajaxUpdate"]').click(function(e) {
        let id = $(this).attr('name')

        $.ajax({
            url: "/clinics",
            method: 'patch',
            data: {
                id: id,
                clinic: $('input[id="clinic' + id + '"]').val(),
                origin: $('input[id="origin' + id + '"]').val(),
                type: ($('select[id="type' + id + '"]').val())
            },
            success: function(result) {
                if ($('#oldmsg').length) {
                    $('#oldmsg').remove()
                }
                $('#alert').show()
                $('#alert').text(result.success)
            }
        })
    })
    
    $('button[id="ajaxDelete"]').click(function(e) {
        let id = $(this).attr('name')

        $.ajax({
            url: "/clinics",
            method: 'delete',
            data: {
                id: id,
            },
            success: function(result) {
                if ($('#oldmsg').length) {
                    $('#oldmsg').remove()
                }
                $('#alert').show()
                $('#alert').html(result.success)
                $('tr[id="' + id + '"]').remove()
            }
        })
    })
})