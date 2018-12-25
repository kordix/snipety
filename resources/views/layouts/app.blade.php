<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{asset('css/prism.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ route('start') }}">
                        SnipetAppka
                    </a>

                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li><a href="{{route('create')}}">Dodaj quizet</a></li>
                        <li><a href="{{route('list')}}">Lista</a></li>
                        <li><a href="{{route('categories')}}">Kategorie</a></li>
                        <li><a href="{{route('startchannel', 3)}}">Laravel</a></li>
                        <li><a href="{{route('startchannel', 5)}}">Symfony</a></li>

                        <ul class="dropdown-menu">
                            @foreach (App\Channel::all() as $channel)
                                <li><a href="/threads/{{ $channel->slug }}">{{ $channel->name }}</a></li>
                            @endforeach
                        </ul>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href=""><form method="POST" action="{{route('updatecounterset',1)}}" >{{csrf_field()}}{{method_field('PATCH')}}<button type="submit" style="margin-right:5px">Ustaw counter:</button><input value="{{App\Setting::find(1)['counternum']}}" style="width:50px" type="number" name="counter" placeholder="ustaw counter" > </form></a></li>
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')


            <br><br>
            <footer id="mojfooter">
            <div class="footer-copyright text-center">© 2018 Copyright:
            <a href="{{route('start')}}">Kordix technologies &reg;</a>
            </div>
            </footer>

        {{-- <nav class="navbar navbar-default navbar-static-bottom" style="height:20px">
        </nav> --}}


    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/prism.js') }}"></script>
    <script src="{{ asset('js/codemirror/lib/codemirror.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/codemirror.css')}}">
    <script src=" {{asset('js/codemirror/mode/javascript/javascript.js')}} "></script>
    <script>
    document.addEventListener("DOMContentLoaded", function(event) {
        var editorCode = document.getElementById('code');
        // var editorContent = document.getElementById('editor-content');
        // var selector = document.getElementById('selector');
        // editorCode.innerHTML = Prism.highlight(editorContent.value, Prism.languages.javascript);



        // $('#dupa').on('click', function() {
        //     var zbigniew = $('#code').text();
        //     console.log(zbigniew);
        //     editorCode.innerHTML = Prism.highlight(zbigniew, Prism.languages.javascript);
        //
        // });

        var myTextarea = document.getElementById('edytor');
        var editor = CodeMirror.fromTextArea(myTextarea, {
            value: "function myScript(){return 100;}\n",
            mode:  "javascript",
    lineNumbers: true
  });

//   var myCodeMirror = CodeMirror(document.body, {
//   value: "function myScript(){return 100;}\n",
//   mode:  "javascript",
//   lineNumbers: true
//
// });


    });

    // var myCodeMirror = CodeMirror(document.body, {
    //   value: "function myScript(){return 100;}\n",
    //   mode:  "javascript"
    // });




    </script>


    @yield('scripts')

</body>
</html>
