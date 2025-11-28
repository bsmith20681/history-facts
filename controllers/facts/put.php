<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fact = trim($_POST['fact']);
    $year = trim($_POST['year']);
    $id = trim($_POST['id']);

    if (strlen($fact) > 140 || $year > date('Y')) {
        $error = "Either your fact was over 140 characters or the year was greater than the current year";
    } else {

        if (isset($id)) {

            $db->query(
                "UPDATE facts SET fact_text = :fact, fact_year = :year WHERE id = :id",
                [
                    ':fact' => $fact,
                    ':year' => $year,
                    ':id'   => $id
                ]
            );

            header('Location: /?updated=1');
            exit;
        }
    }
}

require('../views/index.view.php');
