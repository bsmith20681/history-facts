<?php

// Delete
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);

    $db->query(
        "DELETE FROM facts WHERE id = :id",
        [':id' => $id]
    );
}

// ------------ ORDERING --------------
$orderBy = 'id DESC'; // The default view shows the most recently created fact

if (isset($_GET['order']) && $_GET['order'] == 'desc') {
    $orderBy = 'fact_year DESC';
}

// ------------ PAGINATION --------------

$perPage = 10;
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1; // makes sure it never goes below 1
$offset = ($page - 1) * $perPage;

$totalStmt = $db->query("SELECT COUNT(*) AS cnt FROM facts");
$total = (int) $totalStmt->fetchColumn();
$totalPages = max(1, ceil($total / $perPage));

$statement = $db->query("SELECT * FROM facts ORDER BY $orderBy LIMIT :limit OFFSET :offset", [
    ':limit'  => $perPage,
    ':offset' => $offset
]);
$facts = $statement->fetchAll();


// ------------ ALERTS --------------
$alertMessage = null;

if (isset($_GET['success']) && $_GET['success'] == 1) {
    $alertMessage = "Your fact was successfully submitted!";
} elseif (isset($_GET['updated']) && $_GET['updated'] == 1) {
    $alertMessage = "Your fact was successfully updated!";
}

require('../views/index.view.php');
