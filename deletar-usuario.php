<?php
session_start();
include_once('config.php');

if(isset($_SESSION['usuario']) && $_SESSION['usuario']['logado'] == true) {
    if(isset($_POST['senha'])) {
        $email = $_SESSION['usuario']['email'];
        $senha = $_POST['senha'];
        $sql1 = "SELECT * FROM usuarios 
                WHERE email = '$email' and senha = '$senha'";
        $sql2 = "DELETE FROM usuarios 
                WHERE email = '$email' and senha = '$senha'";

        if (mysqli_num_rows(mysqli_query($conexao, $sql1)) < 1) {
            mysqli_close($conexao);
            echo '<script>
                alert("Senha incorreta.");
                window.location = "index.php?page=conta";
            </script>';
        } else {
            mysqli_query($conexao, $sql2);
            mysqli_close($conexao);
            session_destroy();
            echo '<script>
                alert("Conta encerrada com sucesso.");
                window.location = "index.php";
            </script>';
        }
    } else {
        header("Location: index.php?page=conta");
    }
} else {
    header("Location: index.php");
}