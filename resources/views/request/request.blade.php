@extends('layouts.app')

@section('title')

    Requests - WGS Request

@endsection

@section('scripts')

    <script>
        $(document).on('DOMContentLoaded', function () {
            $("table").css("table-layout", "fixed");
        })

        $(document).on('click', '#ajaxAddTo', function() {
            $.ajax({
                type: 'POST',
                url: '/request',
                data: {
                    Study: $('select[id="Study"]').val(),
                    CH_Num_List: $('textarea[id="CH_Num_List"]').val()
                },
                success: function(data) {
                    samples = JSON.parse(data.content)
                    $('#resultsBlock').show()
                    $('#noData').remove()
                    if (samples.length) {
                        samples.forEach(function(s) {
                            if (!$('tr[id="' + s.id + '"]').length) {
                                row = '<tr id="' + s.id + '" name="sample" class="samples">'
                                
                                if (s.WGS_Status == "1" || s.WGS_Status == "2" || JSON.parse(data.access))
                                    row += '<td><input class="checkbox" type="checkbox" style="vertical-align: middle;text-align: center;" form="submitRequest-form" id="sample_id" name="sample_id[]" value="' + s.id + '" checked></td>'
                                else
                                    row += '<td><input class="checkbox" type="checkbox" style="text-align: center;" onclick="return false;" disabled="disabled"></td>'

                                row += '<td>' + s.id + '</td>'
                                row += '<td>' + s.Study + '</td>'
                                row += '<td>' + s.CH_Num + '</td>'
                                
                                if (s.WGS_Status == "0")
                                    row += '<td>Not Viable</td>'
                                else if (s.WGS_Status == "1")
                                    row += '<td>Unknown</td>'
                                else if (s.WGS_Status == "2")
                                    row += '<td>Not Yet Requested</td>'
                                else if (s.WGS_Status == "3")
                                    row += '<td>Request Submitted</td>'
                                else if (s.WGS_Status == "4")
                                    row += '<td>Reculture</td>'
                                else if (s.WGS_Status == "5")
                                    row += '<td>DNA Extraction Done</td>'
                                else if (s.WGS_Status == "6")
                                    row += '<td>Quality Check</td>'
                                else if (s.WGS_Status == "7")
                                    row += '<td>Sequencing</td>'
                                else if (s.WGS_Status == "8")
                                    row += '<td>WGS Complete</td>'

                                row += '<td><button id="rowRemove" name="' + s.id + '" class="button is-primary is-fullwidth">Remove</button></td>'
                                row += '</tr>'

                                $("#requestResults tbody").append(row)
                                $('#actionBlock').show()
                            }
                        })
                    } else {
                        if ($('#requestResults tbody tr').length < 1) {
                            $("#requestResults tbody").append('<tr id="noData"><td colspan="6" style="text-align: center">No Sample(s) Added to Request!</td></tr>')
                            $('#actionBlock').hide()
                        }
                    }
                }
            })
        })

        $(document).on('click', '#clear', function() {
            $('textarea').val('')
        })

        $(document).on('click', '#rowRemove', function() {
            let id = $(this).attr('name')

            $('tr[id="' + id + '"]').remove()

            if ($('#requestResults tbody tr').length < 1) {
                $("#requestResults tbody").append('<tr id="noData" class="row"><td colspan="6" style="text-align: center">No Sample(s) Added to Request!</td></tr>')
                $('#actionBlock').hide()
            }                
        })

        $(document).on('click', '#clearSelect', function() {
            if ($(this).text() == "Clear Selection") {
                $('input[id="sample_id"]').prop("checked", false)
                $('#formSubmit').prop("disabled", true)
                $(this).text("Select All")
            }
            else if ($(this).text() == "Select All") {
                $('input[id="sample_id"]').prop("checked", true)
                $('#formSubmit').prop("disabled", false)
                $(this).text("Clear Selection")
            }
        })

        $(document).on('click', '.checkbox', function() {
            if ($('input[id^="sample_id"]').is(":checked"))
                $('#formSubmit').prop("disabled", false)
            else
                $('#formSubmit').prop("disabled", true)
        })
    </script>

@endsection

@section('header')

    Requests - WGS Request

@endsection

@section('content')

    <div class="container">
        <div class="columns is-marginless is-centered">
            <div class="column is-8">
                <br>
                <nav class="card">
                    <header class="card-header">
                        <p class="card-header-title">
                            Make A WGS Request
                        </p>
                    </header>

                    <div class="card-content">

                        @if (session('status'))
                            <article class="message is-success">
                                <div class="message-body">
                                    {!! session('status') !!}                        
                                </div>
                            </article>
                        @elseif  (session('error'))
                            <article class="message is-danger">
                                <div class="message-body">
                                    {!! session('error') !!}                        
                                </div>
                            </article>
                        @endif

                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">Study</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <div class="select is-primary is-fullwidth">
                                        <select name="Study" id="Study">
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
                                        <textarea class="textarea has-fixed-size is-medium is-primary" rows="5" name="CH_Num_List" id="CH_Num_List"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="column">
                                <button id="clear" class="button is-primary is-fullwidth">Clear</button>
                            </div>

                            <div class="column">
                                <button id="ajaxAddTo" class="button is-primary is-fullwidth">Add To Request</button>
                            </div>
                        </div>
                        
                    </div>
                </nav>
            </div>
        </div>

        <div id="resultsBlock" class="container" style="display: none;">
            <div class="columns is-marginless is-centered">
                <div class="column is-12">
                    <form id="submitRequest-form" method="POST" action="{!! route('submitrequest') !!}">
                        {!! csrf_field() !!}
                        <input type="hidden" name="user_email" value="{!! Auth::user()->email !!}">
                    </form>

                    <nav class="card">
                        <header class="card-header">
                            <p class="card-header-title">
                                Request
                            </p>
                        </header>

                        <div class="card-content">
                            <table id="requestResults" class="table is-bordered is-striped is-hoverable is-fullwidth">
                                <thead>
                                    <tr>
                                        <th>Selection</th>
                                        <th>Sample ID</th>
                                        <th>Study</th>
                                        <th>CH Num</th>
                                        <th>WGS Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>

                            <div id="actionBlock" class="field is-horizontal">
                                <div class="column">
                                    <button id="clearSelect" class="button is-primary is-fullwidth">Clear Selection</button>
                                </div>

                                <div class="column">
                                    <button id="formSubmit" form="submitRequest-form" class="button is-primary is-fullwidth">Submit Request</button>
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