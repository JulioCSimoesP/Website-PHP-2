<?php
if(isset($_SESSION['usuario']) && $_SESSION['usuario']['logado'] == true) {
} else {
    header("Location: index.php");
}?>
<h1>Bem vindo, <?=$_SESSION['usuario']['nome']?></h1>
<section>
    <a href="?page=dados">Meus dados</a>
</section>
<section>
    <a href="?page=alterar">Alterar senha</a>
</section>
<section>
    <a href="?page=aviso">Encerrar conta</a>
</section>