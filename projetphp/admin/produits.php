<?php
include '../includes/header.php';
include '../includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    
    if (!empty($product_name) && !empty($product_description)) {
        $stmt = $mysqli->prepare("INSERT INTO products (name, description) VALUES (?, ?)");
        $stmt->bind_param("ss", $product_name, $product_description);
        $stmt->execute();
        $stmt->close();
        echo "<p>Produit ajouté avec succès.</p>";
    } else {
        echo "<p>Veuillez remplir tous les champs.</p>";
    }
}
?>

<main>
    <h2>Ajouter un Produit</h2>
    <form action="" method="post">
        <label for="product_name">Nom du produit:</label>
        <input type="text" id="product_name" name="product_name" required>
        <br>
        <label for="product_description">Description:</label>
        <textarea id="product_description" name="product_description" required></textarea>
        <br>
        <input type="submit" value="Ajouter">
    </form>
</main>

<?php include '../includes/footer.php'; ?>
