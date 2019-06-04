<!DOCTYPE html>
<html lang="{!! app()->getLocale() !!}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{!! csrf_token() !!}">

        <title>@yield('title', 'TB Sample Database')</title>

        <!-- Styles -->
        <link href="{!! asset('css/app.css') !!}" rel="stylesheet">

        <!-- Scripts -->
        <script type="text/javascript" src="{!! asset('js/app.js') !!}"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })

            $(document).on("wheel", "input[type=number]", function (e) {
                e.preventDefault()
            })

        </script>
        @yield('scripts')

    </head>
    <body background="{!! asset('img/qedbio-blog-mycobacterium-tuberculosis.jpg') !!}" style="min-height: 100vh; background-size: 100%">
        <div id="app" style="position: relative;  min-height: 100vh;">
            <nav class="navbar has-shadow">
                <div class="container">
                    <div class="navbar-brand">
                        <a href="{!! route('home') !!}" class="navbar-item">Home</a>
                        @if (!Auth::guest() && (Auth::user()->access == '6' || Auth::user()->access == '4' || Auth::user()->access == '1' || Auth::user()->access == '3'))
                            <div class="navbar-item has-dropdown is-hoverable">
                                <a class="navbar-link" href="{!! route('patients') !!}">Patients</a>

                                <div class="navbar-dropdown">
                                    <a class="navbar-item" href="{!! route('newpatient') !!}">Add New Patient</a>
                                </div>
                            </div>
                        @endif
                        <a href="{!! route('samples') !!}" class="navbar-item">Samples</a>
                        <a href="{!! route('customq') !!}" class="navbar-item">Custom Query</a>
                        @if (!Auth::guest() && Auth::user()->access != '4')
                            <div class="navbar-item has-dropdown is-hoverable">
                                <a class="navbar-link" href="{!! route('requests') !!}">Requests</a>

                                <div class="navbar-dropdown">
                                    <a class="navbar-item" href="{!! route('requestsadmin') !!}">Manage Requests</a>
                                </div>
                            </div>
                        @endif
                        <a href="{!! route('sampleattribute') !!}" class="navbar-item">Sample Attributes</a>
                        <a href="{!! route('clinics') !!}" class="navbar-item">Clinics</a>
                        @if (!Auth::guest() && Auth::user()->access == '6')
                            <a href="{!! route('admin') !!}" class="navbar-item">Admin</a>
                        @endif
                    </div>

                    <div class="navbar-menu" id="navMenu">
                        <div class="navbar-start"></div>

                        <div class="navbar-end">
                            @if (Auth::guest())
                                <a class="navbar-item " href="{!! route('login') !!}">Login</a>
                            @else
                                <div class="navbar-item has-dropdown is-hoverable">
                                    <a class="navbar-link" href="#">{!! Auth::user()->email !!}</a>

                                    <div class="navbar-dropdown">
                                        <a class="navbar-item" href="{!! route('logout') !!}"
                                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{!! route('logout') !!}" method="POST"
                                              style="display: none;">
                                            {!! csrf_field() !!}
                                        </form>

                                        <a class="navbar-item" href="{!! route('password.reset', ['token' => Auth::user()->email]) !!}"
                                           onclick="event.preventDefault();document.getElementById('passwordreset-form').submit();">
                                            Change Password
                                        </a>

                                        <form id="passwordreset-form" action="{!! route('password.reset', ['token' => Auth::user()->email]) !!}" method="GET"
                                              style="display: none;">
                                        </form>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </nav>
            
            <section class="hero is-primary">
                <div class="hero-body">
                    <div class="container">
                        <h1 class="title">
                            @yield('header', 'TB Sample Database')
                        </h1>
                    </div>
                </div>
            </section>
            <div style="padding-bottom: 40px;">
                @yield('content')

            </div>

            <footer style="background-color: #00D1B2; position: absolute; bottom: 0; width: 100%; vertical-align: middle; line-height: 40px;">
                <div class="content has-text-centered" style="height: 40px; color: white;"><strong style="color: white;">© Copyright <script type="text/javascript">document.write(new Date().getFullYear());</script> TB Genomics Research Group - Stellenbosch University</strong></div>
            </footer>
            
        </div>
    </body>
</html>
