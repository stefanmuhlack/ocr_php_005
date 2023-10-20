<?php
include 'includes/functions.php';
$items = getItems();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Items List</title>
</head>
<body>
<h1>Items</h1>
<ul>
    <?php foreach ($items as $item): ?>
        <li><a href="item.php?id=<?= $item['id'] ?>"><?= $item['name'] ?></a></li>
    <?php endforeach; ?>
</ul>
</body>
</html>
