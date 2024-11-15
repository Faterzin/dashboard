<?php 
include("../faterzin/verificar_login.php");
$theme = 'light'; // Tema padrão
if(isset($_COOKIE['theme'])) {
    $theme = $_COOKIE['theme'];
}
$typeform = htmlspecialchars($_GET["type"]);

if (isset($_GET['type']) && $_GET['type'] == 'mercadorias') {
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="../css/forms.css">
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
                <a href="../dashboard.php" class="active">
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
                <a href="../produtos.php">
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

<?php
if (isset($_POST['enviar_destaque'])) {
    $destaque_inferior = $_POST["destaque_inferior"];
    $descricao_inferior = $_POST["desc_inferior"];
    $diadia_inferior = $_POST["dia_inferior"];
    $mesmes_inferior = $_POST["mes_inferior"];
    $anoano_inferior = $_POST["ano_inferior"];
    $hrahra_inferior = $_POST["hra_inferior"];
    $minmin_inferior = $_POST["min_inferior"];
    $destaque_superior = $_POST["destaque_superior"];
    $descricao_superior = $_POST["desc_superior"];
    $diadia_superior = $_POST["dia_superior"];
    $mesmes_superior = $_POST["mes_superior"];
    $anoano_superior = $_POST["ano_superior"];
    $hrahra_superior = $_POST["hra_superior"];
    $minmin_superior = $_POST["min_superior"];

    $sql_update_destaques_inferior = mysqli_query($conn, "UPDATE mercadorias SET nome = '{$destaque_inferior}' WHERE id = 1");
    $sql_update_desc_inferior = mysqli_query($conn, "UPDATE mercadorias SET descricao = '{$descricao_inferior}' WHERE id = 1");
    $sql_update_dia_inferior = mysqli_query($conn, "UPDATE mercadorias SET tempo1 = '{$diadia_inferior}' WHERE id = 1");
    $sql_update_mes_inferior = mysqli_query($conn, "UPDATE mercadorias SET tempo2 = '{$mesmes_inferior}' WHERE id = 1");
    $sql_update_ano_inferior = mysqli_query($conn, "UPDATE mercadorias SET tempo3 = '{$anoano_inferior}' WHERE id = 1");
    $sql_update_hra_inferior = mysqli_query($conn, "UPDATE mercadorias SET tempo4 = '{$hrahra_inferior}' WHERE id = 1");
    $sql_update_min_inferior = mysqli_query($conn, "UPDATE mercadorias SET tempo5 = '{$minmin_inferior}' WHERE id = 1");
    $sql_update_destaques_superior = mysqli_query($conn, "UPDATE mercadorias SET nome = '{$destaque_superior}' WHERE id = 2");
    $sql_update_desc_superior = mysqli_query($conn, "UPDATE mercadorias SET descricao = '{$descricao_superior}' WHERE id = 2");
    $sql_update_dia_superior = mysqli_query($conn, "UPDATE mercadorias SET tempo1 = '{$diadia_superior}' WHERE id = 2");
    $sql_update_mes_superior = mysqli_query($conn, "UPDATE mercadorias SET tempo2 = '{$mesmes_superior}' WHERE id = 2");
    $sql_update_ano_superior = mysqli_query($conn, "UPDATE mercadorias SET tempo3 = '{$anoano_superior}' WHERE id = 2");
    $sql_update_hra_superior = mysqli_query($conn, "UPDATE mercadorias SET tempo4 = '{$hrahra_superior}' WHERE id = 2");
    $sql_update_min_superior = mysqli_query($conn, "UPDATE mercadorias SET tempo5 = '{$minmin_superior}' WHERE id = 2");

    if ($sql_update_destaques_inferior && $sql_update_destaques_superior) {
        echo "<script type='text/javascript'>alert('Mercadorias atualizadas com sucesso!');window.location.href='../dashboard.php';</script>";
    } else {
        echo "<script type='text/javascript'>alert('Erro ao atualizar as mercadorias.');</script>";
    }
}
?>

<div class="recent-orders">
    <h2>Mercadorias</h2>
    <div class="inform">
        <?php 
            $sql_get_superior = mysqli_query($conn, "SELECT * FROM mercadorias WHERE id = 2");
            $fetch_get_superior = mysqli_fetch_array($sql_get_superior);
            $nome_superior = $fetch_get_superior["nome"];
            $desc_superior = $fetch_get_superior["descricao"];     
            $dia_superior = $fetch_get_superior["tempo1"];
            $mes_superior = $fetch_get_superior["tempo2"];
            $ano_superior = $fetch_get_superior["tempo3"];
            $hra_superior = $fetch_get_superior["tempo4"];
            $min_superior = $fetch_get_superior["tempo5"];            
            $sql_get_inferior = mysqli_query($conn, "SELECT * FROM mercadorias WHERE id = 1");
            $fetch_get_inferior = mysqli_fetch_array($sql_get_inferior);
            $nome_inferior = $fetch_get_inferior["nome"];
            $desc_inferior = $fetch_get_inferior["descricao"];
            $dia_inferior = $fetch_get_inferior["tempo1"];
            $mes_inferior = $fetch_get_inferior["tempo2"];
            $ano_inferior = $fetch_get_inferior["tempo3"];
            $hra_inferior = $fetch_get_inferior["tempo4"];
            $min_inferior = $fetch_get_inferior["tempo5"];
        ?>
        <form action="" method="post">
            <div class="form-container">
                <div class="input-group">
                    <div>
                        <h1>1</h1>
                        <p>Nome</p><input type="text" id="usuarios" value="<?php echo $nome_inferior ?>" name="destaque_inferior" placeholder="Nome da Mercadoria">
                        <p>Descrição</p><input type="text" id="usuarios" value="<?php echo $desc_inferior ?>" name="desc_inferior" placeholder="Descrição da Mercadoria">
                        <p>Dia</p><input type="text" id="usuarios" value="<?php echo $dia_inferior ?>" name="dia_inferior" placeholder="Dia da Mercadoria">
                        <p>Mês</p><input type="text" id="usuarios" value="<?php echo $mes_inferior ?>" name="mes_inferior" placeholder="Mês da Mercadoria">
                        <p>Ano</p><input type="text" id="usuarios" value="<?php echo $ano_inferior ?>" name="ano_inferior" placeholder="Ano da Mercadoria">
                        <p>Hora</p><input type="text" id="usuarios" value="<?php echo $hra_inferior ?>" name="hra_inferior" placeholder="Hora da Mercadoria">
                        <p>Minutos</p><input type="text" id="usuarios" value="<?php echo $min_inferior ?>" name="min_inferior" placeholder="Minuto da Mercadoria">
                    </div>
                    <div>
                        <h1>2</h1>
                        <p>Nome</p><input type="text" id="usuarios" value="<?php echo $nome_superior ?>" name="destaque_superior" placeholder="Nome da Mercadoria">
                        <p>Descrição</p><input type="text" id="usuarios" value="<?php echo $desc_superior ?>" name="desc_superior" placeholder="Descrição da Mercadoria">
                        <p>Dia</p><input type="text" id="usuarios" value="<?php echo $dia_superior ?>" name="dia_superior" placeholder="Dia da Mercadoria">
                        <p>Mês</p><input type="text" id="usuarios" value="<?php echo $mes_superior ?>" name="mes_superior" placeholder="Mês da Mercadoria">
                        <p>Ano</p><input type="text" id="usuarios" value="<?php echo $ano_superior ?>" name="ano_superior" placeholder="Ano da Mercadoria">
                        <p>Hora</p><input type="text" id="usuarios" value="<?php echo $hra_superior ?>" name="hra_superior" placeholder="Hora da Mercadoria">
                        <p>Minutos</p><input type="text" id="usuarios" value="<?php echo $min_superior ?>" name="min_superior" placeholder="Minuto da Mercadoria">
                    </div>
                </div>
                <div class="buttons-container">
                    <button type="submit" name="enviar_destaque">Enviar</button>
                    <button type="reset">Resetar</button>
                </div>
            </div>
        </form>
    </div>
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
<script src="../js/equipe.js"></script>
<script src="../js/darkmode.js"></script>
</html>
    <?php
} elseif ( isset($_GET['type']) && $_GET['type'] == 'mercadoriasa') {
?>
 <h1>Oii</h1>
<?php
}
?>