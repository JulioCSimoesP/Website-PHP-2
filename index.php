<?php
session_start();
include_once ('config.php');
?>

<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>Loja Virtual</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">
                    Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?page=login">
                    Faça login
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?page=carrinho">
                    Carrinho
                </a>
            </li>
        </ul>
        <div class="local-e-data">
            <?php
            setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
            date_default_timezone_set('America/Sao_Paulo');
            echo 'Jundiai, ', utf8_encode(strftime('%A, %d de %B de %Y', strtotime('today')));
            ?>
        </div>
    </div>
    </div>
    
</nav>
    
    <div class="container">
        <div class="row">
            <div class="col mt-5">
                <?php
                    include("config.php");
                    switch(@$_REQUEST["page"]){
                        case"login";
                            include("novo-usuario.php");
                            break;
                        case"carrinho";
                            include("carrinho.php");
                            break;
                        case"produto";
                            include("pagina-produto.php");
                            break;
                        default;
                            include("home.php");
                    }
                ?>
            </div>
        </div> 
    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    

</body>
</html>