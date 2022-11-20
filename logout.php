<?php
session_start();
if(isset($_SESSION['usuario']) && $_SESSION['usuario']['logado'] == true) {
    session_destroy();
    header("Location: index.php");
} else {
    header("Location: index.php");
}