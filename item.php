<?php
include 'includes/functions.php';
$item = getItemById($_GET['id']);
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= $item['name'] ?></title>
</head>
<body>
<h1><?= $item['name'] ?></h1>
<p><?= $item['description'] ?></p>
<a href="index.php">Back to list</a>
</body>
</html>
