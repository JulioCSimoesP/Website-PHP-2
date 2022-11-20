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
<section>
    <p>Preencha os campos abaixo para realizar a alteração da sua senha</p>
    <form action="alterar-senha.php" method="post">
        <label for="senhaAtual">Digite a senha atual: <input type="password" name="senhaAtual" placeholder="Senha atual" <?php if($google == 1){echo "value='$senhaGoogle'";}?> required></label>
        <label for="senhaNova">Digite a senha nova: <input type="password" name="senhaNova" placeholder="Senha nova" required></label>
        <label for="confirma">Confirme a senha nova: <input type="password" name="confirma" placeholder="Confirmação" required></label>
        <input type="submit" value="Salvar">
    </form>
</section>