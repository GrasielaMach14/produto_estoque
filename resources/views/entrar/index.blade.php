<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estoque de produtos</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/menu.css">
</head>
<body style="background-color:#5A62682E;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark d-flex justify-content-between">
        <a class="navbar navbar-expand-lg" href="/produtos/home" style="color:white;">Home</a>
        @auth
        <a href="/sair" style="color:white;">Sair</a>
        @endauth
        @guest
        <a href="/entrar" style="color:white;">Entrar</a>
        @endguest
    </nav>
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="post">
            @csrf
            <div class="container centralizar" style="background-color:#ffff;">
                <i class="fas fa-user-lock fa-5x"></i> 
                <div class="form-group mt-4">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" required class="form-control">
                </div>

                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" name="password" id="password" required min="1" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary mt-3">
                    Entrar
                </button>

                <a href="/registrar" class="btn btn-secondary mt-3">
                    Registrar-se
                </a>
            </div>
        </form>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>



