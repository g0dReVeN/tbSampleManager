$(document).on('DOMContentLoaded', function () {
    $('button[id="ajaxUpdate"]').click(function(e) {
        let id = $(this).attr('name')

        $.ajax({
            url: "/admin",
            method: 'patch',
            data: {
                id: id,
                access: $('select[id="access' + id + '"]').val(),
            },
            success: function(result) {
                if ($('#oldMsg').length) {
                    $('#oldMsg').remove()
                } else if ($('#alert').length) {
                    $('#alert').html('')
                }
                $('#alert' + id).show()
                $('#alert' + id).html(result.success)
            },
            statusCode: {
                403: function() { 
                    window.location.reload()
                }
            }
        })
    })

    $('button[id="ajaxDeact"]').click(function(e) {
        let elem = $(this)
        let id = elem.attr('name')

        $.ajax({
            url: "/admin/deact",
            method: 'patch',
            data: {
                id: id,
            },
            success: function(result) {
                if ($('#oldMsg').length) {
                    $('#oldMsg').remove()
                } else if ($('#alert').length) {
                    $('#alert').html('')
                }
                if (result.success) {
                    if (elem.text() == "Activate") {
                        elem.text("Deactivate")
                        elem.removeClass("is-outlined")
                    } else {
                        elem.text("Activate")
                        elem.addClass("is-outlined")
                        elem.blur()
                    }
                    $('#alert' + id).show()
                    $('#alert' + id).html(result.success)
                } else {
                    $('#alert').show()
                    $('#alert').html(result.failure)
                }
            }
        })
    })

    $('button[id="ajaxDelete"]').click(function(e) {
        let id = $(this).attr('name')

        $.ajax({
            url: "/admin",
            method: 'delete',
            data: {
                id: id,
            },
            success: function(result) {
                if ($('#oldMsg').length) {
                    $('#oldMsg').remove()
                }
                if (result.failure) {
                    $('#alert').show()
                    $('#alert').html(result.failure)
                }
                else {
                    $('#alert').show()
                    $('#alert').html(result.success)
                    $('div[id="' + id + '"]').remove()
                    $('#alert' + id).remove()
                }
            }
        })
    })
})