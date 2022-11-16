<?php
if(isset($_GET['adicionar'])){
    $idProduto = (int) $_GET['adicionar'];
    if(isset($_SESSION['listaProdutos'][$idProduto])){
        if(isset($_SESSION['carrinho'][$idProduto])){
            $_SESSION['carrinho'][$idProduto]['quantidade']++;
            $_SESSION['subtotal'] += $_SESSION['carrinho'][$idProduto]['preco'];
            $_SESSION['subtotalAPrazo'] += $_SESSION['carrinho'][$idProduto]['precoAPrazo'];
            echo "<script>
                alert('Item adicionado ao carrinho.');
                window.location = 'index.php';
            </script>";
        }else{
            $_SESSION['carrinho'][$idProduto] = array('quantidade'=>1,'preco'=>$_SESSION['listaProdutos'][$idProduto]['preco'], 'precoAPrazo'=>$_SESSION['listaProdutos'][$idProduto]['precoAPrazo'], 'nome'=>$_SESSION['listaProdutos'][$idProduto]['nome']);
            $_SESSION['subtotal'] += $_SESSION['carrinho'][$idProduto]['preco'];
            $_SESSION['subtotalAPrazo'] += $_SESSION['carrinho'][$idProduto]['precoAPrazo'];
    echo '<script>
        alert("Item adicionado ao carrinho.");
        window.location = "index.php";
    </script>';
        }
    }else{
        die('<script>
            alert("Código do produto inválido.");
            window.location = "index.php";
        </script>');
    }
}