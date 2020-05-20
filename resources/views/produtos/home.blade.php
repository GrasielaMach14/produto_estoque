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
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark d-flex justify-content-between">
        <a class="navbar navbar-expand-lg" style="color:black;">
      
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <ul>
            <li><a href="/produtos/home">Home</a></li>
            <li><a href="/produtos">Produtos</a></li>
            <li><a href="/categorias">Categoria</a></li>
            <li><a href="#">Estoque</a></li>
            <li><a href="/setores">Setor</a></li>
            <li><a href="/funcionarios">Funcionários</a></li>
            <li><a href="/entrar">Login</a></li>
            <li><a href="/registrar">Registrar-se</a></li>
            <li><a href="#">Contato <span>+</span></a></li>    
            <li><a href="/sair">Sair</a></li>
            </ul>
        </div>

        <!-- Use any element to open the sidenav -->
        <span onclick="openNav()" class="menu-icon" style="color:#fff;">&#9776;</span>
        <!--   
            <header></header>
            <input type="checkbox" id="chk">
            <label for="chk" class="menu-icon">&#9776;</label>
            <div class="big"></div>
            <nav class="menu" id="principal">
                <ul>
                    <li><div id="principal" class="principal">
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    </li>
                    <li><a href="#" class="voltar">Voltar</a></li>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Produtos</a></li>
                    <li><a href="#">Categoria</a></li>
                    <li><a href="#">Estoque</a></li>
                    <li><a href="#">Funcionário</a></li>
                    <li><a href="#">Contato <span>+</span></a></li>
                </ul>
            </nav>-->
        </a>
        @auth
        <a href="/sair" style="color:white;">Sair</a>
        @endauth
        @guest
        <a href="/entrar" style="color:white;">Entrar</a>
        @endguest
    </nav>
    <div class="jumbotron fachada">
        <h1 style="font-size:85px;color:#ccc;">Estoque de Produtos</h1>
        <h5 class="mt-5">Uma maneira simples de ter o controle do estoque.</h5>
        <p>Registre aqui seus produtos, funcionários e toda a 
            movimentação da sua empresa.</p>
        <button class="btn btn-primary">Veja mais aqui</button> 
    </div>
    <div class="container" id="main">
        <div class="row mt-5">
            <div class="col-sm">
                <div class="card border border-light rounded cards">
                    <a href="/setores">
                        <img class="img-thumbnail" src="/img/listasetor.png" alt="Imagem de capa do card">
                    </a>
                    <div class="card-body">
                        <a href="/setores" class="btn btn-dark">Veja mais</a>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card border border-light rounded cards">
                    <a href="/produtos">
                        <img class="img-thumbnail" src="/img/listaprodutos.png" alt="Imagem de capa do card">
                    </a>
                    <div class="card-body">
                        <a href="/produtos" class="btn btn-dark">Veja mais</a>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card border border-light rounded cards">
                    <a href="/categorias">
                        <img class="img-thumbnail" src="/img/listacategoria.png" alt="Imagem de capa do card">
                    </a>
                    <div class="card-body">
                        <a href="/categorias" class="btn btn-dark">Veja mais</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer></footer>
    <script>
        function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        }

        /* Set the width of the side navigation to 0 */
        function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        }
    </script>
 
</body>
</html>