<?php
if(isset($_SESSION['usuario']) && $_SESSION['usuario']['logado'] == true) {
    header("Location: index.php");
}
?>
<section class="frame-relevo frame-aviso container-cadastro">
    <h2 class="mini-titulo">Criar conta</h2>
    <form action="registrar-usuario.php" method="post" class="form-cadastro">
        <div class="form-row">
            <label for="nome" class="labelInput">Nome: <br><input type="text" name="nome" id="nome" class="inputUser" required></label>
            <label for="sobrenome" class="labelInput">Sobrenome: <br><input type="text" name="sobrenome" id="nome" class="inputUser" required></label>
        </div>
        <div class="form-row">
            <label for="email" class="labelInput" id="email">Email: <br><input type="text" name="email" id="email" class="inputUser" required></label>
        </div>
        <div class="form-row">
            <label for="senha" class="labelInput">Senha <br><input type="password" name="senha" id="senha" class="inputUser" required></label>
            <label for="nascimento">Data de Nascimento: <br><input type="date" name="nascimento" id="nascimento" required></label>
        </div>
        <div class="form-row form-radio"><div>Sexo: </div>
            <div class="form-radio-inner">
                <label for="feminino"><input type="radio" id="feminino" name="sexo" class="form-radio-item" value="feminino" required>Feminino</label>
                <label for="masculino"><input type="radio" id="masculino" name="sexo" class="form-radio-item" value="masculino" required>Masculino</label>
                <label for="outro"><input type="radio" id="outro" name="sexo" class="form-radio-item" value="outro" required>Outro</label>
            </div>
        </div>
        <div class="form-row">
            <label for="cidade" class="labelInput">Cidade: <br><input type="text" name="cidade" id="cidade" class="inputUser" required></label>
            <label for="estado" class="labelInput">Estado: <br><input type="text" name="estado" id="estado" class="inputUser" required></label>
        </div>
        <div class="form-row">
            <label for="endereco" class="labelInput">Endereço: <br><input type="text" name="endereco" id="endereco" class="inputUser" required></label>
            <label for="telefone" class="labelInput">Telefone: <br><input type="tel" name="telefone" id="telefone" class="inputUser" required></label>
        </div>
        <input type="submit" name="submit" id="submit" value="Enviar" class="botao-voltar margin-top2">
    </form>
</section>