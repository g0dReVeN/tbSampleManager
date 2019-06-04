$(document).on('DOMContentLoaded', function () {
    $('#dateofbirth').mask('0000-00-00', { placeholder: "YYYY-MM-DD" })
    $('input[name="patientid"]').on("keyup keydown change", findPatient)
    $('input[name="nhlsid"]').keyup(findPatient)
    $('input[name="name"]').keyup(findPatient)
    $('input[name="sex"]').change(findPatient)
    $('input[name="dateofbirth"]').keyup(findPatient)
    $('input[name="idcheck"]').change(findPatient)
    $('select[name="limit1"]').change(function() { findPatient(1, 1) })
    $('select[name="limit2"]').change(function() { findPatient(1, 2) })
})

function findPatient(page = 1, s = 0) {

    if (s == 1)
        $('select[name="limit2"]').val($('select[name="limit1"]').val())
    else if (s == 2)
        $('select[name="limit1"]').val($('select[name="limit2"]').val())

    $.ajax({
        type: 'POST',
        url: '/patients?page=' + page,
        data: {
            id: $("input[name=patientid]").val(),
            nhlsid: $("input[name=nhlsid]").val(),
            name: $("input[name=name]").val(),
            sex: $("input[name=sex]:checked").val(),
            dateofbirth: $("input[name=dateofbirth]").val(),
            idcheck: $("input[name=idcheck]:checked").val(),
            limit: $("#pagination_limit").val()
        },
        success: function(data) {
            patients = JSON.parse(data.content)
            $('#resultsBlock').show()
            $('.row').remove()
            if (patients.data.length) {
                patients.data.forEach(function(p) {
                    row = '<tr id="' + p.id + '" name="patient" class="row">'
                    row += '<td>' + p.id + '</td>'
                    if (p.nhlsid)
                        row += '<td>' + p.nhlsid + '</td>'
                    else
                        row += '<td></td>'

                    if (p.surname)
                        row += '<td>' + p.surname + '</td>'
                    else
                        row += '<td></td>'

                    if (p.firstname)
                        row += '<td>' + p.firstname + '</td>'
                    else
                        row += '<td></td>'

                    if (p.sex == "0")
                        row += '<td>Male</td>'
                    else if (p.sex == "1")
                        row += '<td>Female</td>'
                    else if (p.sex == "2")
                        row += '<td>Unknown</td>'
                    else
                        row += '<td></td>'

                    if (p.dateofbirth)
                        row += '<td>' + p.dateofbirth + '</td>'
                    else
                        row += '<td></td>'

                    if (p.idcheck == 0)
                        row += '<td>No</td>'
                    else if (p.idcheck == 1)
                        row += '<td>Yes</td>'
                    else
                        row += '<td></td>'

                    row += '</tr>'
                    $("#searchResults tbody").append(row)
                })
            } else {
                $("#searchResults tbody").append('<tr class="row"><td colspan="7" style="text-align: center">No Patient Data Found!</td></tr>')
            }

            if (patients.current_page == 1)
                $(".pagination-previous").attr("disabled", "disabled")
            else
                $(".pagination-previous").removeAttr("disabled")

            if (patients.next_page_url == null)
                $(".pagination-next").attr("disabled", "disabled")
            else
                $(".pagination-next").removeAttr("disabled")

            $("#searchResults tbody").attr("page", patients.current_page)
        }
    })
}

$(document).on('click', 'tr[name="patient"]', function() {
    window.open('/patients/' + $(this).attr('id'))
})

$(document).on('click', 'button[id="page"]', function() {
    let direction = $(this).attr('name')

    let page = parseInt($("#searchResults tbody").attr("page"), 10)
    
    if (direction == 'previous') {
        findPatient(page - 1)
    } else if (direction == 'next') {
        findPatient(page + 1)
    }
}) 