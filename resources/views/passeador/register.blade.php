<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Title / Icon -->
    <title>Promener - Passeador register</title>
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
            $('#cpf').mask('000.000.000-00');
            $('#celular').mask('(00)00000-0000');
        });
    </script>
</head>

<body class="antialiased">
    <a href="{{ route('user.login-view') }}">Voltar</a>
    <div class="grey lighten-2 register container">
        <img class="logo-login" src="https://i.pinimg.com/736x/2e/d5/7a/2ed57accf63d08e5ebb1ee853bed1832.jpg">
        <h3>Registrar passeador</h3>
        <!-- Form -->
        <div class="row">
            <form method="POST" action="{{ route('passseador.store') }}" class="col s12">
                @csrf

                <!-- nome -->
                <div class="row">
                    <div class="input-field col s12">
                        <input id="name" name="name" type="text" class="validate">
                        <label for="name">Nome</label>

                        @error('name')
                        <div class="red-text">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>

                <!-- email -->
                <div class="row">
                    <div class="input-field col s12">
                        <input id="email" name="email" type="email" class="validate">
                        <label for="email">Email</label>

                        @error('email')
                        <div class="red-text">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>

                <!-- idade -->
                <div class="input-field col s12">
                    <input name="idade" type="number" min="1" id="idade" class="validate @error('idade') is-invalid @enderror">
                    <label for="idade">Idade:</label>

                    @error('idade')
                    <div class="red-text">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <!-- cpf -->
                <div class="row">
                    <div class="input-field col s12">
                        <input id="cpf" name="cpf" type="text" class="validate">
                        <label for="cpf">CPF</label>

                        @error('cpf')
                        <div class="red-text">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>

                <!-- celular -->
                <div class="row">
                    <div class="input-field col s12">
                        <input id="celular" name="celular" type="text" class="validate">
                        <label for="celular">Celular</label>

                        @error('celular')
                        <div class="red-text">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>

                <!-- imagem -->
                <div class="row">
                    <div class="input-field col s12">
                        <input id="imagem" name="imagem" type="text" class="validate">
                        <label for="imagem">Imagem:</label>

                        @error('imagem')
                        <div class="red-text">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>

                <!-- Senha -->
                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" name="password" type="password" class="validate">
                        <label for="password">Senha</label>

                        @error('senha')
                        <div class="red-text">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col s2"></div>
                    <div class="col s7">
                        <button class="btn waves-effect waves-light blue darken-4" type="submit" name="action">registrar</button>
                    </div>
                    <div class="col s2"></div>
                </div>
            </form>
        </div>
    </div>
    <!-- scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/frameworks/materialize/js/materialize.js') }}"></script>
    <script src="{{ asset('assets/js/teste.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
</body>

</html>