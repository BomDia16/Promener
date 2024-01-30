<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Title / Icon -->
    <title>Promener - Pagamento</title>
    <link rel="icon" href="https://i.pinimg.com/736x/2e/d5/7a/2ed57accf63d08e5ebb1ee853bed1832.jpg">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/frameworks/materialize/css/materialize.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('assets/css/estilo.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>


    <link href="{{ asset('assets/js/jquery.mask.min.js') }}" rel="script">
    <script>
        $(document).ready(function($) {
            $('#cep').mask('00000-000');
        });
    </script>
</head>

<body class="antialiased">
    <header>
        <!--Sidenav-->
        <ul id="sidenav" class="sidenav sidenav-fixed z-depth-0 light-blue darken-3 gradient-bottom">
            <a href="{{ route('welcome') }}" class="brand-logo">
                <li id="box-logo" style="margin-top:24px;margin-bottom:24px;" class="white-text">
                    <img id="logo" class="responsive-img" src="https://i.pinimg.com/736x/2e/d5/7a/2ed57accf63d08e5ebb1ee853bed1832.jpg" />
                </li>
            </a>
            <hr>
            <li>
                <a href="{{ route('cachorro.index') }}" class="white-text">
                    <i class="material-icons">pets</i>
                    Meus pets
                </a>

                <a href="{{ route('pedido.index') }}" class="white-text">
                    <i class="material-icons">shopping_cart</i>
                    Meus pedidos
                </a>
            </li>
        </ul>

        <!--Navbar-->
        <nav id="nav" class="z-depth-0 lime darken-1">
            <div class="nav-wrapper">
                <a href="#" data-target="sidenav" class="sidenav-trigger">
                    <i class="material-icons">menu</i>
                </a>
                <ul class="right">
                    <li id="minha-conta">
                        <a id="button-dropdown-my-account" class="dropdown-trigger" href="javascript:void(0);" data-target="dropdown-my-account">
                            <i class="material-icons large">account_circle</i>
                        </a>
                        <!-- Dropdown Minha Conta -->
                        <ul id="dropdown-my-account" class="dropdown-content">
                            @if(auth()->check())
                            <li>
                                <a class="black-text">
                                    <i class="material-icons">person</i>
                                    {{ auth()->user()->nome }}
                                </a>
                            </li>
                            <li>
                                <a href="#" class="black-text">
                                    <i class="material-icons">settings</i>
                                    Minha Conta
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a class="dropdown-item black-text" href="" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="material-icons">power_settings_new</i>
                                    {{ __('Logout') }}
                                </a>
                                <!-- Lembre de colocar o route de volta -->
                                <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>

                            @else
                            <li>
                                <a href="{{ route('user.login-view') }}" class="black-text">
                                    <i class="material-icons">lock_outline</i>
                                    Login
                                </a>
                                <a href="{{ route('passeador.login-view') }}" class="black-text">
                                    <i class="material-icons">lock_outline</i>
                                    Login passeador
                                </a>
                            </li>
                            @endif
                            <li class="divider"></li>
                            <li>
                                <a href="" class="black-text">
                                    <i class="material-icons">assignment_ind</i>
                                    Login ADM
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="row">
        <div class="col s12 m10 l5 offset-l2 offset-m1">
            <div class="card">
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">Informações para o passeio:</span>
                    <img id="logo" src="{{ $cachorro->imagem }}" alt="{{ $cachorro->nome }}">
                </div>
                <hr>
                <div class="card-image waves-effect waves-block waves-light">
                    <form action="{{ route('pedido.store') }}" method="post">
                        @csrf
                        <!-- Nome -->
                        <div class="input-field col s6">
                            <input disabled name="nome" type="text" id="nome" class="validate @error('nome') is-invalid @enderror" value="{{ $cachorro->nome }}">
                            <label for="nome">Nome</label>

                            @error('nome')
                            <div class="red-text">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <!-- raca -->
                        <div class="input-field col s6">
                            <input disabled name="raca" id="raca" type="text" class="validate @error('raca') is-invalid @enderror" value="{{ $cachorro->raca }}">
                            <label for="raca">Raça</label>

                            @error('raca')
                            <div class="red-text">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <!-- peso -->
                        <div class="input-field col s6">
                            <input disabled name="peso" id="peso" type="text" class="validate @error('peso') is-invalid @enderror" value="{{ $cachorro->peso }}">
                            <label for="peso">Peso</label>

                            @error('peso')
                            <div class="red-text">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <!-- informacao_extra -->
                        <div class="input-field col s6">
                            <input disabled name="informacao_extra" id="informacao_extra" type="text" class="validate @error('informacao_extra') is-invalid @enderror" value="{{ $cachorro->informacao_extra }}">
                            <label for="informacao_extra">Informações extras</label>

                            @error('informacao_extra')
                            <div class="red-text">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <!-- local -->
                        <div class="input-field col s12">
                            <input name="local" id="local" type="text" class="validate @error('local') is-invalid @enderror">
                            <label for="local">Local</label>

                            @error('local')
                            <div class="red-text">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <!-- passeador_id -->
                        <div class="input-field col s12">
                            <input type="hidden" name="passeador_id" value="{{ $passeador->id }}">

                            @error('passeador_id')
                            <div class="red-text">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <!-- horario -->
                        <div class="input-field col s6">
                            <input name="horario" id="horario" type="time" class="validate @error('horario') is-invalid @enderror">
                            <label for="horario">Horário</label>

                            @error('horario')
                            <div class="red-text">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <!-- preco -->
                        <div class="input-field col s6">
                            <input disabled name="preco" id="preco" type="text" value="R$40,00" class="validate @error('preco') is-invalid @enderror">
                            <label for="preco">Preco</label>

                            @error('preco')
                            <div class="red-text">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <input type="hidden" name="cachorro_id" value="{{ $cachorro->id }}">

                        <button id="cadastrar" class="btn waves-effect waves-light blue-grey darken-3" type="submit">
                            Passear
                            <i class="material-icons right">send</i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col s12 m10 l3 card">
            <div id="passeador_informacoes" class="card-content">
                <span class="card-title activator grey-text text-darken-4">Passeador escolhido:</span>
                <hr>
                <img class="container" id="passeador-img" src="{{ $passeador->imagem }}" alt="">
                <p>Nome: {{ $passeador->nome }}</p><br>
                <p>Descrição: Oi, eu sou {{ $passeador->nome }}, tenho {{ $passeador->idade }} anos e estou muito feliz em passear com o
                    seu cachorro! Caso precise me contatar é só usar esse numero abaixo.
                </p><br>
                <p>Celular: {{ $passeador->celular }}</p>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <footer class="page-footer lime darken-1 fixarRodape">
        <div class="footer-copyright">
            <div class="container">
                ©2023 Todos os direitos reservados a Promener
            </div>
        </div>
    </footer>

    <!-- scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/frameworks/materialize/js/materialize.js') }}"></script>
    <script src="{{ asset('assets/js/teste.js') }}"></script>
    <script src="{{ asset('assets/js/funcoes.js') }}"></script>
    <link href="{{ asset('assets/js/jquery.mask.min.js') }}" rel="script">
</body>

</html>