<?php 
include 'faterzin/verificar_login.php';
$activePage = 'clientes';
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
            <h2>Cadastro de Clientes</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>Compras</th>
                        <th>Cadastrado?</th>
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
$sql_recentes = "SELECT * FROM clientes";
$stmt = mysqli_query($conn, $sql_recentes);

if ($stmt) {
    $orders = [];
    
    while ($row = mysqli_fetch_assoc($stmt)) {
        $compras = contarCompras($conn, $row['id']);
        $orders[] = [
            'clientId' => $row['id'],
            'clientName' => $row['nome'],
            'phoneNumber' => $row['telefone'],
            'compras' => $compras,
            'cadastro' => $row['cadastrado'] == 1 ? 'Sim' : 'Não',
        ];
    }
} else {
    echo "Erro ao executar a consulta: " . mysqli_error($conn);
}

function contarCompras($conn, $clienteId) {
    $clienteId = mysqli_real_escape_string($conn, $clienteId);

    $sql = "SELECT COUNT(clienteid) AS total_compras FROM vendas WHERE clienteid = '{$clienteId}'";
    $resultado = mysqli_query($conn, $sql);
    if (!$resultado) {
        die("Erro na consulta: " . mysqli_error($conn));
    }
    $row = mysqli_fetch_assoc($resultado);
    return $row['total_compras'];
}
?>

<script>const Orders = <?php echo json_encode($orders); ?>;</script>
</body>
</html>





<script src="../js/clientes.js"></script>
<script src="../js/darkmode.js"></script>
</html>