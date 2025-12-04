<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = trim($_POST['id']);

    $db->query(
        "DELETE FROM facts WHERE id = :id",
        [':id' => $id]
    );

    header("Location: /");
    exit;
}
