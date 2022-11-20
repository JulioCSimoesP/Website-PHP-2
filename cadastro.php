<?php
if(isset($_SESSION['usuario']) && $_SESSION['usuario']['logado'] == true) {
    header("Location: index.php");
}
?>
<div>
    <form action="registrar-usuario.php" method="post">
        <label for="nome" class="labelInput">Nome<input type="text" name="nome" id="nome" class="inputUser" required></label><br>
        <label for="sobrenome" class="labelInput">Sobrenome<input type="text" name="sobrenome" id="nome" class="inputUser" required></label><br>
        <label for="senha" class="labelInput">Senha<input type="password" name="senha" id="senha" class="inputUser" required></label><br>
        <label for="email" class="labelInput">Email<input type="text" name="email" id="email" class="inputUser" required></label><br>
        <label for="telefone" class="labelInput">Telefone<input type="tel" name="telefone" id="telefone" class="inputUser" required></label><br>
        <p>Sexo:</p>
        <label for="feminino"><input type="radio" id="feminino" name="sexo" value="feminino" required>Feminino</label><br>
        <label for="masculino"><input type="radio" id="masculino" name="sexo" value="masculino" required>Masculino</label><br>
        <label for="outro"><input type="radio" id="outro" name="sexo" value="outro" required>Outro</label><br>
        <label for="nascimento">Data de Nascimento:<input type="date" name="nascimento" id="nascimento" required></label><br>
        <label for="cidade" class="labelInput">Cidade<input type="text" name="cidade" id="cidade" class="inputUser" required></label><br>
        <label for="estado" class="labelInput">Estado<input type="text" name="estado" id="estado" class="inputUser" required></label><br>
        <label for="endereco" class="labelInput">Endereço<input type="text" name="endereco" id="endereco" class="inputUser" required></label><br>
        <input type="submit" name="submit" id="submit" value="Enviar">
    </form>
</div>