<?php
if(isset($_SESSION['usuario']) && $_SESSION['usuario']['logado'] == true) {
    header("Location: index.php");
}

include_once('config.php');
?>
<div>
    <h2>Fazer Login</h2>
    <form action="verifica-login.php" method="post">
        <label for="email"><input type="text" name="email" placeholder="E-mail" required></label>
        <label for="senha"><input type="password" name="senha" placeholder="Senha" required></label>
        <input type="submit" value="Entrar"><a href="?page=cadastro">Criar conta</a>
        <hr>
        <h5>Quero acessar com minhas redes sociais</h5>
        <?="<a href='".$client->createAuthUrl()."' class='login-with-google-btn'>Login com Google</a>"?>
    </form>
</div>