<?php
session_start();
include_once('config.php');

if(isset($_SESSION['usuario']) && $_SESSION['usuario']['logado'] == true) {
    header("Location: index.php");
}

if(isset($_POST['email']) && isset($_POST['senha'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios 
            WHERE email = '$email' and senha = '$senha'";

    if(mysqli_num_rows(mysqli_query($conexao, $sql)) < 1) {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        mysqli_close($conexao);
        echo '<script>
            alert("Login e/ou Senha inválido(s).");
            window.location = "index.php?page=login";
        </script>';
    } else {
        $dadosUsuario = mysqli_fetch_array(mysqli_query($conexao, $sql));

        $_SESSION['usuario']['nome'] = $dadosUsuario['nome'];
        $_SESSION['usuario']['logado'] = true;
        $_SESSION['usuario']['email'] = $email;
        mysqli_close($conexao);
        header('Location: index.php');
    }
} else {
    header('Location: index.php?page=login');
}