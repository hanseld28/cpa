<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login | CPA</title>

        <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
    </head>
    <link href="https://fonts.googleapis.com/css?family=Maven+Pro&display=swap" rel="stylesheet">
    <body>
        <section id="conteudo-view" class="login">
            <h1>CPA</h1>
            <h3>Comissão Própria de Avaliação</h3>

            {!! Form::open(['route' => 'user.login', 'method' => 'post']) !!}

            <p>Acesse o sistema</p>

            <label for="">
                {!! Form::text('email', null, ['class' => 'input', 'placeholder' => 'E-mail']) !!}
            </label>

            <label for="">
                    {!! Form::password('password', ['placeholder' => 'Senha']) !!}
            </label>

            {!! Form::submit('Entrar') !!}

            {!! Form::close() !!}
        </section>

    </body>
</html>