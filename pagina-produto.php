<?php
$xml = simplexml_load_file(__DIR__.'/produtos.xml');

if(isset($_GET['codigo']) && $_GET['codigo'] == (int)$_GET['codigo']) {
    if(isset($_SESSION['listaProdutos'][(int)$_GET['codigo']])) {
        foreach ($xml->produto as $produto){
            if($_GET['codigo'] == $produto->codigo){
?>
                <div class="cabecalho-produto">
                    <div class="imagem-produto">
                        <img src="img/<?=$produto->imagem?>" class="fonte-imagem-produto"/>
                    </div>
                    <div class="compra-produto">
                        <h3><?=$produto->nome?></h3>
                        <div class="dados-avista">
                            <p class="margin-reset">De: <span class="rasura">R$ <?=number_format((float)$produto->preco/0.85,2,",",".")?></span> por:</p>
                            <p class="main-preco margin-reset">R$ <?=number_format((float)$produto->preco,2,",",".")?></p>
                            <p class="margin-reset dados-pagamento">à vista com 15% de desconto no boleto ou pix</p>
                        </div>
                        <div class="dados-avista">
                            <p>
                                <span class="sub-preco cor-sub-preco">R$ <?=number_format((float)$produto->preco/0.93,2,",",".")?></span><br>
                                <span class="dados-pagamento"><span class="cor-sub-preco">12x</span> de <span class="cor-sub-preco">R$ <?=number_format((float)$produto->preco*0.93/12,2,",",".")?></span> sem juros no cartão</span><br>
                                <span class="dados-pagamento">ou em 1x com 7% de desconto</span><br>
                                <span class="dados-pagamento">ou em até 3x com 5% de desconto</span><br>
                                <span class="dados-pagamento">ou de 4x a 12x sem juros</span>
                            </p>
                        </div>
                        <a href="?adicionar=<?=$produto->codigo?>" class="link-adicionar">Adicionar ao carrinho</a>
                    </div>
                </div>
                <div class="dados-produto">
                    <h3>Descrição</h3><br>
                    <p><?=$produto->descricao?></p>
                </div>
                <div class="dados-produto">
                    <h3>Especificações</h3><br>
                    <p class="pre-wrap"><?=$produto->especificacoes?></p>
                </div>
<?php
                break;
            }
        }
    } else {
        echo "<h2 class='aviso'>Código de produto inexistente.</h2>";
    }
} else {
    echo "<h2 class='aviso'>Não foi possível carregar a página do produto.</h2>";
}
?>