<h1>Ofertas imperdíveis!</h1>
<div class="vitrine">
<?php
foreach ($items as $id => $valor){
    ?>
    <div class="produto">
        <img src="img/<?=$valor['imagem']?>"/>
        <div class="nome-produto"><?=$valor['nome']?></div>
        <div class="preco-produto">R$ <?=number_format($valor['preco'],2,",",".")?></div>
        <a href="?adicionar=<?=$id?>">Adicionar ao carrinho</a>
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
