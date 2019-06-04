@extends('layouts.app')

@section('title')

    Samples - Search

@endsection

@section('header')

    Samples - Search

@endsection

@section('content')

    <div class="container">
        <div class="columns is-marginless is-centered">
            <div class="column is-8">
                <br>
                <nav class="card">
                    <header class="card-header">
                        <p class="card-header-title">
                            Search - Sample Records
                        </p>
                    </header>

                    <div class="card-content">

                        @if (session('status'))
                            <article class="message is-danger">
                                <div class="message-body">
                                    {!! session('status') !!}                        
                                </div>
                            </article>
                        @endif

                        <form class="findsample-form" method="POST" action="{!! route('findSample') !!}">

                            {!! csrf_field() !!}

                            <div class="field is-horizontal">
                                <div class="field-label">
                                    <label class="label">Sample ID</label>
                                </div>

                                <div class="field-body">
                                    <div class="field">
                                        <p class="control">
                                            <input class="input" id="sampleid" type="number" name="sampleid">
                                        </p>
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
                                            <select name="Study" id="Study">
                                                @foreach ($studies as $opt)
                                                    <option value="{!! $opt !!}">{!! $opt !!}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="field-label" style="white-space: nowrap">
                                        <label class="label">CH Number</label>
                                    </div>

                                    <div class="field">
                                        <p class="control">
                                            <input class="input" id="CH_Num" type="number" name="CH_Num">
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="field is-horizontal">
                                <div class="column">
                                    <button type="submit" class="button is-primary is-fullwidth">Find Sample</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    
@endsection