<?php
session_start();
unset($_SESSION['cupom']);
if(isset($_SESSION['auxiliar'])){
    header('location: index.php?page=carrinho&cupom=' . $_SESSION['auxiliar']);
} else {
    header('location: index.php?page=carrinho');
}