<?php
if(isset($_SESSION['usuario']) && $_SESSION['usuario']['logado'] == true) {
} else {
    header("Location: index.php");
}?>
<h1>Bem vindo, <?=$_SESSION['usuario']['nome']?></h1>
<div class="vitrine-carrinho">
    <a href="?page=dados" class="no-deco">
        <section class="frame-relevo link-conta">
            <p class="margin-bottom-reset">Meus dados</p>
        </section>
    </a>
    <a href="?page=alterar" class="no-deco">
        <section class="frame-relevo link-conta">
            <p class="margin-bottom-reset">Alterar senha</p>
        </section>
    </a>
    <a href="?page=aviso" class="no-deco">
        <section class="frame-relevo link-conta">
            <p class="margin-bottom-reset">Encerrar conta</p>
        </section>
    </a>
</div>