<?php
$json = file_get_contents('cupons.json');
$conteudoJson = json_decode($json, true);

$cupomEncontrado = false;
foreach ($conteudoJson as $cupom) {
    if($cupom['codigo'] == $_GET['cupom']){
        $cupomEncontrado = true;
        if($cupom['validade'] >= date('d-m-Y')){
            if(!isset($_SESSION['cupom']['ativo']) || !$_SESSION['cupom']['ativo']) {
                $_SESSION['cupom']['ativo'] = true;
                $_SESSION['cupom']['nome'] = $cupom['codigo'];
                $_SESSION['cupom']['desconto'] = $cupom['desconto'];
                unset($_SESSION['auxiliar']);
                header('location: index.php?page=carrinho');
            } else {
                $_SESSION['auxiliar'] = $_GET['cupom'];
                echo "<script>
                    if(confirm('Você só pode utilizar um cupom por vez. Deseja substituir o cupom atual?')){
                        window.location = 'reseta-cupom.php';
                    } else {
                        window.location = 'index.php?page=carrinho';
                    }
                </script>";
            }
        } else {
            echo '<script>
                alert("Cupom expirado.");
                window.location = "index.php?page=carrinho";
            </script>';
        }
    }
}
if(!$cupomEncontrado){
    echo '<script>
    alert("Cupom inválido.");
    window.location = "index.php?page=carrinho";
    </script>';
}