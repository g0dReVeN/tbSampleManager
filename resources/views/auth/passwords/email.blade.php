@extends('layouts.app')

@section('title')

    TB Sample Database - Reset Password

@endsection

@section('header')

    Reset Password

@endsection

@section('content')

    <div class="columns is-marginless is-centered">
        <div class="column is-5">
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">Reset Password</p>
                </header>

                <div class="card-content">
                    @if (session('status'))
                        <article class="message is-success">
                            <div class="message-body">
                                {!! session('status') !!}                        
                            </div>
                        </article>
                    @endif

                    <form class="forgot-password-form" method="POST" action="{!! route('password.email') !!}">

                        {!! csrf_field() !!}

                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">E-Mail Address</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <input class="input" id="email" type="email" name="email"
                                               value="{!! old('email') !!}" required autofocus>
                                    </p>

                                    @if ($errors->has('email'))
                                        <p class="help is-danger">
                                            {!! $errors->first('email') !!}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label"></div>

                            <div class="field-body">
                                <div class="field is-grouped">
                                    <div class="control">
                                        <button type="submit" class="button is-primary">Send Password Reset Link
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
