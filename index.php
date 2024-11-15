<?php 
include("faterzin/connect.php");
echo "<div style='display: none;'>";
if($_SESSION["usuario"]) {
    header('Location: dashboard.php');
}
else {
}
echo "</div>";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo$titulo_site ?> - Login Admin</title>
    <link rel="shortcut icon" href="<?php echo$imagem_site ?>" type="image/x-icon" />
    <link rel="stylesheet" href="css/loginstyles.css">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <h2>Administração</h2>
            <form action="faterzin/adminlogin.php" method="post">
                <div class="textbox">
                    <input type="text" placeholder="Username" name="usuario" required>
                </div>
                <div class="textbox">
                    <input type="password" placeholder="Password" name="senha" required>
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
