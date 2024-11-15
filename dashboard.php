<?php 
include("faterzin/verificar_login.php");
$activePage = 'dashboard';
include './includes/sidebar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="css/dashboard.css">
    <title><?php echo$titulo_site ?> - Admin</title>
    <link rel="shortcut icon" href="<?php echo$imagem_site ?>" type="image/x-icon" />
</head>

<body>
    <main>
        <h1>Dashboard</h1>
        <div class="analyse">
            <div class="sales">
                <div class="status">
                    <div class="info">
                        <h3>Total Vendido</h3>
                        <h1>
                            <?php 
$sql = "SELECT SUM(sp.quantidade * p.valor) AS total_valor FROM saida_produtos sp INNER JOIN produtos p ON sp.produtoid = p.id";

$stmt = mysqli_query($conn, $sql);

if ($stmt) {
    $row = mysqli_fetch_assoc($stmt);
    $total_valor = $row['total_valor'];

    // Verificar se o resultado não é nulo (em caso de tabela vazia, por exemplo)
    if ($total_valor !== null) {
        echo "R$ " . number_format($total_valor, 2, ',', '.');
    } else {
        echo "R$ 0,00";
    }
} else {
    echo "Erro ao executar a consulta: " . mysqli_error($conn);
}
?>
</h1>
                        </div>
                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="percentage">
                                <p>+81%</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="visits">
                    <div class="status">
                        <div class="info">
                            <h3>Total de Clientes</h3>
                            <h1>
                            <?php 
                            $sql = "SELECT COUNT(*) FROM clientes";
                            $stmt = mysqli_query($conn, $sql);
                            if ($stmt) {
                                $row = mysqli_fetch_array($stmt);
                                $count = $row[0];
                                echo $count;
                            } else {
                                echo "Erro ao executar a consulta: " . mysqli_error($conn);
                            }
                            ?>
                        </h1>
                        
                        </div>
                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="percentage">
                                <p>+85%</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="searches">
                    <div class="status">
                        <div class="info">
                            <h3>Vendas</h3>
                            <h1><?php 
                            $sql = "SELECT COUNT(*) FROM vendas";
                            $stmt = mysqli_query($conn, $sql);
                            if ($stmt) {
                                $row = mysqli_fetch_array($stmt);
                                $count = $row[0];
                                echo $count;
                            } else {
                                echo "Erro ao executar a consulta: " . mysqli_error($conn);
                            }
                            ?></h1>
                        </div>
                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="percentage">
                                <p>+21%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Analyses -->

            <!-- New Users Section -->
            <div class="new-users">
                <h2>Equipe Únnica</h2>
                <div class="user-list">
                    <div class="user">
                        <img href="../equipe.php" src="images/profile-2.jpg">
                        <h2>Jack</h2>
                        <p>54 Min Ago</p>
                    </div>
                    <div class="user">
                        <img href="../equipe.php" src="images/profile-3.jpg">
                        <h2>Amir</h2>
                        <p>3 Hours Ago</p>
                    </div>
                    <div class="user">
                        <img href="../equipe.php" src="images/profile-4.jpg">
                        <h2>Ember</h2>
                        <p>6 Hours Ago</p>
                    </div>
                    <div class="user">
                        <img href="../equipe.php" src="images/plus.png">
                        <h2>More</h2>
                        <p>New User</p>
                    </div>
                </div>
            </div>
            <!-- End of New Users Section -->

            <!-- Recent Orders Table -->
            <div class="recent-orders">
                <h2>Vendas Recentes</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID da Venda</th>
                            <th>Vendedor</th>
                            <th>Cliente</th>
                            <th>Valor</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <a href="../vendas.php">Ver todas</a>
            </div>
            <!-- End of Recent Orders -->

        </main>
        <!-- End of Main Content -->

        <!-- Right Section -->
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
                        <img src="images/profile-1.jpg">
                    </div>
                </div>

            </div>
            <!-- End of Nav -->

            <div class="user-profile">
                <div class="logo">
                    <img src="images/logo2.png">
                    <h2>UseÚnnica</h2>
                    <p>Entregando expectativas.</p>
                </div>
            </div>
            <?php
            $select_id1 = mysqli_query($conn, "SELECT * FROM mercadorias WHERE id = '1'");
            $r = mysqli_fetch_array($select_id1);
            $name1 = $r["nome"];
            $dia = $r["tempo1"];
            $mes = $r["tempo2"];
            $ano = $r["tempo3"];
            $hra = $r["tempo4"];
            $min = $r["tempo5"];
            $select_id2 = mysqli_query($conn, "SELECT * FROM mercadorias WHERE id = '2'");
            $r = mysqli_fetch_array($select_id2);
            $name2 = $r["nome"];
            $dia2 = $r["tempo1"];
            $mes2 = $r["tempo2"];
            $ano2 = $r["tempo3"];
            $hra2 = $r["tempo4"];
            $min2 = $r["tempo5"];
            ?>
            <div class="reminders">
                <div class="header">
                    <h2>Mercadorias</h2>
                    <span class="material-icons-sharp">
                        notifications_none
                    </span>
                </div>

                <div class="notification" id="mercadoriaadd3">
                    <div class="icon">
                        <span class="material-icons-sharp">
                            volume_up
                        </span>
                    </div>
                    <div class="content">
                        <div class="info">
                            <h3><?php echo $name1 ?></h3>
                            <small class="text_muted">
                                <?php echo $dia ?>/<?php echo $mes ?>/<?php echo $ano?> <?php echo $hra ?>:<?php echo $min ?>
                            </small>
                        </div>
                        <span class="material-icons-sharp">
                            more_vert
                        </span>
                    </div>
                </div>

                <div class="notification deactive" id="mercadoriaadd2">
                    <div class="icon">
                        <span class="material-icons-sharp">
                            edit
                        </span>
                    </div>
                    <div class="content">
                        <div class="info">
                            <h3><?php echo $name2 ?></h3>
                            <small class="text_muted">
                                <?php echo $dia2 ?>/<?php echo $mes2 ?>/<?php echo $ano2?> <?php echo $hra2 ?>:<?php echo $min2 ?>
                            </small>
                        </div>
                        <span class="material-icons-sharp">
                            more_vert
                        </span>
                    </div>
                </div>

                <div class="notification add-reminder" id="mercadoriaadd">
                    <div>
                        <span class="material-icons-sharp">
                            add
                        </span>
                        <h3>Adicionar</h3>
                        <script>
                            document.getElementById('mercadoriaadd').addEventListener('click', function(event) {
                            event.preventDefault();
                            window.location.href = '../adicionais/forms.php?type=mercadorias';
                            });
                            document.getElementById('mercadoriaadd2').addEventListener('click', function(event) {
                            event.preventDefault();
                            window.location.href = '../adicionais/forms.php?type=mercadorias';
                            });
                            document.getElementById('mercadoriaadd3').addEventListener('click', function(event) {
                            event.preventDefault();
                            window.location.href = '../adicionais/forms.php?type=mercadorias';
                            });
                        </script>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <?php 
    $sql_recentes = "SELECT v.id, v.clienteid, v.vendedorid, v.data, 
           SUM(sp.quantidade * COALESCE(p.valorpromocional, p.valor)) AS total_valor
    FROM vendas v
    INNER JOIN saida_produtos sp ON v.id = sp.vendaid
    INNER JOIN produtos p ON sp.produtoid = p.id
    GROUP BY v.id, v.clienteid, v.vendedorid, v.data
    ORDER BY v.data DESC
    LIMIT 3";

    $stmt = mysqli_query($conn, $sql_recentes);
    
    if ($stmt) {
        function getClientName($conn, $clienteid) {
            $query = "SELECT nome FROM clientes WHERE id = $clienteid";
            $result = mysqli_query($conn, $query);
            if ($result && mysqli_num_rows($result) > 0) {
                $cliente = mysqli_fetch_assoc($result);
                return $cliente['nome'];
            }
            return 'Desconhecido';
        }

        function getVendedorName($conn, $vendedorid) {
            $query = "SELECT nome FROM funcionarios WHERE id = $vendedorid";
            $result = mysqli_query($conn, $query);
            if ($result && mysqli_num_rows($result) > 0) {
                $vendedor = mysqli_fetch_assoc($result);
                return $vendedor['nome'];
            }
            return 'Desconhecido';
        }

        // Início do JavaScript para construir o array Orders
        echo "<script>const Orders = [";

        // Loop para processar os resultados
        while ($row = mysqli_fetch_assoc($stmt)) {
            $idvenda = $row['id'];
            $nomevendedor = getVendedorName($conn, $row['vendedorid']);
            $nomecliente = getClientName($conn, $row['clienteid']);
            $valor = number_format($row['total_valor'], 2, ',', '.');

            // Adicionando dados ao array Orders no JavaScript
            echo "{
                idDaVenda: '$idvenda',
                vendedorNome: '$nomevendedor',
                clienteNome: '$nomecliente',
                valor: 'R$ $valor'
            },";
        }

        // Fechando o array no JavaScript
        echo "];</script>";
    } else {
        echo "Erro ao executar a consulta: " . mysqli_error($conn);
    }
?>
<script>
    const sideMenu = document.querySelector('aside');
    const menuBtn = document.getElementById('menu-btn');
    const closeBtn = document.getElementById('close-btn');

    menuBtn.addEventListener('click', () => {
        sideMenu.style.display = 'block';
    });

    closeBtn.addEventListener('click', () => {
        sideMenu.style.display = 'none';
    });

    Orders.forEach(order => {
        const tr = document.createElement('tr');
        const trContent = `
            <td>${order.idDaVenda}</td>
            <td>${order.vendedorNome}</td>
            <td>${order.clienteNome}</td>
            <td>${order.valor}</td>
            <td class="primary vermais" data-user-id="${order.idDaVenda}">Ver mais</td>
        `;
        tr.innerHTML = trContent;
        document.querySelector('table tbody').appendChild(tr);
    });

    setupVerMaisButtons();

function setupVerMaisButtons() {
    const verMaisButtons = document.querySelectorAll('.vermais');
    
    verMaisButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            const sellerid = e.target.getAttribute('data-user-id');
            window.location.href = `../adicionais/vendasDetails.php?sellerid=${sellerid}`;
        });
    });
}
</script>
<script src="../js/darkmode.js"></script>
</body>
</html>
