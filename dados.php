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

$nome = $dadosUsuario['nome'];
$sobrenome = $dadosUsuario['sobrenome'];
$email = $dadosUsuario['email'];
$telefone = $dadosUsuario['telefone'];
$sexo = $dadosUsuario['sexo'];
$nascimento = $dadosUsuario['nascimento'];
$cidade = $dadosUsuario['cidade'];
$estado = $dadosUsuario['estado'];
$endereco = $dadosUsuario['endereco'];
?>

<h1>Dados básicos</h1>
<section>
    <form action="atualizar-dados.php" method="post">
        <label for="nome" class="labelInput">Nome<input type="text" name="nome" id="nome" class="inputUser" value="<?=$nome?>" required></label><br>
        <label for="sobrenome" class="labelInput">Sobrenome<input type="text" name="sobrenome" id="nome" class="inputUser" value="<?=$sobrenome?>" required></label><br>
        <label for="email" class="labelInput">Email<input type="text" name="email" id="email" class="inputUser" value="<?=$email?>" disabled required></label><br>
        <label for="telefone" class="labelInput">Telefone<input type="tel" name="telefone" id="telefone" class="inputUser" value="<?=$telefone?>" required></label><br>
        <p>Sexo:</p>
        <label for="feminino"><input type="radio" id="feminino" name="sexo" value="feminino" <?php if($sexo == 'feminino'){echo 'checked';}?> required>Feminino</label><br>
        <label for="masculino"><input type="radio" id="masculino" name="sexo" value="masculino" <?php if($sexo == 'masculino'){echo 'checked';}?> required>Masculino</label><br>
        <label for="outro"><input type="radio" id="outro" name="sexo" value="outro" <?php if($sexo == 'outro'){echo 'checked';}?> required>Outro</label><br>
        <label for="nascimento">Data de Nascimento:<input type="date" name="nascimento" id="nascimento" value="<?=$nascimento?>" required></label><br>
        <label for="cidade" class="labelInput">Cidade<input type="text" name="cidade" id="cidade" class="inputUser" value="<?=$cidade?>" required></label><br>
        <label for="estado" class="labelInput">Estado<input type="text" name="estado" id="estado" class="inputUser" value="<?=$estado?>" required></label><br>
        <label for="endereco" class="labelInput">Endereço<input type="text" name="endereco" id="endereco" class="inputUser" value="<?=$endereco?>" required></label><br>
        <input type="submit" name="submit" id="submit" value="Salvar">
    </form>
</section>
<?php
mysqli_close($conexao);