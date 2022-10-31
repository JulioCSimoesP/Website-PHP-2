<h1>Ofertas imperdíveis!</h1>
<div class="vitrine">
<?php
$xml = simplexml_load_file(__DIR__.'/produtos.xml');
foreach ($xml->produto as $produto){
    ?>
    <div class="produto">
        <img src="img/<?=$produto->imagem?>" title="<?=$produto->nome?>"/>
        <div class="nome-produto" title="<?=$produto->nome?>"><?=$produto->nome?></div>
        <div class="preco-produto">R$ <?=number_format((float)$produto->preco,2,",",".")?></div>
        <a href="?adicionar=<?=$produto->codigo?>">Adicionar ao carrinho</a>
    </div>
    <?php
}?>
</div>

<?php

if(isset($_GET['adicionar'])){
    $idProduto = (int) $_GET['adicionar'];
    if(isset($items[$idProduto])){
        if(isset($_SESSION['carrinho'][$idProduto])){
            $_SESSION['carrinho'][$idProduto]['quantidade']++;
            $_SESSION['subtotal'] += $_SESSION['carrinho'][$idProduto]['preco'];
            echo '<script>
                alert("Item adicionado ao carrinho.");
                window.location = "index.php";
            </script>';
        }else{
            $_SESSION['carrinho'][$idProduto] = array('quantidade'=>1,'preco'=>$items[$idProduto]['preco'],'nome'=>$items[$idProduto]['nome']);
            $_SESSION['subtotal'] += $_SESSION['carrinho'][$idProduto]['preco'];
            echo '<script>
                alert("Item adicionado ao carrinho.");
                window.location = "index.php";
            </script>';
        }
    }else{
        die('Id do produto inválido.');
    }
}
?>
