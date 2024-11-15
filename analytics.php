<?php 
include 'faterzin/verificar_login.php';
$activePage = 'analytics';
include './includes/sidebar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="css/equipe.css">
    <title><?php echo$titulo_site ?> - Admin</title>
    <link rel="shortcut icon" href="<?php echo$imagem_site ?>" type="image/x-icon" />
</head>


<body>
    <main>
        <div class="recent-orders">
            <h2>Em breve..</h2>
        </div>
    </main>
</body>


<?php include './includes/adminbar.php'; ?>
<script src="../js/equipe.js"></script>
<script src="../js/darkmode.js"></script>
</html>