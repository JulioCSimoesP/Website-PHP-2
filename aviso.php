<?php
if(isset($_SESSION['usuario']) && $_SESSION['usuario']['logado'] == true) {
} else {
    header("Location: index.php");
}?>
<h1 class="red">Atenção!</h1>
<section class="frame-relevo red frame-aviso">
    <p class="texto-aviso"><b>Ao encerrar sua conta, você não poderá mais utilizá-la para fazer login e todos os dados dos pedidos que você realizou com ela serão perdidos.</b></p>
    <p class="texto-aviso margin-bottom-reset"><b>Se você realmente deseja encerrar sua conta, digite sua senha e clique em "Encerrar".</b></p>
    <form action="deletar-usuario.php" method="post" class="form-aviso">
        <input type="password" name="senha" placeholder="Digite sua senha" id="senha-aviso">
        <div class="botoes-aviso">
            <input type="submit" value="Encerrar" class="botao-encerrar">
            <a href="?page=conta" class="botao-voltar">Voltar</a>
        </div>
    </form>
</section>
