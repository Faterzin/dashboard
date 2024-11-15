<?php 
include("../faterzin/verificar_login.php");
$theme = 'light'; // Tema padrão
if(isset($_COOKIE['theme'])) {
    $theme = $_COOKIE['theme'];
}

$productId = $_GET['productId'];

$query = "SELECT * FROM produtos WHERE id = $productId";
$result = mysqli_query($conn, $query);  
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="../css/equipe.css">
    <title><?php echo$titulo_site ?> - Admin</title>
    <link rel="shortcut icon" href="<?php echo$imagem_site ?>" type="image/x-icon" />
</head>

<body>

    <div class="container">
        <aside>
            <div class="toggle">
                <div class="logo">
                    <img src="../images/bolinha.png">
                    <h2>Use<span class="danger">Únnica</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">
                <a href="../dashboard.php">
                    <span class="material-icons-sharp">
                        dashboard
                    </span>
                    <h3>Dashboard</h3>
                </a>
                <a href="../equipe.php">
                    <span class="material-icons-sharp">
                        person_outline
                    </span>
                    <h3>Equipe</h3>
                </a>
                <a href="../vendas.php">
                    <span class="material-icons-sharp">
                        receipt_long
                    </span>
                    <h3>Vendas</h3>
                </a>
                <a href="../analytics.php">
                    <span class="material-icons-sharp">
                        insights
                    </span>
                    <h3>Analytics</h3>
                </a>
                <a href="../tickets.php">
                    <span class="material-icons-sharp">
                        mail_outline
                    </span>
                    <h3>Tickets</h3>
                    <span class="message-count">27</span>
                </a>
                <a href="../produtos.php" class="active">
                    <span class="material-icons-sharp">
                        shopping_cart
                    </span>
                    <h3>Produtos</h3>
                </a>
                <!--<a href="#">
                    <span class="material-icons-sharp">
                        report_gmailerrorred
                    </span>
                    <h3>Reports</h3>
                </a>-->
                <a href="../clientes.php">
                    <span class="material-icons-sharp">
                        add
                    </span>
                    <h3>Clientes</h3>
                </a>
                <a href="../configuracoes.php">
                    <span class="material-icons-sharp">
                        settings
                    </span>
                    <h3>Settings</h3>
                </a>
                <a href="../faterzin/logout.php">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>
        <main>
            <div class="recent-orders">
                <h2><?php echo $productId ?></h2>
            </div>
            <div>
                <p>ID do Cliente: <?php echo $clientId ?></p>
                <p>Nome do Cliente: <?php echo $clientName ?></p>
                <p>ID do Vendedor: <?php echo $vendedorId ?></p>
                <p>Nome do Vendedor: <?php echo $vendedorName ?></p>
            </div>
        </main>
        <div class="right-section">
            <div class="nav">
                <button id="menu-btn">
                    <span class="material-icons-sharp">
                        menu
                    </span>
                </button>
                <div class="dark-mode">
                    <span class="material-icons-sharp active">
                        light_mode
                    </span>
                    <span class="material-icons-sharp">
                        dark_mode
                    </span>
                </div>

                <div class="profile">
                    <div class="info">
                        <p>Hey, <b><?php echo $_SESSION['usuario'] ?></b></p>
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class="profile-photo">
                        <img src="../images/profile-1.jpg">
                    </div>
                </div>
            </div>
    </div>
</body>
<script src="../js/darkmode.js"></script>
</html>