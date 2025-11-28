<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fact = trim($_POST['fact']);
    $year = trim($_POST['year']);

    if (strlen($fact) > 140 || $year > date('Y')) {
        $error = "Either your fact was over 140 characters or the year was greater than the current year";
    } else {

        $db->query(
            "INSERT INTO facts (fact_text, fact_year) VALUES (:fact, :year)",
            [
                ':fact' => $fact,
                ':year' => $year
            ]
        );

        header('Location: /?success=1');
        exit;
    }
}

require('../views/facts/create.php');
