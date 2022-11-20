<?php
    session_start();
    if(!isset($_SESSION['usuario']) || $_SESSION['usuario']['logado'] != true){
        echo '<script>
            alert("É necessário estar logado para finalizar o pedido.");
            window.location = "index.php?page=login";
        </script>';
        die();
    }
    if(isset($_SESSION['carrinho'])) {
        $arquivoPedido = 'lista-de-pedidos.txt';
        $fo = fopen($arquivoPedido, 'a+');
        if ($arquivoPedido == false) {
            die("Não é possível registrar o pedido.");
        }
        $pedido = "Pedido:" . PHP_EOL;
        foreach ($_SESSION['carrinho'] as $indice => $conteudo) {
            $pedido .= $conteudo['quantidade'] . " x " . $conteudo['nome'] . " - R$ " . number_format($conteudo['preco'], 2, ",", ".") . PHP_EOL;
        }
        $pedido .= "Subtotal: " . number_format($_SESSION['subtotal'], 2, ",", ".") . PHP_EOL . PHP_EOL;
        fwrite($fo, $pedido);
        fclose($fo);
        unset($_SESSION['carrinho']);
        unset($_SESSION['subtotal']);
        unset($_SESSION['subtotalAPrazo']);
        unset($_SESSION['cupom']);
    } else {
        header("Location: index.php");
    }
    ?>
<script>
    window.location = "index.php";
</script>
