<?php
session_start();
//session_destroy();
unset($_SESSION['carro']);

header ("Location: ../ver_carrito.php")
?>