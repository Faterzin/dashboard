<?php 
define("HOST", "127.0.0.1");
define("USER", "root");
define("PASS", "");
define("DB", "faterzindash");

$conn = mysqli_connect(HOST, USER, PASS, DB) or die("Não é possível conectar-se ao banco de dados.");

$titulo_site = "Unnica";
$imagem_site = "../images/bolinha.png";
?>
