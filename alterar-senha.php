<?php
session_start();
include_once("config.php");

if(isset($_SESSION['usuario']) && $_SESSION['usuario']['logado'] == true) {
    if(isset($_POST['senhaAtual']) && isset($_POST['senhaNova']) && isset($_POST['confirma'])) {
        if($_POST['senhaAtual'] != $_POST['senhaNova']) {
            if ($_POST['senhaNova'] == $_POST['confirma']) {
                $email = $_SESSION['usuario']['email'];
                $senha = $_POST['senhaAtual'];
                $senhaNova = $_POST['senhaNova'];
                $sql1 = "SELECT * FROM usuarios 
                        WHERE email = '$email' and senha = '$senha'";
                $sql2 = "UPDATE usuarios 
                        SET senha='$senhaNova'
                        WHERE email = '$email' and senha = '$senha'";

                if (mysqli_num_rows(mysqli_query($conexao, $sql1)) < 1) {
                    mysqli_close($conexao);
                    echo '<script>
                        alert("Senha incorreta.");
                        window.location = "index.php?page=alterar";
                    </script>';
                } else {
                    $dadosUsuario = mysqli_fetch_array(mysqli_query($conexao, $sql1));
                    if($dadosUsuario['google'] == 1) {
                        $sql2 = "UPDATE usuarios 
                        SET senha='$senhaNova',google=0
                        WHERE email = '$email' and senha = '$senha'";
                    }

                    mysqli_query($conexao, $sql2);
                    mysqli_close($conexao);
                    echo '<script>
                        alert("Senha alterada com sucesso.");
                        window.location = "index.php?page=conta";
                    </script>';
                }
            } else {
                echo '<script>
                    alert("Confirmação incompatível.");
                    window.location = "index.php?page=alterar";
                </script>';
            }
        } else {
            echo '<script>
                alert("A senha nova deve ser diferente da senha atual.");
                window.location = "index.php?page=alterar";
            </script>';
        }
    } else {
        header("Location: index.php?page=conta");
    }
} else {
    header("Location: index.php");
}?>