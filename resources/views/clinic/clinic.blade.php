@extends('layout')

@section('title')

    TB Sample Database - Clinics

@endsection

@section('scripts')

    <script src="{!! asset('js/clinic.js') !!}" type="text/javascript"></script>

@endsection

@section('header')

    Clinics

@endsection

@section('content')

    <div class="container">
        <div class="columns is-marginless is-centered">
            <div class="column is-12">
                @if (session('status'))
                    <article id="oldmsg" class="message is-success">
                        <div class="message-body">
                            {!! session('status') !!}                        
                        </div>
                    </article>
                @endif
                <article class="message is-success"><div id="alert" class="message-body" style="display: none;"></div></article>

                <form id="addclinic-form" method="POST" action="/clinics">{!! csrf_field() !!}</form>

                <table class="table is-bordered is-striped is-hoverable is-fullwidth">
                    <thead>
                        <tr>
                            <th>Clinic</th>
                            <th>Origin</th>
                            <th>Type</th>
                            @if (Auth::user()->access == 4 || Auth::user()->access == 6)
                                <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Clinic</th>
                            <th>Origin</th>
                            <th>Type</th>
                            @if (Auth::user()->access == 4 || Auth::user()->access == 6)
                                <th>Action</th>
                            @endif
                        </tr>
                    </tfoot>
                    <tbody>
                        
                        @if (Auth::user()->access == 4 || Auth::user()->access == 6)

                            @foreach ($clinics as $clinic)
                                
                                <tr id="{!! $clinic->id !!}">
                                    <td>
                                        <input class="input" id="clinic{!! $clinic->id !!}" type="text" value="{!! $clinic->clinic !!}" required>
                                    </td>
                                    <td>
                                        <input class="input" id="origin{!! $clinic->id !!}" type="text" value="{!! $clinic->origin !!}" required>
                                    </td>
                                    <td>
                                        <div class="select is-primary is-fullwidth">
                                            <?= Form::select('type', ['' => '', '0' => 'Clinic', '1' => 'Mobile', '2' => 'Secondary Hospital', '3' => 'Aided Hospital', '4' => 'TB Hospital', '5' => 'Tertiary Hospital'], $clinic->type, ['id' =>'type' . $clinic->id]); ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="columns">
                                            <div class="column">
                                                <button id="ajaxUpdate" name="{!! $clinic->id !!}" class="button is-primary is-fullwidth">Update</button>
                                            </div>

                                            <div class="column">
                                                <button id="ajaxDelete" name="{!! $clinic->id !!}" class="button is-primary is-fullwidth">Delete</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            @endforeach

                            <tr>
                                <td>
                                    <input form="addclinic-form" class="input" id="clinic" type="text" name="clinic"
                                        value="" required>
                                </td>
                                <td>
                                    <input form="addclinic-form" class="input" id="origin" type="text" name="origin"
                                        value="" required>
                                </td>
                                <td>
                                    <div class="select is-primary is-fullwidth">
                                        <select form="addclinic-form" name="type" id="type">
                                            <option selected></option>
                                            <option value="0">Clinic</option>
                                            <option value="1">Mobile</option>
                                            <option value="2">Secondary Hospital</option>
                                            <option value="3">Aided Hospital</option>
                                            <option value="4">TB Hospital</option>
                                            <option value="5">Tertiay Hospital</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <button type="submit" class="button is-primary is-fullwidth" 
                                        onclick="event.preventDefault();document.getElementById('addclinic-form').submit();">Add New Clinic</button>
                                </td>
                            </tr>

                        @else

                            @foreach ($clinics as $clinic)
                                <tr>
                                    <td>{!! $clinic->clinic !!}</td>
                                    <td>{!! $clinic->origin !!}</td>
                                    @if ($clinic->type == '')
                                        <td></td> 
                                    @elseif ((int)($clinic->type) === 0)
                                        <td>Clinic</td>                
                                    @elseif ((int)$clinic->type == 1)
                                        <td>Mobile</td>
                                    @elseif ((int)$clinic->type == 2)
                                        <td>Seconday Hospital</td>
                                    @elseif ((int)$clinic->type === 3)
                                        <td>Aided Hospital</td>
                                    @elseif ((int)$clinic->type == 4)
                                        <td>TB Hospital</td>
                                    @elseif ((int)$clinic->type == 5)
                                        <td>Teritary Hospital</td>
                                    @endif
                                </tr>
                            @endforeach

                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection