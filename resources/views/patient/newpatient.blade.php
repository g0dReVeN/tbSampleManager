@extends('layouts.app')

@section('title')

    Patients - Add New Patient

@endsection

@section('scripts')

    <script>
        $(document).ready(function() {
            $('#dateofbirth').mask('0000-00-00', { placeholder: "YYYY-MM-DD" });
        });
    </script>
    <script type="text/javascript" src="{!! asset('js/jquery.mask.min.js') !!}"></script>

@endsection

@section('header')

    Patients - Add New Patient

@endsection

@section('content')

    <div class="container">
        <div class="columns is-marginless is-centered">
            <div class="column is-8">
                <br>
                <nav class="card">
                    <header class="card-header">
                        <p class="card-header-title">
                            Add New Patient Record
                        </p>
                    </header>

                    <div class="card-content">
                        <form class="newpatient-form" method="POST" action="{!! route('addnewpatient') !!}">

                            {!! csrf_field() !!}

                            <div class="field is-horizontal">
                                <div class="field-label">
                                    <label class="label">NHLS ID</label>
                                </div>

                                <div class="field-body">
                                    <div class="field">
                                        <p class="control">
                                            <input class="input" id="nhlsid" type="text" name="nhlsid">
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="field is-horizontal">
                                <div class="field-label">
                                    <label class="label">Surname</label>
                                </div>

                                <div class="field-body">
                                    <div class="field">
                                        <p class="control">
                                            <input class="input" id="surname" type="text" name="surname">
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="field is-horizontal">
                                <div class="field-label">
                                    <label class="label">First Name</label>
                                </div>

                                <div class="field-body">
                                    <div class="field">
                                        <p class="control">
                                            <input class="input" id="firstname" type="text" name="firstname">
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="field is-horizontal">
                                <div class="field-label">
                                    <label class="label">Sex</label>
                                </div>

                                <div class="field-body">
                                    <div class="field">
                                        <div class="select is-primary is-fullwidth">
                                            <select name="sex" id="sex">
                                                <option value="0">Male</option>
                                                <option value="1">Female</option>
                                                <option value="2" selected>Unknown</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="field is-horizontal">
                                <div class="field-label">
                                    <label class="label">Date Of Birth</label>
                                </div>

                                <div class="field-body">
                                    <div class="field">
                                        <p class="control">
                                            <input class="input" id="dateofbirth" type="text" name="dateofbirth"/>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="field is-horizontal">
                                <div class="field-label">
                                    <label class="label">Identity Check</label>
                                </div>

                                <div class="field-body">
                                    <div class="field">
                                        <p class="control">
                                            <input class="checkbox" id="idcheck" type="checkbox" name="idcheck" value="1">
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="field is-horizontal">
                                <div class="column">
                                    <button type="submit" class="button is-primary is-fullwidth">Add New Patient</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </div>
@endsection