<?php
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $statement = $db->query(
        "SELECT * FROM facts WHERE id =:id",
        [':id' => $id]
    );

    $factData = $statement->fetch(PDO::FETCH_ASSOC);

    if (is_array($factData)) {
        $fact = $factData['fact_text'];
        $year = $factData['fact_year'];
    }
}

require('../views/facts/edit.php');
