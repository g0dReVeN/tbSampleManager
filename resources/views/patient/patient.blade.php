@extends('layouts.app')

@section('title')

    Patients - Search

@endsection

@section('scripts')

    <script type="text/javascript" src="{!! asset('js/jquery.mask.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/patient.js') !!}"></script>

@endsection

@section('header')

    Patients - Search

@endsection

@section('content')

    <div class="container">
        <div class="columns is-marginless is-centered">
            <div class="column is-8">
                <br>
                <nav class="card">
                    <header class="card-header">
                        <p class="card-header-title">
                            Search - Patient Clinical Records
                        </p>
                    </header>

                    <div class="card-content">
                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">Patient ID</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <input class="input" id="patientid" type="number" name="patientid">
                                    </p>
                                </div>
                            </div>
                        </div>

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
                                <label class="label">Surname & Firstname</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <input class="input" id="name" type="text" name="name">
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
                                    <div class="control">
                                        <label class="radio">
                                            <input type="radio" name="sex" value="0">
                                            Male
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="sex" value="1">
                                            Female
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="sex" value="2">
                                            Unknown
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="sex"  value="all" checked>
                                            Any
                                        </label>
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
                                        <input class="input" id="dateofbirth" type="text" name="dateofbirth">
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
                                    <div class="control">
                                        <label class="radio">
                                            <input type="radio" name="idcheck" value="1">
                                            Yes
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="idcheck" value="0">
                                            No
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="idcheck" value="all" checked>
                                            Both
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <div id="resultsBlock" class="container" style="display: none;">
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
                    <table id="searchResults" class="table is-bordered is-striped is-hoverable is-fullwidth">
                        <thead>
                            <tr>
                                <th>Patient ID</th>
                                <th>NHLS ID</th>
                                <th>Surname</th>
                                <th>Firstname</th>
                                <th>Sex</th>
                                <th>Date of Birth</th>
                                <th>Identity Check</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Patient ID</th>
                                <th>NHLS ID</th>
                                <th>Firstname</th>
                                <th>Surname</th>
                                <th>Sex</th>
                                <th>Date of Birth</th>
                                <th>Identity Check</th>
                            </tr>
                        </tfoot>
                        <tbody page="1">
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
            <br>
        </div>
    </div>
    
@endsection