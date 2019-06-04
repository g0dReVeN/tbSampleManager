@extends('layout')

@section('title')

    Requests - Manage Requests

@endsection

@section('scripts')

    <script>

        $(document).on('DOMContentLoaded', function () {
            searchRequests(1)
            $("#batchBlock").hide()
            $('select[name="limit1"]').change(function() { searchRequests(1, 1) })
            $('select[name="limit2"]').change(function() { searchRequests(1, 2) })
        })

        WGS = [
            'Not Viable',
            'Unknown',
            'Not Yet Requested',
            'Request Submitted',
            'Reculture',
            'DNA Extraction Done',
            'Quality Control',
            'Sequencing',
            'WGS Complete'
        ]

        $(document).on('click', '.button.is-fullwidth', function() {
            let samples = []
            if ($(this).attr('id') == 'ajaxStatusUpdate') {
                $('input[name="selectSample"]:checked').each(function() {
                    samples.push(this.value)
                })
                if (samples.length == 0) {
                    alert("Please select a sample(s)")
                    return
                }
            } else {
                samples.push($(this).attr('id'))
            }

            $.ajax({
                type: 'POST',
                url: '/requestsUpdate',
                data: {
                    'samples': samples,
                    'status': $(this).attr('name'),
                    'batch' : $('input[name="selectSample"]').attr('id')
                },
                success: function(batch) {
                    $("#batch_table .row").remove()
                    $('#batch_detail').text("Batch #" + batch[0].batch + " requested by " + batch[0].user_email + " on " + batch[0].created_at)
                    $('#selectAll').prop('checked', false)
                    batch.forEach(function(sample) {
                        row = '<tr class="row" id="' + sample.id + '">'
                        row += '<td><input class="checkbox" type="checkbox" name="selectSample" value="' + sample.id + '" id="' + sample.batch + '"></td>'
                        row += '<td>' + sample.id + '</td>'
                        row += '<td>' + sample.study + '</td>'
                        row += '<td>' + sample.ch_num + '</td>'
                        row += '<td>' + WGS[sample.status] + '</td>'
                        row += '<td><div class="columns">'
                        row += '<div class="column"><button class="button is-danger is-fullwidth" name="0" id="' + sample.id + '">NV</button></div>'

                        let colour4 = (parseInt(sample.status) > 4) ? "danger" : (parseInt(sample.status) == 4) ? "warning" : "success"
                        let colour5 = (parseInt(sample.status) > 5) ? "danger" : (parseInt(sample.status) == 5) ? "warning" : "success"
                        let colour6 = (parseInt(sample.status) > 6) ? "danger" : (parseInt(sample.status) == 6) ? "warning" : "success"
                        let colour7 = (parseInt(sample.status) > 7) ? "danger" : (parseInt(sample.status) == 7) ? "warning" : "success"
                        
                        row += '<div class="column"><button class="button is-' + colour4 + ' is-fullwidth" name="4" id="' + sample.id + '">RC</button></div>'
                        row += '<div class="column"><button class="button is-' + colour5 + ' is-fullwidth" name="5" id="' + sample.id + '">DNA</button></div>'
                        row += '<div class="column"><button class="button is-' + colour6 + ' is-fullwidth" name="6" id="' + sample.id + '">QC</button></div>'
                        row += '<div class="column"><button class="button is-' + colour7 + ' is-fullwidth" name="7" id="' + sample.id + '">SEQ</button></div>'
                        row += '<div class="column"><button class="button is-success is-fullwidth" name="8" id="' + sample.id + '">WGS</button></div>'
                        row += '</div></td></tr>'
                        $("#batch_table tbody").append(row)
                    })
                }
            })
        })

        function searchRequests(page = 1, s = 0) {

            if (s == 1)
                $('select[name="limit2"]').val($('select[name="limit1"]').val())
            else if (s == 2)
                $('select[name="limit1"]').val($('select[name="limit2"]').val())

            $.ajax({
                type: 'POST',
                url: '/requests?page=' + page,
                data: {
                    batch_id: $("textarea[name=batch_id]").val(),
                    user_email: $("input[name=user_email]").val(),
                    Study: $("select[name=Study]").val(),
                    CH_Num: $("textarea[name=CH_Num]").val(),
                    WGS_Status: $("select[name=WGS_Status]").val(),
                    limit: $("#pagination_limit").val()
                },
                success: function(data) {
                    batches = data.data
                    $("#requests_table .batchRow").remove()
                    $("#resultsBlock").show()
                    batches.forEach(function(batch) {
                        row = '<tr id="' + batch.batch_id + '" class="batchRow">'
                        row += '<td>' + batch.batch_id + '</td>'
                        row += '<td>' + batch.user_email + '</td>'
                        row += '<td>' + batch.sample_count + '</td>'
                        row += '<td>' + WGS[batch.status] + '</td>'
                        row += '<td>' + batch.created_at + '</td>'
                        row += '</tr>'
                        $("#requests_table tbody").append(row)
                    })

                    if (data.current_page == 1) {
                        $(".pagination-previous").attr("disabled", "disabled")
                    } else {
                        $(".pagination-previous").removeAttr("disabled")
                    }

                    if (data.next_page_url == null) {
                        $(".pagination-next").attr("disabled", "disabled")
                    } else {
                        $(".pagination-next").removeAttr("disabled")
                    }

                    $("#requests_table tbody").attr("page", data.current_page)
                }
            })
        }

        $(document).on('click', '.batchRow', function() {
            let batch_id = $(this).attr('id')

            $.ajax({
                type: 'POST',
                url: '/requests/' + batch_id,
                data: {},
                success:function(batch) {
                    $("#batchBlock").show()
                    $("#batch_table .row").remove()
                    $('#batch_detail').text("Batch #" + batch[0].batch + " requested by " + batch[0].user_email + " on " + batch[0].created_at)
                    $('#selectAll').prop('checked', false)
                    batch.forEach(function(sample) {
                        row = '<tr class="row" id="' + sample.id + '">'
                        row += '<td><input class="checkbox" type="checkbox" name="selectSample" value="' + sample.id + '" id="' + batch_id + '"></td>'
                        row += '<td>' + sample.id + '</td>'
                        row += '<td>' + sample.study + '</td>'
                        row += '<td>' + sample.ch_num + '</td>'
                        row += '<td>' + WGS[sample.status] + '</td>'
                        row += '<td><div class="columns">'
                        row += '<div class="column"><button class="button is-danger is-fullwidth" name="0" id="' + sample.id + '">NV</button></div>'

                        let colour4 = (parseInt(sample.status) > 4) ? "danger" : (parseInt(sample.status) == 4) ? "warning" : "success"
                        let colour5 = (parseInt(sample.status) > 5) ? "danger" : (parseInt(sample.status) == 5) ? "warning" : "success"
                        let colour6 = (parseInt(sample.status) > 6) ? "danger" : (parseInt(sample.status) == 6) ? "warning" : "success"
                        let colour7 = (parseInt(sample.status) > 7) ? "danger" : (parseInt(sample.status) == 7) ? "warning" : "success"

                        row += '<div class="column"><button class="button is-' + colour4 + ' is-fullwidth" name="4" id="' + sample.id + '">RC</button></div>'
                        row += '<div class="column"><button class="button is-' + colour5 + ' is-fullwidth" name="5" id="' + sample.id + '">DNA</button></div>'
                        row += '<div class="column"><button class="button is-' + colour6 + ' is-fullwidth" name="6" id="' + sample.id + '">QC</button></div>'
                        row += '<div class="column"><button class="button is-' + colour7 + ' is-fullwidth" name="7" id="' + sample.id + '">SEQ</button></div>'
                        row += '<div class="column"><button class="button is-success is-fullwidth" name="8" id="' + sample.id + '">WGS</button></div>'
                        row += '</div></td></tr>'
                        $("#batch_table tbody").append(row)
                    })
                }
            })
        })

        $(document).on('click', 'button[id="page"]', function() {
            let direction = $(this).attr('name')

            let page = parseInt($("#requests_table tbody").attr("page"), 10)
            
            if (direction == 'previous') {
                searchRequests(page - 1)
            } else if (direction == 'next') {
                searchRequests(page + 1)
            }
        }) 

        $(document).on('change', '#selectAll', function () {
            if ($(this).prop("checked")) {
                $('input[name="selectSample"]').each(function() {
                    $(this).prop('checked', true);
                })
            } else {
                $('input[name="selectSample"]').each(function() {
                    $(this).prop('checked', false);
                })
            }
        })
    </script>

