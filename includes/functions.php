<?php
include 'db.php';

// Functions for templates
function getTemplates() {
    global $pdo;
    $stmt = $pdo->query('SELECT * FROM templates');
    return $stmt->fetchAll();
}

function getTemplateById($id) {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM templates WHERE id = ?');
    $stmt->execute([$id]);
    return $stmt->fetch();
}

// Functions for pages
function getPagesByTemplateId($templateId) {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM pages WHERE template_id = ?');
    $stmt->execute([$templateId]);
    return $stmt->fetchAll();
}

function getPageById($id) {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM pages WHERE id = ?');
    $stmt->execute([$id]);
    return $stmt->fetch();
}

// Functions for rectangles
function getRectanglesByPageId($pageId) {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM rectangles WHERE page_id = ?');
    $stmt->execute([$pageId]);
    return $stmt->fetchAll();
}

function getRectangleById($id) {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM rectangles WHERE id = ?');
    $stmt->execute([$id]);
    return $stmt->fetch();
}

// Functions for detected values
function getDetectedValuesByRectangleId($rectangleId) {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM detected_values WHERE rectangle_id = ?');
    $stmt->execute([$rectangleId]);
    return $stmt->fetchAll();
}

function getDetectedValueById($id) {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM detected_values WHERE id = ?');
    $stmt->execute([$id]);
    return $stmt->fetch();
}

?>
