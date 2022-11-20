<?php
session_start();
include_once('config.php');

if(isset($_SESSION['usuario']) && $_SESSION['usuario']['logado'] == true) {
    header("Location: index.php");
}

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();
    $userinfo = [
        'email' => $google_account_info['email'],
        'nome' => $google_account_info['givenName'],
        'id' => $google_account_info['id']
    ];

    $sql = "SELECT * FROM usuarios
            WHERE email = '{$userinfo['email']}' and token = '{$userinfo['id']}'";
    $result = mysqli_query($conexao, $sql);

    if(mysqli_num_rows($result) > 0) {
        $_SESSION['usuario']['nome'] = $userinfo['nome'];
        $_SESSION['usuario']['logado'] = true;
        $_SESSION['usuario']['email'] = $userinfo['email'];
        mysqli_close($conexao);
        echo '<script>
                window.location = "index.php";
            </script>';
    } else {
        $sql = "SELECT * FROM usuarios
            WHERE email = '{$userinfo['email']}'";
        $result = mysqli_query($conexao, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo '<script>
                    alert("Já existe um usuário cadastrado com este e-mail.");
                    window.location = "index.php?page=login";
                </script>';
        } else {
            $senha = substr(str_shuffle(strtolower(sha1(rand() . time() . "my salt string"))), 0, 64);
            $sql = "INSERT INTO usuarios
            (nome,senha,email,google,token) 
            VALUES 
            ('{$userinfo['nome']}','$senha','{$userinfo['email']}',1,'{$userinfo['id']}')";
            $result = mysqli_query($conexao, $sql);

            if ($result) {
                $_SESSION['usuario']['nome'] = $userinfo['nome'];
                $_SESSION['usuario']['logado'] = true;
                $_SESSION['usuario']['email'] = $userinfo['email'];
                mysqli_close($conexao);
                echo '<script>
                    alert("O usuário foi cadastrado com sucesso.");
                    window.location = "index.php";
                </script>';
            } else {
                mysqli_close($conexao);
                echo '<script>
                    alert("Ocorreu um erro.");
                    window.location = "index.php?page=login";
                </script>';
            }
        }
    }
}