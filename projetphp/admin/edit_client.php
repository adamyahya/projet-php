<?php
include '../includes/header.php';
include '../includes/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $client = $result->fetch_assoc();
    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $stmt = $mysqli->prepare("UPDATE users SET username = ? WHERE id = ?");
    $stmt->bind_param("si", $username, $id);
    $stmt->execute();
    $stmt->close();
    header("Location: clients.php");
    exit();
}
?>

<main>
    <h2>Modifier Client</h2>
    <form action="" method="post">
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" id="username" name="username" value="<?php echo $client['username']; ?>" required>
        <br>
        <input type="submit" value="Modifier">
    </form>
</main>

<?php include '../includes/footer.php'; ?>
