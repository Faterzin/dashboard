<?php 
include("faterzin/verificar_login.php");
$activePage = 'vendas';
include './includes/sidebar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="css/equipe.css">
    <title><?php echo $titulo_site ?> - Admin</title>
    <link rel="shortcut icon" href="<?php echo $imagem_site ?>" type="image/x-icon" />
</head>

<body>
    <main>
        <div class="recent-orders">
            <h2>Vendas</h2>
            <table>
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>ID:</th>
                        <th>Vendedor</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </main>
        
    <?php include './includes/adminbar.php'; ?>

    <div tabindex="0" class="plusButton">
        <svg class="plusIcon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">
            <g mask="url(#mask0_21_345)">
                <path d="M13.75 23.75V16.25H6.25V13.75H13.75V6.25H16.25V13.75H23.75V16.25H16.25V23.75H13.75Z"></path>
            </g>
        </svg>
    </div>

    <?php 
    // Query para buscar vendas recentes
    $sql_recentes = "SELECT v.id AS vendaid, sp.quantidade, p.nome, v.vendedorid, v.clienteid,
            SUM(sp.quantidade * COALESCE(p.valorpromocional, p.valor)) AS total_valor
    FROM vendas v
    JOIN saida_produtos sp ON v.id = sp.vendaid
    JOIN produtos p ON sp.produtoid = p.id
    GROUP BY v.id";
    $stmt = mysqli_query($conn, $sql_recentes);

    if ($stmt) {
        function getVendedorName($conn, $vendedorid) {
            $vendedor_query = "SELECT nome FROM funcionarios WHERE id=$vendedorid";
            $vendedor_result = mysqli_query($conn, $vendedor_query);
            $vendedor = mysqli_fetch_assoc($vendedor_result);
            return $vendedor['nome'];
        }
    
        function getClienteName($conn, $clienteid) {
            $cliente_query = "SELECT nome FROM clientes WHERE id=$clienteid";
            $cliente_result = mysqli_query($conn, $cliente_query);
            $cliente = mysqli_fetch_assoc($cliente_result);
            return $cliente['nome'];
        }
        echo "<script>const Orders = [";
        while ($row = mysqli_fetch_assoc($stmt)) {
            $idvenda = $row['vendaid'];
            $nomevendedor = getVendedorName($conn, $row['vendedorid']);
            $nomecliente = getClienteName($conn, $row['clienteid']);
            $valor = number_format($row['total_valor'], 2, ',', '.');

            // Adicionando dados ao array Orders no JavaScript
            echo "{
                sellerid: '$idvenda',
                sellerName: '$nomevendedor',
                clientName: '$nomecliente',
                price: '$valor'
            },";
        } 
        echo "];</script>";
    } else {
        echo "Erro ao executar a consulta: " . mysqli_error($conn);
    }

    ?>
    <script>const Orders = <?php echo json_encode($orders); ?>;</script>
</body>
<script src="../js/vendas.js"></script>
<script src="../js/darkmode.js"></script>
</html>
