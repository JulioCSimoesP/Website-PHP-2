<?php
    session_start();
    $arquivoPedido = 'lista-de-pedidos.txt';
    $fo = fopen($arquivoPedido, 'a+');
    if($arquivoPedido ==false){
        die("Não é possível registrar o pedido.");
    }
    $pedido = "Pedido:".PHP_EOL;
    foreach ($_SESSION['carrinho'] as $indice => $conteudo){
        $pedido .= $conteudo['quantidade']." x ".$conteudo['nome']." - R$ ".number_format($conteudo['preco'],2,",",".").PHP_EOL;
    }
    $pedido .= "Subtotal: ".number_format($_SESSION['subtotal'],2,",",".").PHP_EOL.PHP_EOL;
    fwrite($fo, $pedido);
    fclose($fo);
    session_destroy();
    ?>
<script>
    window.location = "index.php";
</script>
