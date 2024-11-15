<?php 
include("faterzin/verificar_login.php");
$activePage = 'equipe';
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
        <h2>Funcionários/Equipe</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Cargo/Função</th>
                    <th>Painel</th>
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
</main>
    
<?php 
$sql_recentes = "SELECT * FROM funcionarios";
$stmt = mysqli_query($conn, $sql_recentes);

if ($stmt) {
    $orders = [];
    
    while ($row = mysqli_fetch_assoc($stmt)) {
        $orders[] = [
            'productName' => $row['nome'],
            'productNumber' => $row['id'],
            'paymentStatus' => $row['telefone'],
            'status' => $row['funcao'],
            'userId' => $row['id'],
            'painel' => $row['painel'] == 1 ? 'Sim' : 'Não',
        ];
    }
} else {
    echo "Erro ao executar a consulta: " . mysqli_error($conn);
}
?>

<script>const Orders = <?php echo json_encode($orders); ?>;</script>
</body>
</html>




<script src="../js/equipe.js"></script>
<script src="../js/darkmode.js"></script>