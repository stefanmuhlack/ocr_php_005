<?php
include 'user_functions.php';

$userId = 1; // Example user ID
$roleName = "admin";

if (userHasRole($userId, $roleName)) {
    echo "The user has the admin role!";
} else {
    echo "The user does not have the admin role!";
}
?>

