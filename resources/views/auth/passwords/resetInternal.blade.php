@extends('layout')

@section('title')

    Change Password

@endsection

@section('header')

    Change Password

@endsection

@section('content')

    <div class="columns is-marginless is-centered">
        <div class="column is-5">
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">Change Password</p>
                </header>

                <div class="card-content">
                    @if (session('status'))
                        <article class="message is-success">
                            <div class="message-body">
                                {!! session('status') !!}                        
                            </div>
                        </article>
                    @endif

                    <form class="password-reset-form" method="POST" action="{!! route('password.update') !!}">

                        {!! csrf_field() !!}

                        <input type="hidden" name="token" value="{!! Auth::user()->email !!}">

                        <input class="input" id="email" type="hidden" name="email"
                                               value="{!! Auth::user()->email !!}">

                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">Password</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <input class="input" id="password" type="password" name="password" required>
                                    </p>

                                    @if ($errors->has('password'))
                                        <p class="help is-danger">
                                            {!! $errors->first('password') !!}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">Confirm Password</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <input class="input" id="password-confirm" type="password" name="password_confirmation" required>
                                    </p>
                                </div>
                            </div>
                        </div>


                        <div class="field is-horizontal">
                            <div class="field-label"></div>

                            <div class="field-body">
                                <div class="field is-grouped">
                                    <div class="control">
                                        <button type="submit" class="button is-primary">Reset Password </button>
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
