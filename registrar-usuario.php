<?php
    session_start();
    $arquivoCadastro = 'cadastro-de-usuarios.txt';
    $fo = fopen($arquivoCadastro, 'a+');
    if($arquivoCadastro ==false){
        die("Não é possível cadastrar o usuário.");
    }
    $cadastro = "Novo cadastro".PHP_EOL;
    if(isset($_POST['nome'])){
        $nomeUsuario = $_POST['nome'];
    }
    if(isset($_POST['email'])){
        $emailUsuario = $_POST['email'];
    }
    if(isset($_POST['senha'])){
        $senhaUsuario = $_POST['senha'];
    }
    if(isset($_POST['data_nasc'])){
        $dataUsuario = $_POST['data_nasc'];
    }
    $cadastro .= "Nome: ".$nomeUsuario.PHP_EOL."Email: ".$emailUsuario.PHP_EOL."Senha: ".$senhaUsuario.PHP_EOL."Data de nascimento: ".$dataUsuario.PHP_EOL.PHP_EOL;
    fwrite($fo, $cadastro);
    fclose($fo);
    ?>
<script>
    window.location = "index.php";
</script>