<?php
session_start();
include("connect.php");

$usuariod = htmlspecialchars($_POST["usuario"]);
$senhad = htmlspecialchars($_POST["senha"]);

if(empty($_POST['usuario']) || empty($_POST['senha'])) {
	header('Location: ../index.php');
	exit();
}

$query = "SELECT * FROM funcionarios WHERE user = '{$usuariod}' and senha = '{$senhad}'";
$query_go = $conn->query($query);

if($query_go->num_rows > 0) {
    $row = $query_go->fetch_assoc();
    
    if ($row['painel'] == '1') {
        // Acesso permitido ao painel
        $_SESSION["usuario"] = $usuariod;
        header("Location: ../dashboard.php");
    } else {
        // Painel = 0, usuário sem acesso
        $_SESSION["sem_acesso"] = "Você não tem acesso ao painel.";
        header("Location: ../index.php");
    }
} else {
    // Usuário ou senha inválidos
    $_SESSION["invalido"] = true;
    header("Location: ../index.php");
    exit();
}
?>
