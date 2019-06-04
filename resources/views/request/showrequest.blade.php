@extends('layouts.app')

@section('title')

    Requests - Manage Requests

@endsection

@section('scripts')

    <script>

        $( document ).ready(function() {
            searchRequests(1)
            $("#batchBlock").hide()
        })

        WGS = [
            'Not Viable',
            'Unknown',
            'Not Yet Requested',
            'Request Submitted',
            'Culture Setup',
            'DNA Extraction Done',
            'Quality Control',
            'Sequencing',
            'WGS Complete'
        ]

        $(document).on('click', '#ajaxStatusUpdate', function() {
            let samples = []
            $('input[name="selectSample"]:checked').each(function() {
                samples.push(this.value)
            })
            if (samples.length == 0) {
                alert("Please select a sample(s)")
                return
            }

            $.ajax({
                type: 'POST',
                url: '/requestsUpdate',
                data: {
                    'samples': samples,
                    'status': $(this).attr('name'),
                    'batch' : $('input[name="selectSample"]:checked:first').attr('id')
                },
                success: function(batch) {
                    $("#batchBlock").show()
                    $("#batch_table .row").remove()
                    $('#batch_detail').text("Batch #" + batch[0].batch + " requested by " + batch[0].user_email + " on " + batch[0].created_at)
                    $('#selectAll').prop('checked', false);
                    batch.forEach(function(sample) {
                        row = '<tr class="row">'
                        row += '<td><input class="checkbox" type="checkbox" name="selectSample" value="' + sample.id + '" id="' + batch_id + '"></td>'
                        row += '<td>' + sample.id + '</td>'
                        row += '<td>' + sample.study + '</td>'
                        row += '<td>' + sample.ch_num + '</td>'
                        row += '<td>' + WGS[sample.status] + '</td>'
                        row += '<td><div class="columns"><div class="column"><button class="button is-primary is-fullwidth" name="NV" id="' + sample.id + '">NV</button></div><div class="column"><button class="button is-primary is-fullwidth" name="RC" id="' + sample.id + '">RC</button>'
                        row += '</div><div class="column"><button class="button is-primary is-fullwidth" name="DNA" id="' + sample.id + '">DNA</button></div><div class="column"><button class="button is-primary is-fullwidth" name="QC" id="' + sample.id + '">QC</button>'
                        row += '</div><div class="column"><button class="button is-primary is-fullwidth" name="SEQ" id="' + sample.id + '">SEQ</button></div><div class="column"><button class="button is-primary is-fullwidth" name="WGS" id="' + sample.id + '">WGS</button></div></div></td>'
                        row += '</tr>'
                        $("#batch_table tbody").append(row)
                    })
                }
            })
        })

        function searchRequests(page) {
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
                    $("#requests_table .row").remove()
                    $("#resultsBlock").show()
                    // $("#batchBlock").hide()
                    batches.forEach(function(batch) {
                        row = '<tr id="batch_' + batch.batch_id + '" onclick="getBatchSamples(' + batch.batch_id + ')" class="row">'
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

        function getBatchSamples(batch_id) {
            $.ajax({
                type: 'POST',
                url: '/requests/' + batch_id,
                data: {},
                success:function(batch) {
                    $("#batchBlock").show()
                    // $("#resultsBlock").hide()
                    $("#batch_table .row").remove()
                    $('#batch_detail').text("Batch #" + batch[0].batch + " requested by " + batch[0].user_email + " on " + batch[0].created_at)
                    // $("#batch_table").css('display', 'block')
                    batch.forEach(function(sample) {
                        // statusCode = []
                        // for (i = 0 i < 9 i++) {
                        //     if (i < sample.status) {
                        //         statusCode[i] = "is-danger"
                        //     } else if (i == sample.status) {
                        //         statusCode[i] = "is-warning"
                        //     } else {
                        //         statusCode[i] = "is-success"
                        //     }
                        // }
                        row = '<tr class="row">'
                        row += '<td><input class="checkbox" type="checkbox" name="selectSample" value="' + sample.id + '" id="' + batch_id + '"></td>'
                        row += '<td>' + sample.id + '</td>'
                        row += '<td>' + sample.study + '</td>'
                        row += '<td>' + sample.ch_num + '</td>'
                        row += '<td>' + WGS[sample.status] + '</td>'
                        row += '<td><div class="columns"><div class="column"><button class="button is-primary is-fullwidth" name="NV" id="' + sample.id + '">NV</button></div><div class="column"><button class="button is-primary is-fullwidth" name="RC" id="' + sample.id + '">RC</button>'
                        row += '</div><div class="column"><button class="button is-primary is-fullwidth" name="DNA" id="' + sample.id + '">DNA</button></div><div class="column"><button class="button is-primary is-fullwidth" name="QC" id="' + sample.id + '">QC</button>'
                        row += '</div><div class="column"><button class="button is-primary is-fullwidth" name="SEQ" id="' + sample.id + '">SEQ</button></div><div class="column"><button class="button is-primary is-fullwidth" name="WGS" id="' + sample.id + '">WGS</button></div></div></td>'
                        row += '</tr>'
                        $("#batch_table tbody").append(row)
                    })
                }
            })
        }

        function changePage(direction) {
            page = parseInt($("#requests_table tbody").attr("page"), 10)
            if (direction == 'previous') {
                searchRequests(page - 1)
            } else if (direction == 'next') {
                searchRequests(page + 1)
            }
        }

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

    <style>
        .focused-rows > tbody > tr:hover {
            cursor: pointer
            background-color: #00d1b2 !important
            color: #fff
        }
    </style>
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

                        <!-- <article class="message is-success">
                            <div class="message-body">
                                Batch 88 requested by Lizma at 21/12/2020
                            </div>
                        </article> -->

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
                        <p class="level-item">
                            <button onclick="changePage('previous')" class="button nav-item pagination-previous is-primary">
                                <span class="icon">
                                    <i class="fas fa-chevron-left"></i>
                                </span>
                            </button>
                        </p>
                        <p class="level-item">
                            <button onclick="changePage('next')" class="button nav-item pagination-next is-primary">
                                <span class="icon">
                                    <i class="fas fa-chevron-right"></i>
                                </span>
                            </button>
                        </p>
                    </div>

                    <div class="level-right">
                        <p class="level-item">
                            Showing
                        </p>
                        <p class="level-item">
                            <select id="pagination_limit" onchange="searchRequests(1)">
                                <option>10</option>
                                <option>25</option>
                                <option>50</option>
                                <option>100</option>
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
                        <p class="level-item">
                            <button onclick="changePage('previous')" class="button nav-item pagination-previous is-primary">
                                <span class="icon">
                                    <i class="fas fa-chevron-left"></i>
                                </span>
                            </button>
                        </p>
                        <p class="level-item">
                            <button onclick="changePage('next')" class="button nav-item pagination-next is-primary">
                                <span class="icon">
                                    <i class="fas fa-chevron-right"></i>
                                </span>
                            </button>
                        </p>
                    </div>

                    <div class="level-right">
                        <p class="level-item">
                            Showing
                        </p>
                        <p class="level-item">
                            <select id="pagination_limit" onchange="searchRequests(1)">
                                <option>10</option>
                                <option>25</option>
                                <option>50</option>
                                <option>100</option>
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
                                    <button class="button is-primary is-fullwidth" id="ajaxDelete">Delete</button>
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
                                    <button class="button is-primary is-fullwidth" id="ajaxStatusUpdate" name="6">Quality Check</button>
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