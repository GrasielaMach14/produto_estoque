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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/css/menu.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark d-flex justify-content-between">
        <a class="navbar navbar-expand-lg" style="color:black;">
      
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <ul id="myUL">
            <li><a href="/produtos/home">Home</a></li>
            <li><a href="/produtos">Produtos</a></li>
            <li><a href="/categorias">Categoria</a></li>
            <li><a href="#" class="caret">Estoque<span>+</span></a>
                <ul class="nested">
                    <li><a href="#">Movimentação</a></li>
                    <li><a href="#">Entrada de produtos</a></li>
                    <li><a href="#">Saída de produtos</a></li>
                </ul>
            </li>
            <li><a href="/setores">Setor</a></li>
            <li><a href="/funcionarios">Funcionários</a></li>
            <li><a href="/fornecedores">Fornecedores</a></li>
            <li><a href="/entrar">Login</a></li>
            <li><a href="/registrar">Registrar-se</a></li>
            <li><a href="#" class="caret">Contato<span>+</span></a>
                <ul class="nested">
                    <li><a href="#">@Email</a></li>
                    <li><a href="#">Telefone</a></li>
                </ul>
            </li>
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
        <h1 style="font-size:85px;color:#ccc;">Controle de Estoque</h1>
        <h5 class="mt-5 text-dark">Uma maneira simples de ter o controlar o estoque da sua empresa.</h5>
        <p class="text-dark">Registre aqui seus produtos, funcionários e organize toda a 
            movimentação da sua empresa.</p>
        <button class="btn btn-primary">Veja mais aqui</button> 
    </div>
    <div class="container" id="main">
        <section style="margin-bottom:70px;">
            <div class="row mt-5">   
                <div class="col-md-6">
                    <div class="card flex-md-row mb-4 box-shadow h-md-250">
                        <div class="card-body d-flex flex-column align-items-start" style="width: 280px;">
                        <strong class="d-inline-block mb-2 text-primary">World</strong>
                        <h3 class="mb-0">
                            <a class="text-dark" href="#">Featured post</a>
                        </h3>
                        <div class="mb-1 text-muted">Nov 12</div>
                        <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                        <a href="#">Continue reading</a>
                        </div>  
                        <img class="card-img-right flex-auto d-none d-md-block" style="width: 200px; height: 250px;" src="../img/archive-1850170__340.webp">
                    </div>   
                </div>         
                <div class="col-md-6">
                    <div class="card flex-md-row mb-4 box-shadow h-md-250">
                        <div class="card-body d-flex flex-column align-items-start" style="width: 280px;">
                        <strong class="d-inline-block mb-2 text-primary">World</strong>
                        <h3 class="mb-0">
                            <a class="text-dark" href="#">Featured post</a>
                        </h3>
                        <div class="mb-1 text-muted">Nov 12</div>
                        <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                        <a href="#">Continue reading</a>
                        </div>  
                        <img class="card-img-right flex-auto d-none d-md-block" style="width: 200px; height: 250px;" src="../img/pessoas.jpg">
                    </div>   
                </div>         
            </div>
        </section>
        <hr>
        <section style="margin-bottom:70px;">
            <h3 style="color:#3E403A;">Navegue nas abas disponíveis</h3>
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
        </section>
        <hr>
        <section>
        <div class="row mt-5">   
                <div class="col-md-6">
                    <div class="card flex-md-row mb-4 box-shadow h-md-250">
                        <div class="card-body d-flex flex-column align-items-start" style="width: 280px;">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                <img class="d-block w-100" src="../img/archive-1850170__340.webp" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                <img class="d-block w-100" src="../img/workplace-1245776__340.webp" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                <img class="d-block w-100" src="../img/tie-690084_960_720.webp" alt="Third slide">
                                </div>                                
                                <div class="carousel-item">
                                <img class="d-block w-100" src="../img/office-1209640_960_720.jpeg" alt="Fourth slide">
                                </div>
                            </div>
                        </div>  
                        </div>  
                    </div>   
                </div>         
                <div class="col-md-6">
                    <div class="card flex-md-row mb-4 box-shadow h-md-250">
                        <div class="card-body d-flex flex-column align-items-start" style="width: 280px;">
                        <strong class="d-inline-block mb-2 text-primary">World</strong>
                        <h3 class="mb-0">
                            <a class="text-dark" href="#">Featured post</a>
                        </h3>
                        <div class="mb-1 text-muted">Nov 12</div>
                        <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                        <a href="#">Continue reading</a>
                        </div>  
                    </div>   
                </div>         
            </div>
        </section>   
    </div>
   
    <footer class="editfooter" style="margin-top:15%;">
        <p>Aliquam nonummy auctor massa</p> 
        <hr>
        <p>Aliquam nonummy auctor massa</p>
    </footer>
    <script>
        var toggler = document.getElementsByClassName("caret");
        var i;
        //Carrousel
        $('#carouselExampleIndicators').on('slide.bs.carousel', function () {
            interval: 2000
        });

        function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        }

        /* Set the width of the side navigation to 0 */
        function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        }
        
        //Abrir submenu do menu lateral
        for (i = 0; i < toggler.length; i++) {
            toggler[i].addEventListener("click", function() {
                this.parentElement.querySelector(".nested").classList.toggle("active");
                this.classList.toggle("caret-down");
            });
        } 
    </script>
 
</body>
</html>