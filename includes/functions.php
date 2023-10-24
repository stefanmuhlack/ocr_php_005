<?php
include 'db.php';

// Functions for templates
function getTemplates() {
    global $pdo;
    $stmt = $pdo->query('SELECT * FROM templates');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getTemplateById($id) {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM templates WHERE id = ?');
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Functions for pages
function getPagesByTemplateId($templateId) {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM pages WHERE template_id = ?');
    $stmt->execute([$templateId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getPageById($id) {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM pages WHERE id = ?');
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Functions for rectangles
function getRectanglesByPageId($pageId) {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM rectangles WHERE page_id = ?');
    $stmt->execute([$pageId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getRectangleById($id) {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM rectangles WHERE id = ?');
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Functions for detected values
function getDetectedValuesByRectangleId($rectangleId) {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM detected_values WHERE rectangle_id = ?');
    $stmt->execute([$rectangleId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getDetectedValueById($id) {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM detected_values WHERE id = ?');
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Additional functions for user management
function getUserById($id) {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getUserByUsername($username) {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ?');
    $stmt->execute([$username]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function userHasRole($userId, $roleName) {
    global $pdo;
    $stmt = $pdo->prepare('SELECT COUNT(*) as count FROM user_roles JOIN roles ON user_roles.role_id = roles.id WHERE user_roles.user_id = ? AND roles.role_name = ?');
    $stmt->execute([$userId, $roleName]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['count'] > 0;
}

?>
