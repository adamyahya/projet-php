<?php
include '../includes/header.php';
include '../includes/db.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {
        $stmt = $mysqli->prepare("SELECT password FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $stmt->bind_result($hashed_password);
            $stmt->fetch();
            if (password_verify($password, $hashed_password)) {
                $_SESSION['username'] = $username;
                header("Location: /public/index.php");
                exit();
            } else {
                echo "<p>Nom d'utilisateur ou mot de passe incorrect.</p>";
            }
        } else {
            echo "<p>Nom d'utilisateur ou mot de passe incorrect.</p>";
        }
        $stmt->close();
    } else {
        echo "<p>Veuillez remplir tous les champs.</p>";
    }
}
?>

<main>
    <h2>Connexion</h2>
    <form action="" method="post">
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <input type="submit" value="Se connecter">
    </form>
</main>

<?php include '../includes/footer.php'; ?>
