<?php
include '../includes/header.php';
include '../includes/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $mysqli->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    
    if (!empty($product_name) && !empty($product_description)) {
        $stmt = $mysqli->prepare("UPDATE products SET name = ?, description = ? WHERE id = ?");
        $stmt->bind_param("ssi", $product_name, $product_description, $id);
        $stmt->execute();
        $stmt->close();
        header("Location: products.php");
        exit();
    } else {
        echo "<p>Veuillez remplir tous les champs.</p>";
    }
}
?>

<main>
    <h2>Modifier Produit</h2>
    <form action="" method="post">
        <label for="product_name">Nom du produit:</label>
        <input type="text" id="product_name" name="product_name" value="<?php echo $product['name']; ?>" required>
        <br>
        <label for="product_description">Description:</label>
        <textarea id="product_description" name="product_description" required><?php echo $product['description']; ?></textarea>
        <br>
        <input type="submit" value="Modifier">
    </form>
</main>

<?php include '../includes/footer.php'; ?>
