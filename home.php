<h1>Ofertas imperdíveis!</h1>
<div class="vitrine">
<?php
$xml = simplexml_load_file(__DIR__.'/produtos.xml');

foreach ($xml->produto as $produto){
    $_SESSION['listaProdutos'][(int)$produto->codigo] = ['nome' => (string)$produto->nome, 'preco' => (float)$produto->preco, 'precoAPrazo' => (float)$produto->precoAPrazo];
    ?>
    <div class="produto">
        <a href="?page=produto&codigo=<?=$produto->codigo?>"><img src="img/<?=$produto->imagem?>" title="<?=$produto->nome?>" alt="<?=$produto->nome?>"/></a>
        <a href="?page=produto&codigo=<?=$produto->codigo?>" class="link-produto"><div class="nome-produto" title="<?=$produto->nome?>"><?=$produto->nome?></div></a>
        <div class="preco-produto">R$ <?=number_format((float)$produto->preco,2,",",".")?></div>
        <a href="?adicionar=<?=$produto->codigo?>" class="link-adicionar">Adicionar ao carrinho</a>
    </div>
    <?php
}?>
</div>

<?php
require_once('adicionar-produto.php');
?>
