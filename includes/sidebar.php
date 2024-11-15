
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="css/equipe.css">
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
        <a href="../dashboard.php" class="<?= $activePage == 'dashboard' ? 'active' : '' ?>">
            <span class="material-icons-sharp">
                dashboard
            </span>
            <h3>Dashboard</h3>
        </a>
        <a href="../equipe.php" class="<?= $activePage == 'equipe' ? 'active' : '' ?>">
            <span class="material-icons-sharp">
                person_outline
            </span>
            <h3>Equipe</h3>
        </a>
        <a href="../vendas.php" class="<?= $activePage == 'vendas' ? 'active' : '' ?>">
            <span class="material-icons-sharp">
                receipt_long
            </span>
            <h3>Vendas</h3>
        </a>
        <a href="../analytics.php" class="<?= $activePage == 'analytics' ? 'active' : '' ?>">
            <span class="material-icons-sharp">
                insights
            </span>
            <h3>Analytics</h3>
        </a>
        <a href="../tickets.php" class="<?= $activePage == 'tickets' ? 'active' : '' ?>">
            <span class="material-icons-sharp">
                mail_outline
            </span>
            <h3>Tickets</h3>
            <span class="message-count">27</span>
        </a>
        <a href="../produtos.php" class="<?= $activePage == 'produtos' ? 'active' : '' ?>">
            <span class="material-icons-sharp">
                shopping_cart
            </span>
            <h3>Produtos</h3>
        </a>
        <a href="../clientes.php" class="<?= $activePage == 'clientes' ? 'active' : '' ?>">
            <span class="material-icons-sharp">
                add
            </span>
            <h3>Clientes</h3>
        </a>
        <a href="../configuracoes.php" class="<?= $activePage == 'configuracoes' ? 'active' : '' ?>">
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
</body>
</html>