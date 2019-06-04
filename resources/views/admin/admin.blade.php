@extends('layouts.app')

@section('title')

    TB Sample Database - Admin

@endsection

@section('scripts')

    <script src="{!! asset('js/admin.js') !!}" type="text/javascript"></script>

@endsection

@section('header')

    Admin

@endsection

@section('content')

    <div class="container">
        <div class="columns is-marginless is-centered">
            <div class="column is-12">
                <br>
                <nav class="card">
                    <header class="card-header">
                        <p class="card-header-title">
                            Users & Access Permissions
                        </p>
                    </header>

                    <div class="card-content">
    
                        <div class="columns">
                            <div class="column">
                                <p class="card-header-title">
                                    Username/Email
                                </p>
                            </div>
                            <div class="column">
                                <p class="card-header-title">
                                    Access Permissions
                                </p>
                            </div>
                            <div class="column">
                                <p class="card-header-title">
                                    Actions
                                </p>
                            </div>
                        </div>

                        @foreach ($users as $user)

                            @if (session('success') && $user->email == session('success'))
                                <p id="oldMsg" class="help is-success">
                                    User Account created successfully!
                                </p>
                            @endif
                            <p id="alert{!! $user->id !!}" class="help is-success" style="display: none;"></p>

                            <div id="{!! $user->id !!}" class="columns">
                                <div id="email" value="{!! $user->email !!}" class="column is-fullwidth">
                                    {!! $user->email !!}
                                </div>
                                <div class="column">
                                    <div class="select is-primary is-fullwidth">
                                        <?= Form::select('access', [
                                            '0' => 'View - Sample Data',
                                            '1' => 'View - Patient & Sample Data',
                                            '2' => 'View & Edit - Sample Data',
                                            '3' => 'View & Edit - Sample Data && View - Patient Data',
                                            '4' => 'Data Capturer',
                                            '5' => 'Request Manager',
                                            '6' => 'Administrator',], $user->access, ['id' =>'access' . $user->id]); ?>
                                    </div>
                                </div>

                                <div class="column">
                                    <div class="columns">  
                                        <div class="column">
                                            <button id="ajaxUpdate" name="{!! $user->id !!}" class="button is-primary is-fullwidth">Update</button>
                                        </div>

                                        <div class="column">
                                            @if ($user->email_verified_at)
                                                <button id="ajaxDeact" name="{!! $user->id !!}" class="button is-primary is-fullwidth">Deactivate</button>
                                            @else
                                                <button id="ajaxDeact" name="{!! $user->id !!}" class="button is-primary is-outlined is-fullwidth">Activate</button>
                                            @endif
                                        </div>

                                        <div class="column">
                                            <button id="ajaxDelete" name="{!! $user->id !!}" class="button is-primary is-fullwidth">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                        <form class="register-form" method="POST" action="{!! route('register') !!}">

                            {!! csrf_field() !!}

                            <div class="columns">
                                <div class="column">
                                    <input class="input" id="email" type="email" name="email"
                                        value="{!! old('email') !!}" required autofocus>

                                    <p id="alert" class="help is-danger">
                                        {!! $errors->first('email') !!}
                                    </p>
                                </div>

                                <div class="column">
                                    <div class="select is-primary is-fullwidth">
                                        <select name="access" id="access" required autofocus>
                                            <option value="0">View - Sample Data</option>
                                            <option value="1">View - Patient & Sample Data</option>
                                            <option value="2">View & Edit - Sample Data</option>
                                            <option value="3">View & Edit - Sample Data && View - Patient Data</option>
                                            <option value="4">Data Capturer</option>
                                            <option value="5">Request Manager</option>
                                            <option value="6">Administrator</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="column">
                                    <button type="submit" class="button is-primary is-fullwidth">Register New User</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </nav>
                <br>
            </div>
        </div>
    </div>
    
@endsection