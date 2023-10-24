<?php
include 'db_connect.php';

function userHasRole($userId, $roleName) {
    global $conn;

    $sql = "SELECT COUNT(*) as count FROM user_roles JOIN roles ON user_roles.role_id = roles.id WHERE user_roles.user_id = ? AND roles.role_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $userId, $roleName);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    return $row['count'] > 0; // Returns true if the user has the role, false otherwise
}
?>

