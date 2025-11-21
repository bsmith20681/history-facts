<?php

if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);

    $db->query(
        "DELETE FROM facts WHERE id = :id",
        [':id' => $id]
    );
}

$statement = $db->query("SELECT * FROM facts ORDER BY ID DESC");
$facts = $statement->fetchAll();

require('./views/index.view.php');
