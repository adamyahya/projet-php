<?php
include '../includes/header.php';
include '../includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $mysqli->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $hashed_password);
        $stmt->execute();
        $stmt->close();
        echo "<p>Inscription réussie ! <a href='/public/connexion.php'>Connectez-vous</a></p>";
    } else {
        echo "<p>Veuillez remplir tous les champs.</p>";
    }
}
?>

<main>
    <h2>Inscription</h2>
    <form action="" method="post">
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <input type="submit" value="S'inscrire">
    </form>
</main>

<?php include '../includes/footer.php'; ?>
