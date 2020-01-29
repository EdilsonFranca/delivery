<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <base href="http://127.0.0.1:8000/"/> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('APP_NAME', 'Big Lanche Delivery') }}</title>

    <!-- Scripts -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/modal.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fale-conosco.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sobre-nos.css') }}" rel="stylesheet">
</head>
<body>

    <div id="app">
        <div class="top-header container-fluid row">
            <div class="peca-agora col-9">Aproveite nossas Promoções  </div>
            <div class="redes-socias col-3">
                <svg class="item‐icone-facebook"><use xlink:href="icon-svg/categorias.svg#facebook"/></svg>
                <svg class="item‐icone-instagran"><use xlink:href="icon-svg/categorias.svg#instagran"/></svg>
        </div>
    </div>
        <header class="header-principal container-fluid">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('APP_NAME', 'Big Lanche Delivery') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                                <a class="nav-link nav-link-menu" href="">Home</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link nav-link-menu" href="{{action('SobreNosController@pag')}}">Sobre Nós</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link nav-link-menu" href="{{action('FaleConoscoController@pag')}}">Fale Conosco</a>
                         </li>
                         <li class="nav-item">
                                <a class="nav-link nav-link-menu nav-link-menu-sacola " href="">Sacola(<span></span>)</a>
                         </li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link nav-link-menu" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link nav-link-menu" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link nav-link-menu dropdown-toggle" href="#" role="button" data-toggle="dropdown"  aria-expanded="false" v-pre>
                                <svg class="item‐icone-avatar"><use xlink:href="icon-svg/categorias.svg#avatar"/></svg> 
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <small>Ola</small> <span class="usuario"> {{ Auth::user()->name}}  ! <br></span>
                                    <small  class="rua"> Rua {{ Auth::user()->endereco->rua}}<br></small>
                                    <small  class="numero"> Numero:{{ Auth::user()->endereco->numero}}<br></small>
                                    <small  class="bairro"> {{ Auth::user()->endereco->bairro}}<br></small>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        </header>
        <main class="">
            @yield('content')
        </main>
    </div>
    <hr>
    <footer class="rodape-principa">
    <p class="text-center col-12"><b>Copyright © 2019 Todos os direitos reservado</b></p>
        <div class="row">
            <div class="col-md-3 rodape-principa-row-col-3 text-center col-12">
                <span class="rodape-principa-row-col-3-span"><svg class="item‐icone-rodape"><use xlink:href="icon-svg/categorias.svg#localizacao"/></svg>Onde estamos</span>
                    <p>Itaquera,Rua das Pedras,<br>345,CEP 83478-459  São Paulo SP</p>
            </div>
            <div class="col-md-3 rodape-principa-row-col-3 text-center col-12">
               <span class="rodape-principa-row-col-3-span"><svg class="item‐icone-rodape"><use xlink:href="icon-svg/categorias.svg#horario"/></svg> Horário de atendimento</span>
                   <p>de terça à Sexta das 18:00h às 22:00h / Sábado e domingo: 18:00h às 00:00h</p>
            </div>
            <div class="col-md-3 rodape-principa-row-col-3 text-center col-12">
                <span class="rodape-principa-row-col-3-span">Redes sociais</span>
                <div class="redes_sociais">
					<a href=""><i><svg class="item‐icone-rodape"><use xlink:href="icon-svg/categorias.svg#facebook"/></svg></i></a>
					<a href=""><i><svg class="item‐icone-rodape"><use xlink:href="icon-svg/categorias.svg#instagran"/></svg></i></a>
				</div>
            </div>
            <div class="col-md-3 rodape-principa-row-col-3 text-center col-12">
                <span class="rodape-principa-row-col-3-span">Contatos</span>
                <div class="contato-rodape">
					     <p><i><svg class="item‐icone-rodape"><use xlink:href="icon-svg/categorias.svg#telefone"/></svg></i>(11)95540-4040</p>
						 <p><a class="link-whatsapp" href="https://web.whatsapp.com/send?phone=5511946279867&text= isto é um teste"><i><svg class="item‐icone-rodape"><use xlink:href="icon-svg/categorias.svg#whatshap"/></svg></i>(11)995540-4040 </a></p>
				</div>
            </div>
       </div>
       <div class="footer-botton">
       <p><svg class="item‐icone-rodape-botton"><use xlink:href="icon-svg/categorias.svg#carta"/></svg>contatoBig-Lanche-Delivery@gmail.com</p>
       </div>
    </footer>
</body>
</html>

