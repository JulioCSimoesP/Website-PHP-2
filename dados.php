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
<section class="frame-relevo frame-aviso container-cadastro">
    <form action="atualizar-dados.php" method="post" class="form-cadastro">
        <div class="form-row">
            <label for="nome" class="labelInput">Nome: <br><input type="text" name="nome" id="nome" class="inputUser" value="<?=$nome?>" required></label>
            <label for="sobrenome" class="labelInput">Sobrenome: <br><input type="text" name="sobrenome" id="nome" class="inputUser" value="<?=$sobrenome?>"></label>
        </div>
        <div class="form-row">
            <label for="email" class="labelInput">Email: <br><input type="text" name="email" id="email" class="inputUser" value="<?=$email?>" disabled></label>
            <label for="nascimento">Data de Nascimento: <br><input type="date" name="nascimento" id="nascimento" value="<?=$nascimento?>"></label>
        </div>
        <div class="form-row form-radio"><div>Sexo: </div>
            <div class="form-radio-inner">
                <label for="feminino"><input type="radio" id="feminino" name="sexo" class="form-radio-item" value="feminino" <?php if($sexo == 'feminino'){echo 'checked';}?>>Feminino</label>
                <label for="masculino"><input type="radio" id="masculino" name="sexo" class="form-radio-item" value="masculino" <?php if($sexo == 'masculino'){echo 'checked';}?>>Masculino</label>
                <label for="outro"><input type="radio" id="outro" name="sexo" class="form-radio-item" value="outro" <?php if($sexo == 'outro'){echo 'checked';}?>>Outro</label>
            </div>
        </div>
        <div class="form-row">
            <label for="cidade" class="labelInput">Cidade: <br><input type="text" name="cidade" id="cidade" class="inputUser" value="<?=$cidade?>"></label>
            <label for="estado" class="labelInput">Estado: <br><input type="text" name="estado" id="estado" class="inputUser" value="<?=$estado?>"></label>
        </div>
        <div class="form-row">
            <label for="endereco" class="labelInput">Endereço: <br><input type="text" name="endereco" id="endereco" class="inputUser" value="<?=$endereco?>"></label>
            <label for="telefone" class="labelInput">Telefone: <br><input type="tel" name="telefone" id="telefone" class="inputUser" value="<?=$telefone?>"></label>
        </div>
        <input type="submit" name="submit" id="submit" value="Salvar" class="botao-voltar margin-top2">
    </form>
</section>
<?php
mysqli_close($conexao);