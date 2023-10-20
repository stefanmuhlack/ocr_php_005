<?php
include 'db.php';

function getItems() {
    global $pdo;
    $stmt = $pdo->query('SELECT * FROM items');
    return $stmt->fetchAll();
}

function getItemById($id) {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM items WHERE id = ?');
    $stmt->execute([$id]);
    return $stmt->fetch();
}
?>
<?php
