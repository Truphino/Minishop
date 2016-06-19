<?php
session_start();
unset($_SESSION['login']);
unset($_SESSION['categorie']);
header('Location: index.php')
?>
