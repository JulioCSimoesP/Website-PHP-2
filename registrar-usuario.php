<?php
session_start();
include_once("config.php");

if(isset($_SESSION['usuario']) && $_SESSION['usuario']['logado'] == true) {
    header("Location: index.php");
}

if (isset($_POST["nome"])) {
    $nome = $_POST["nome"];
} else {
    header("location: index.php?page=cadastro");
}
if (isset($_POST["sobrenome"])) {
    $sobrenome = $_POST["sobrenome"];
} else {
    header("location: index.php?page=cadastro");
}
if (isset($_POST["senha"])) {
    $senha = $_POST["senha"];
} else {
    header("location: index.php?page=cadastro");
}
if (isset($_POST["email"])) {
    $email = $_POST["email"];
} else {
    header("location: index.php?page=cadastro");
}
if (isset($_POST["telefone"])) {
    $telefone = $_POST["telefone"];
} else {
    header("location: index.php?page=cadastro");
}
if (isset($_POST["sexo"])) {
    $sexo = $_POST["sexo"];
} else {
    header("location: index.php?page=cadastro");
}
if (isset($_POST["nascimento"])) {
    $nascimento = $_POST["nascimento"];
} else {
    header("location: index.php?page=cadastro");
}
if (isset($_POST["cidade"])) {
    $cidade = $_POST["cidade"];
} else {
    header("location: index.php?page=cadastro");
}
if (isset($_POST["estado"])) {
    $estado = $_POST["estado"];
} else {
    header("location: index.php?page=cadastro");
}
if (isset($_POST["endereco"])) {
    $endereco = $_POST["endereco"];
} else {
    header("location: index.php?page=cadastro");
}

$sql1 = "SELECT * FROM usuarios 
         WHERE email = '$email'";

$sql2 = "INSERT INTO usuarios
        (nome,sobrenome,senha,email,telefone,sexo,nascimento,cidade,estado,endereco) 
        VALUES 
        ('$nome','$sobrenome','$senha','$email','$telefone','$sexo','$nascimento','$cidade','$estado','$endereco')";

if(mysqli_num_rows(mysqli_query($conexao, $sql1)) < 1){
    mysqli_query($conexao, $sql2);
    mysqli_close($conexao);
    echo '<script>
        alert("Cadastro realizado com sucesso.");
        window.location = "index.php?page=login";
    </script>';
} else {
    mysqli_close($conexao);
    echo '<script>
        alert("O e-mail informado já está em uso.");
        history.back();
    </script>';
}
?>