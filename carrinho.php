<h1>Carrinho</h1>
<?php
if(isset($_SESSION['carrinho'])){
    ?>
    <table>
        <tr>
            <th>
                #ID do produto
            </th>
            <th>
                Nome
            </th>
            <th>
                Quantidade
            </th>
            <th>
                Preço unitário
            </th>
        </tr>
        <?php
        foreach ($_SESSION['carrinho'] as $indice => $conteudo){
            ?>
        <tr>
            <td>
                <?=$indice;?>
            </td>
            <td>
                <?=$conteudo['nome'];?>
            </td>
            <td>
                <?=$conteudo['quantidade'];?>
            </td>
            <td>
                R$ <?=number_format($conteudo['preco'],2,",",".");?>
            </td>
        </tr>
        <?php }
        ?>
        <tr>
            <td colspan="3" class="tabela-subtotal borda-fundo-solido">
                Subtotal:
            </td>
            <td class="borda-fundo-solido">
                R$ <?=number_format($_SESSION['subtotal'],2,",",".");?>
            </td>
        </tr>
    </table>
    <div class="pagamento-container">
        <button onclick="window.location = 'registrar-pedido.php';" class="pagamento">
            Ir para o pagamento
        </button>
    </div>
<?php } else {
    echo '<h2 class="aviso">Não há nenhum item no carrinho.</h2>';
}
?>
