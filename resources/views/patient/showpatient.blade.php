@extends('layouts.app')

@section('title')

    Patients - Patient Details

@endsection

@section('scripts')

    <script type="text/javascript" src="{!! asset('js/showpatient.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/jquery.mask.min.js') !!}"></script>

@endsection

@section('header')

    Patients - Patient Details

@endsection

@section('content')

    <div class="container">
        <div class="columns is-marginless is-centered">
            <div class="column is-12">
                <br>
                <nav class="card">
                    <header class="card-header">
                        <div class="column is-12">
                            
                            <form id="delete-form" method="POST" action="/patients">
                                {!! csrf_field() !!}
                                {!! method_field('DELETE') !!}
                                <input type="hidden" name="id" value="{!! $patient->id !!}">
                            </form>

                            <form id="addSample-form" method="POST" action="/samples/new">
                                {!! csrf_field() !!}
                                <input type="hidden" name="id" value="{!! $patient->id !!}">
                            </form>

                            <p class="panel-heading" style="text-align: center;">
                                <b>Patient Details</b>
                            </p>

                            <table id="patientTable" class="table is-bordered is-striped is-fullwidth">
                                <tbody>
                                    
                                    @if (Auth::user()->access == 4 || Auth::user()->access == 6)
                                            
                                        <tr>
                                            <th>Patient ID</th>
                                            <th>{!! $patient->id !!}</th>
                                        </tr>
                                        <tr>
                                            <th>NHLS ID</th>
                                            <td><input class="input" id="nhlsid" type="text" name="nhlsid" value="{!! $patient->nhlsid !!}"></td>
                                        </tr>
                                        <tr>
                                            <th>Surname</th>
                                            <td><input class="input" id="surname" type="text" name="surname" value="{!! $patient->surname !!}"></td>
                                        </tr>
                                        <tr>
                                            <th>Firstname</th>
                                            <td><input class="input" id="firstname" type="text" name="firstname" value="{!! $patient->firstname !!}"></td>
                                        </tr>
                                        <tr>
                                            <th>Sex</th>
                                            <td>
                                                <div class="select is-primary is-fullwidth">
                                                    <?= Form::select('sex', ['0' => 'Male', '1' => 'Female', '2' => 'Unknown'], $patient->sex, ['id' =>'sex']); ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Date of Birth</th>
                                            <td><input class="input" id="dateofbirth" type="text" name="dateofbirth" value="{!! $patient->dateofbirth !!}"/></td>
                                        </tr>
                                        <tr>
                                            <th>Identity Check</th>
                                            <td>
                                                <?= Form::checkbox('idcheck', '1', $patient->idcheck, ['id' =>'idcheck']); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Samples</th>
                                            <td>
                                                <table id="sampleTable" class="table is-bordered is-striped is-hoverable is-fullwidth">

                                                    @foreach ($patient->samples as $sample)
                                                        <tr id="{!! $sample->id !!}" name="sample">
                                                            <th style="text-align: center;">
                                                                @php
                                                                    if ($sample->Study && $sample->CH_Num)
                                                                        echo explode(' ', $sample->Study, 2)[0] . $sample->CH_Num;
                                                                    else
                                                                        echo "Sample: Study & CH Number not defined";
                                                                @endphp
                                                            </th>
                                                        </tr>
                                                    @endforeach
                                                    
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Action</th>
                                            <td>
                                                <div class="columns">
                                                    <div class="column">
                                                        <button id="addSample" form="addSample-form" class="button is-primary is-fullwidth">Add Sample</button>
                                                    </div>

                                                    <div class="column">
                                                        <button id="ajaxUpdate" name="{!! $patient->id !!}" class="button is-primary is-fullwidth">Update</button>
                                                    </div>

                                                    <div class="column">
                                                        <button id="ajaxDelete" form="delete-form" class="button is-primary is-fullwidth">Delete</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                    @else

                                        <tr>
                                            <th>Patient ID</th>
                                            <th>{!! $patient->id !!}</th>
                                        </tr>
                                        <tr>
                                            <th>NHLS ID</th>
                                            <td>{!! $patient->nhlsid !!}</td>
                                        </tr>
                                        <tr>
                                            <th>Surname</th>
                                            <td>{!! $patient->surname !!}</td>
                                        </tr>
                                        <tr>
                                            <th>Firstname</th>
                                            <td>{!! $patient->firstname !!}</td>
                                        </tr>
                                        <tr>
                                            <th>Sex</th>
                                            @if ((int)$patient->sex === 0)
                                                    <td>Male</td>                
                                            @elseif ((int)$patient->sex == 1)
                                                <td>Female</td>
                                            @elseif ((int)$patient->sex == 2)
                                                <td>Unknown</td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th>Date of Birth</th>
                                            <td>{!! $patient->dateofbirth !!}</td>
                                        </tr>
                                        <tr>
                                            <th>Identity Check</th>
                                            @if ($patient->idcheck == 0)
                                                    <td>No</td>                
                                            @elseif ($patient->idcheck == 1)
                                                <td>Yes</td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th>Samples</th>
                                            <td>
                                                <table id="sampleTable" class="table is-bordered is-striped is-hoverable is-fullwidth">

                                                    @foreach ($patient->samples as $sample)
                                                        <tr id="{!! $sample->id !!}" name="sample">
                                                            <th style="text-align: center;">
                                                                @php
                                                                    if ($sample->Study && $sample->CH_Num)
                                                                        echo explode(' ', $sample->Study, 2)[0] . $sample->CH_Num;
                                                                    else
                                                                        echo "Sample: Study & CH Number not defined";
                                                                @endphp
                                                            </th>
                                                        </tr>
                                                    @endforeach
                                                    
                                                </table>
                                            </td>
                                        </tr>

                                    @endif

                                </tbody>
                            </table>
                            
                            <article class="message is-success"><div id="alert" class="message-body" style="display: none;"></div></article>
                        </div>
                    </header>
                </nav>
            </div>
        </div>
        <br>
    </div>

@endsection