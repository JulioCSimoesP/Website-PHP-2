<h1>Carrinho</h1>
<?php
if(isset($_GET['cupom']) && $_GET['cupom'] != ""){
    include_once('calculo-desconto.php');
}

if(isset($_SESSION['carrinho'])){
    ?>
    <div class="flex-horizontal vitrine-carrinho">
        <div class="container-lista-carrinho">
            <div class="frame-relevo lista-carrinho remove-margin-top">
                <h2>Produtos no carrinho</h2>
                <table>
                    <tr>
                        <th class="cell-min-width1">
                            #ID
                        </th>
                        <th class="cell-min-width4">
                            Nome
                        </th>
                        <th class="texto-centro cell-min-width2">
                            Quantidade
                        </th>
                        <th class="texto-centro cell-min-width3">
                            Preço /un.
                        </th>
                    </tr>
                    <?php
                    foreach ($_SESSION['carrinho'] as $indice => $conteudo){
                        ?>
                    <tr>
                        <td class="cell-min-width1">
                            <?=$indice;?>
                        </td>
                        <td class="cell-min-width4">
                            <?=$conteudo['nome'];?>
                        </td>
                        <td class="texto-centro cell-min-width2">
                            <?=$conteudo['quantidade'];?>
                        </td>
                        <td class="texto-centro cell-min-width3">
                            R$ <?=number_format($conteudo['preco'],2,",",".");?>
                        </td>
                    </tr>
                    <?php }
                    ?>
                    <tr>
                        <td colspan="3" class="tabela-subtotal borda-fundo-solido">
                            Subtotal:
                        </td>
                        <td class="borda-fundo-solido texto-centro">
                            R$ <?=number_format($_SESSION['subtotal'],2,",",".");?>
                        </td>
                    </tr>
                    <?php
                    if(isset($_SESSION['cupom'])){
                        ?>
                        <tr>
                            <th colspan="2" class="borda-fundo-pontilhado">
                                Cupom ativo
                            </th>
                            <th class="borda-fundo-pontilhado texto-centro">
                                Valor
                            </th>
                            <th class="borda-fundo-pontilhado texto-centro">
                                Desconto
                            </th>
                        </tr>
                        <tr>
                            <td colspan="2" class="borda-fundo-solido">
                                <?=$_SESSION['cupom']['nome']?>
                            </td>
                            <td class="borda-fundo-solido texto-centro">
                                <?=$_SESSION['cupom']['desconto']*100?>%
                            </td>
                            <td class="borda-fundo-solido texto-centro">
                                - R$ <?=number_format($_SESSION['subtotal'] * $_SESSION['cupom']['desconto'],2,",",".")?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
            <div class="frame-relevo ">
                <h2>Cupom</h2>
                <form action="index.php" class="form-cupom">
                    <input type="hidden" name="page" value="carrinho"s>
                    <input type="text" name="cupom" placeholder="Digite o seu cupom" class="input-cupom">
                    <input type="submit" value="Aplicar cupom" class="cupom submit-cupom">
                </form>
            </div>
        </div>
        <div class="frame-relevo remove-margin-top resumo">
            <h2>Resumo</h2>
            <p class="margin-top resumo-linha">
                Valor à prazo:<span class="resumo-precos">&nbsp R$ <?=number_format($_SESSION['subtotalAPrazo'],2,",",".")?></span>
            <hr>
            <p class="resumo-linha">Frete:<span class="resumo-precos">R$ 0,00</span></p>
            <hr>
            <p class="resumo-linha">Desconto: <span class="resumo-precos">R$ <?php
                if(isset($_SESSION['cupom'])) {
                    echo number_format($_SESSION['subtotalAPrazo'] * $_SESSION['cupom']['desconto'], 2, ",", ".");
                } else {
                    echo '0,00';
                }
                ?></span>
            </p>
            </p>
            <p class="resumo-linha total-prazo">Total à prazo: <span class="resumo-precos">R$ <?php
                if(isset($_SESSION['cupom'])) {
                    echo number_format($_SESSION['subtotalAPrazo'] - $_SESSION['subtotalAPrazo'] * $_SESSION['cupom']['desconto'], 2, ",", ".");
                } else {
                    echo number_format($_SESSION['subtotalAPrazo'], 2, ",", ".");
                }
                ?></span>
            </p>
            <p class="resumo-linha total-vista">
                Valor a vista: <br>
                <span class="bold valor-vista">R$ <?php
                if(isset($_SESSION['cupom'])) {
                    echo number_format($_SESSION['subtotal'] - $_SESSION['subtotal'] * $_SESSION['cupom']['desconto'], 2, ",", ".");
                } else {
                    echo number_format($_SESSION['subtotal'], 2, ",", ".");
                }
                ?></span><br>
                (Economize: <span class="bold">R$<?php
                if(isset($_SESSION['cupom'])) {
                    echo number_format(($_SESSION['subtotalAPrazo'] - $_SESSION['subtotalAPrazo'] * $_SESSION['cupom']['desconto']) - ($_SESSION['subtotal'] - $_SESSION['subtotal'] * $_SESSION['cupom']['desconto']), 2, ",", ".");
                } else {
                    echo number_format($_SESSION['subtotalAPrazo'] - $_SESSION['subtotal'], 2, ",", ".");
                }
                ?>)</span>
            </p>
            <div class="pagamento-container">
                <button onclick="window.location = 'registrar-pedido.php';" class="pagamento">
                    Ir para o pagamento
                </button>
                <button onclick="window.location = 'index.php';" class="continuar-comprando">
                    Continuar comprando
                </button>
            </div>
        </div>
    </div>
<?php } else {
    echo '<h2 class="texto-centro">Não há nenhum item no carrinho.</h2>';
}
?>
