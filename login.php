<?php
if(isset($_SESSION['usuario']) && $_SESSION['usuario']['logado'] == true) {
    header("Location: index.php");
}

include_once('config.php');
?>
<div class="frame-relevo frame-aviso frame-senha">
    <h2 class="mini-titulo">Fazer Login</h2>
    <form action="verifica-login.php" method="post">
        <label for="email" class="input-login input-login-margin"><input type="text" name="email" placeholder="E-mail" class="input-login" required></label><br>
        <label for="senha" class="input-login input-login-margin"><input type="password" name="senha" placeholder="Senha" class="input-login" required></label><br>
        <div class="botoes-login">
            <input type="submit" value="Entrar" class="botao-login">
            <div class="div-espaco"></div>
            <a href="?page=cadastro" class="botao-login">Criar conta</a>
        </div>
        <hr>
        <h5 class="margin-bottom">Quero acessar com minhas redes sociais</h5>
        <?="<a href='".$client->createAuthUrl()."' class='login-with-google-btn no-deco'>Login com Google</a>"?>
    </form>
</div>