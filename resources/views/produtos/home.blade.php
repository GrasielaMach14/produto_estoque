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
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark d-flex justify-content-between">
        <a class="navbar navbar-expand-lg" href="{{ route('listar_produtos') }}" style="color:white;">Home</a>
        @auth
        <a href="/sair" style="color:white;">Sair</a>
        @endauth
        @guest
        <a href="/entrar" style="color:white;">Entrar</a>
        @endguest
    </nav>
    <div class="jumbotron">
        <h1 style="color:white;text-align:center;position:relative;text-shadow:black 0.1em 0.1em 0.2em;font-size:64px;">Estoque de Produtos</h1>
    </div>
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm">
                <div class="card border border-light rounded" style="width:18rem;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);background-color:#6A989F;color:white;">
                    <a href="/produtos">
                        <img class="card-img-top" src="/img/listaprodutos.png" alt="Imagem de capa do card">
                    </a>
                    <div class="card-body">
                        <p class="card-text">Listagem de produtos.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card border border-light rounded" style="width:18rem;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);background-color:#6A989F;color:white;">
                    <a href="/categorias">
                        <img class="card-img-top" src="/img/listacategoria.png" alt="Imagem de capa do card">
                    </a>
                    <div class="card-body">
                        <p class="card-text">Listagem de categorias.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card border border-light rounded" style="width:18rem;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);background-color:#6A989F;color:white;">
                    <a href="/produtos">
                        <img class="card-img-top" src="/img/listaprodutos.png" alt="Imagem de capa do card">
                    </a>
                    <div class="card-body">
                        <p class="card-text">Listagem de produtos.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>