<?php
include '../includes/header.php';
include '../includes/db.php';

$total_clients_result = $mysqli->query("SELECT COUNT(*) AS total_clients FROM users");
$total_clients = $total_clients_result->fetch_assoc()['total_clients'];

$total_products_result = $mysqli->query("SELECT COUNT(*) AS total_products FROM products");
$total_products = $total_products_result->fetch_assoc()['total_products'];

$total_orders_result = $mysqli->query("SELECT COUNT(*) AS total_orders FROM orders");
$total_orders = $total_orders_result->fetch_assoc()['total_orders'];
?>

<main>
    <h2>Statistiques</h2>
    <p>Total des clients : <?php echo $total_clients; ?></p>
    <p>Total des produits : <?php echo $total_products; ?></p>
    <p>Total des commandes : <?php echo $total_orders; ?></p>
</main>

<?php include '../includes/footer.php'; ?>
