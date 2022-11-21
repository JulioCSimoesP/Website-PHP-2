<?php
session_start();
include_once('config.php');

if(isset($_SESSION['usuario']) && $_SESSION['usuario']['logado'] == true) {
    if(isset($_POST['nome']) || isset($_POST['sobrenome']) || isset($_POST['telefone']) || isset($_POST['sexo']) || isset($_POST['nascimento']) || isset($_POST['cidade']) || isset($_POST['estado']) || isset($_POST['endereco'])) {
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $email = $_SESSION['usuario']['email'];
        $telefone = $_POST['telefone'];
        $sexo = $_POST['sexo'];
        $nascimento = $_POST['nascimento'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $endereco = $_POST['endereco'];

        $_SESSION['usuario']['nome'] = $nome;

        $sql = "UPDATE usuarios 
        SET nome='$nome',telefone='$telefone',sexo='$sexo',nascimento='$nascimento',cidade='$cidade',estado='$estado',endereco='$endereco'
        WHERE email = '$email'";

        mysqli_query($conexao, $sql);
        mysqli_close($conexao);
        echo '<script>
            alert("Dados alterados com sucesso.");
            window.location = "index.php?page=conta";
        </script>';
    } else {
        header("Location: index.php?page=conta");
    }
} else {
    header("Location: index.php");
}
