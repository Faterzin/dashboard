<?php
include("connect.php");
 if(!isset($_SESSION)) 
 { 
     session_start(); 
 } $usuarioaaa = $_SESSION['usuario'];

if(!$_SESSION['usuario']) {
	header('Location: ../index.php');
	echo "Faça login para visualizar esta página.";
	echo"<script language='javascript' type='text/javascript'>alert('Faça login para visualizar esta página! \n Redirecionando ao painel principal...');window.location.href='../index.php';</script>";

	exit();
}




$sqlaaaaaa = "SELECT painel FROM funcionarios WHERE user = '$usuarioaaa'";
$resultaaaa = $conn->query($sqlaaaaaa);

if ($resultaaaa->num_rows > 0) {
    // Obter o valor da coluna 'painel'
    $row = $resultaaaa->fetch_assoc();
    if ($row['painel'] == 1) {
    } else {
        // Redirecionar caso o valor de 'painel' não seja 1
        echo "<script language='javascript' type='text/javascript'>alert('Você não tem permissão para acessar esta página.');window.location.href='../index.php';</script>";
        exit();
    }
} else {
    // Se não encontrar o usuário
    echo "<script language='javascript' type='text/javascript'>alert('Usuário não encontrado!');window.location.href='../index.php';</script>";
    exit();
}




$theme = 'light'; // Tema padrão
if(isset($_COOKIE['theme'])) {
    $theme = $_COOKIE['theme'];
}


?>