@endsection

@section('header')

    Requests - Manage Requests

@endsection

@section('content')

    <div class="container">
        <div class="columns is-marginless is-centered">
            <div class="column is-8">
                <br>
                <nav class="card">
                    <header class="card-header">
                        <p class="card-header-title">
                            Manage Requests
                        </p>
                    </header>

                    <div class="card-content">

                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">Batch ID</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <textarea class="textarea has-fixed-size is-medium is-primary" rows="5" name="batch_id"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">User</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <input type="text" class="input has-fixed-size is-medium is-primary" name="user_email">
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
                                    <div class="select is-primary is-fullwidth">
                                        <select name="Study">
                                            <option value="" selected></option>
                                            @foreach ($studies as $study)
                                                <option value="{!! $study !!}">{!! $study !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">CH Num List</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <textarea class="textarea has-fixed-size is-medium is-primary" rows="5" name="CH_Num"></textarea>
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
                                    <div class="select is-primary is-fullwidth">
                                        <select name="WGS_Status">
                                            <option value='' selected></option>
                                            <option value='0'>Not Viable</option>
                                            <option value='1'>Unknown</option>
                                            <option value='2'>Not Yet Requested</option>
                                            <option value='3'>Request Submitted</option>
                                            <option value='4'>Culture Setup</option>
                                            <option value='5'>DNA Extraction Done</option>
                                            <option value='6'>Quality Control</option>
                                            <option value='7'>Sequencing</option>
                                            <option value='8'>WGS Complete</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="column">
                                <button onclick="searchRequests(1)" class="button is-primary is-fullwidth">Search</button>
                            </div>
                        </div>
                        
                    </div>
                </nav>
            </div>
        </div>

        <div id="resultsBlock" class="container">
            <div class="block">
                <nav class="level">
                    <div class="level-left">
                            <button id="page" name="previous" class="button nav-item pagination-previous is-primary"><strong style="color: white;">&#xab</strong></button>
                            <button id="page" name="next" class="button nav-item pagination-next is-primary"><strong style="color: white;">&#xbb</strong></button>
                    </div>

                    <div class="level-right">
                        <p class="level-item">
                            <strong style="color: white;">Show</strong>
                        </p>
                        <p class="level-item">
                            <select name="limit1" id="pagination_limit">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </p>
                    </div>
                </nav>
            </div>

            <div class="columns is-marginless is-centered">
                <div class="column is-12">
                    <table id="requests_table" class="table is-bordered is-striped is-hoverable is-fullwidth focused-rows">
                        <thead>
                            <tr>
                                <th>Batch ID</th>
                                <th>User</th>
                                <th>Samples</th>
                                <th>Status</th>
                                <th>Date Requested</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>

            <br>

            <div class="block">
                <nav class="level">
                    <div class="level-left">
                            <button id="page" name="previous" class="button nav-item pagination-previous is-primary"><strong style="color: white;">&#xab</strong></button>
                            <button id="page" name="next" class="button nav-item pagination-next is-primary"><strong style="color: white;">&#xbb</strong></button>
                    </div>

                    <div class="level-right">
                        <p class="level-item">
                            <strong style="color: white;">Show</strong>
                        </p>
                        <p class="level-item">
                            <select name="limit2" id="pagination_limit">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </p>
                    </div>
                </nav>
            </div>
        </div>

        <br>

        <div id="batchBlock" class="container">
            <div class="columns is-marginless is-centered">
                <div class="column is-12">
                    <nav class="card">
                        <header class="card-header"><p id="batch_detail" class="card-header-title"></p></header>

                        <div class="card-content">
                            <table id="batch_table" class="table is-bordered is-striped is-hoverable is-fullwidth focused-rows">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;"><input class="checkbox" type="checkbox" id="selectAll"></th>
                                        <th style="width: 10%;">Sample ID</th>
                                        <th style="width: 22%;">Study</th>
                                        <th style="width: 10%;">CH Num</th>
                                        <th style="width: 15%;">Status</th>
                                        <th style="width: 38%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>

                            <div class="columns">
                                <div class="column">
                                    <button class="button is-primary is-fullwidth" id="ajaxStatusUpdate" name="-1">Delete</button>
                                </div>
                                <div class="column">
                                    <button class="button is-primary is-fullwidth" id="ajaxStatusUpdate" name="0">Not Viable</button>
                                </div>
                                <div class="column">
                                    <button class="button is-primary is-fullwidth" id="ajaxStatusUpdate" name="4">Reculture</button>
                                </div>
                                <div class="column">
                                    <button class="button is-primary is-fullwidth" id="ajaxStatusUpdate" name="5">DNA Extraction Done</button>
                                </div>
                                <div class="column">
                                    <button class="button is-primary is-fullwidth" id="ajaxStatusUpdate" name="6">Quality Control</button>
                                </div>
                                <div class="column">
                                    <button class="button is-primary is-fullwidth" id="ajaxStatusUpdate" name="7">Sequencing</button>
                                </div>
                                <div class="column">
                                    <button class="button is-primary is-fullwidth" id="ajaxStatusUpdate" name="8">WGS</button>
                                </div>
                            </div>

                        </div>
                    </nav>
                </div>
            </div>
        </div>

        <br>

    </div>

@endsection