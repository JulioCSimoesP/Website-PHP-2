<?php
if(isset($_SESSION['usuario']) && $_SESSION['usuario']['logado'] == true) {
} else {
    header("Location: index.php");
}

include_once('config.php');

$emailBusca = $_SESSION['usuario']['email'];
$sql = "SELECT * FROM usuarios 
        WHERE email = '$emailBusca'";
$dadosUsuario = mysqli_fetch_array(mysqli_query($conexao, $sql));

$google = $dadosUsuario['google'];
if($google == 1) {
    $senhaGoogle = $dadosUsuario['senha'];
}
?>
<h1>Alterar senha</h1>
<section class="frame-relevo frame-aviso frame-senha">
    <p>Preencha os campos abaixo para realizar a alteração da sua senha</p>
    <form action="alterar-senha.php" method="post">
        <input type="password" class="input-senha" name="senhaAtual" placeholder="Digite sua senha atual" <?php if($google == 1){echo "value='$senhaGoogle'";}?> required><br>
        <input type="password" class="input-senha" name="senhaNova" placeholder="Digite sua senha nova" required><br>
        <input type="password" class="input-senha" name="confirma" placeholder="Confirme sua senha nova" required><br>
        <input type="submit" value="Salvar" class="botao-voltar margin-top2">
    </form>
</section>