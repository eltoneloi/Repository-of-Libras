<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LibrasRP') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   <link href="https://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">

</head>
<body style="margin-top: 80px">
    <div id="app" >
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}"><strong>
                        {{ config('app.name', 'LibrasRP') }}
                    <strong></a>
                     
                </div>
                

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <ul class="nav navbar-nav">
                        <li>
                            <a href="{{ url('/contribute/first') }}"><strong>
                                Contribua
                            </strong></a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}"><strong>Entrar</strong></a></li>
                            <li><a href="{{ route('register') }}"><strong>Criar conta</strong></a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Sair
                                        </a>
                                        <a href="#">Conta</a>
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
    </div>
    <div style="margin-top:250px">
        
<!--footer start from here-->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 footer-col">
                <div class="logofooter">LibrasRP</div>
                <p>Contato:</p>
                <p><i class="fa fa-envelope"></i> E-mail : suportelibrasrp@mail.com</p>

            </div>

            <div class="col-md-6 col-sm-6 footer-col">
                <h6 class="heading7">Redes Sociais</h6>
                <ul class="footer-social">
                    <li><a href="#"><i class="fa fa-facebook social-icon facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter social-icon twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus social-icon google" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-vk social-icon vk" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!--footer start from here-->

<div class="copyright">
    <div class="container">
        <div class="col-md-6">
            <p>© 2017 - LibrasRP | Elton Silva, Juliana Sirena e João Pedro Mendes</p>
        </div>
        <div class="col-md-6">
            <ul class="bottom_ul">
                <li><a href="#">Sobre nós</a></li>
                <li><a href="#">Contatos</a></li>


            </ul>
        </div>
    </div>
</div>
    </div>
    <!-- Scripts -->
    
     <script src="{{ asset('js/app.js') }}"></script>
     <script src="{{ asset('js/selectCategory.js') }}"></script>
     <script src="{{ asset('js/register.js') }}"></script>

    
</body>
</html>
