@extends('layouts.app')

@section('title')

    TB Sample Database - Sample Attributes

@endsection

@section('scripts')

    @if (Auth::user()->access >= 2 && Auth::user()->access <= 4 || Auth::user()->access == 6)
        <script type="text/javascript" src="{!! asset('js/access_sa.js') !!}"></script>
    @else
        <script type="text/javascript" src="{!! asset('js/sa.js') !!}"></script>
    @endif

@endsection

@section('header')

    Sample Attributes

@endsection

@section('content')

    <div class="container">
        <div class="columns is-marginless is-centered">
            <div class="column is-8">
                <br>
                <nav class="card">
                    <header class="card-header">
                        <p class="card-header-title">
                            Sample Attributes
                        </p>
                    </header>

                    <div class="card-content">

                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">Sample Attribute</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <div class="select is-primary is-fullwidth">
                                            <select name="sample_attribute" id="sample_attribute">
                                                @foreach ($data as $opt)
                                                    <option value="{!! $opt !!}">{!! $opt !!}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="column">
                                <button id="ajaxList" class="button is-primary is-fullwidth">List Values</button>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <div id="valueBlock" class="columns is-marginless is-centered" style="display: none;">
            <div class="column is-8">
                <table id="valueResults" class="table is-bordered is-striped is-hoverable is-fullwidth">
                    <thead>
                        <tr>
                            <th id="sattr"></th>
                            @if (Auth::user()->access >= 2 && Auth::user()->access <= 4 || Auth::user()->access == 6)
                                <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

                <article class="message is-success"><div id="alert" class="message-body" style="display: none;"></div></article>

            </div>
        </div>
    </div>

@endsection