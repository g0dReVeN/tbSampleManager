@extends('layouts.app')

@section('title')

    Home - Dashboard

@endsection

@section('header')

    TB Sample Manager - Dashboard

@endsection

@section('content')

    <div class="container">
        <div class="columns is-marginless is-centered">
            <div>
                <br>
                <br>
                <div class="columns">
                    <nav class="card column">
                        <header class="card-header">
                            <p class="card-header-title">
                                Total Records: Patients Vs Samples
                            </p>
                        </header>

                        <div class="column" id="chart-div1" style="width: 400px; height: 350px;"></div>
                            @donutchart('Total', 'chart-div1')
                    </nav>
                    <nav class="card column">
                        <header class="card-header">
                            <p class="card-header-title">
                                Patients By Sex
                            </p>
                        </header>

                        <div class="column" id="chart-div2" style="width: 400px; height: 350px;"></div>
                            @donutchart('Patients', 'chart-div2') 
                    </nav>
                    <nav class="card column">
                        <header class="card-header">
                            <p class="card-header-title">
                                Patients By Age Group
                            </p>
                        </header>

                        <div class="column" id="chart-div3" style="width: 400px; height: 350px;"></div>
                            @donutchart('PatientsAge', 'chart-div3')
                    </nav>
                    <nav class="card column">
                        <header class="card-header">
                            <p class="card-header-title">
                                Clinics By Type
                            </p>
                        </header>

                        <div class="column" id="chart-div4" style="width: 400px; height: 350px;"></div>
                            @donutchart('Clinics', 'chart-div4')
                    </nav>
                </div>
                <br>
                <div class="columns">
                    <nav class="card column">
                        <header class="card-header">
                            <p class="card-header-title">
                                Samples By Study
                            </p>
                        </header>

                        <div class="column" id="chart-div5" style="width: 400px; height: 350px;"></div>
                            @donutchart('SamplesStudy', 'chart-div5')
                    </nav>
                    <nav class="card column">
                        <header class="card-header">
                            <p class="card-header-title">
                                Samples By Category
                            </p>
                        </header>

                        <div class="column" id="chart-div6" style="width: 400px; height: 350px;"></div>
                            @donutchart('SamplesCat', 'chart-div6') 
                    </nav>
                    <nav class="card column">
                        <header class="card-header">
                            <p class="card-header-title">
                                Samples By Status
                            </p>
                        </header>

                        <div class="column" id="chart-div7" style="width: 400px; height: 350px;"></div>
                            @donutchart('SamplesStat', 'chart-div7')
                    </nav>
                    <nav class="card column">
                        <header class="card-header">
                            <p class="card-header-title">
                                Samples By Resistance
                            </p>
                        </header>

                        <div class="column" id="chart-div8" style="width: 400px; height: 350px;"></div>
                            @donutchart('SamplesResist', 'chart-div8')
                    </nav>
                </div>
                <br>
            </div>
        </div>
    </div>

@endsection
