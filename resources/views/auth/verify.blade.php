@extends('layouts.app')

@section('title')

    TB Sample Database - Account Notice

@endsection

@section('header')

    Account Notice

@endsection

@section('content')
<div class="container">
    <div class="columns is-marginless is-centered">
        <div class="column is-5">
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">Account Blocked</p>
                </header>

                <div class="card-content">
                    Please contact a system administrator.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
