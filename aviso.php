<?php
if(isset($_SESSION['usuario']) && $_SESSION['usuario']['logado'] == true) {
} else {
    header("Location: index.php");
}?>
<h1>Atenção!</h1>
<section>
    <p>Ao encerrar sua conta, você não poderá mais utilizá-la para fazer login e todos os dados dos pedidos que você realizou com ela serão perdidos.</p>
    <br>
    <p>Se você realmente deseja encerrar sua conta, digite sua senha e clique em "Encerrar".</p>
    <form action="deletar-usuario.php" method="post">
        <input type="password" name="senha" placeholder="Digite sua senha">
        <input type="submit" value="Encerrar">
        <a href="?page=conta">Voltar</a>
    </form>
</section>
