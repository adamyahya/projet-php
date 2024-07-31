<?php
include '../includes/header.php';
include '../includes/db.php';

$result = $mysqli->query("SELECT * FROM users");

?>

<main>
    <h2>Gestion des Clients</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nom d'utilisateur</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td>
                <a href="edit_client.php?id=<?php echo $row['id']; ?>">Modifier</a>
                <a href="delete_client.php?id=<?php echo $row['id']; ?>">Supprimer</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</main>

<?php include '../includes/footer.php'; ?>
