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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fact = trim($_POST['fact']);
    $year = trim($_POST['year']);

    if (strlen($fact) > 140 || $year > date('Y')) {
        $error = "Either your fact was over 140 characters or the year was greater than the current year";
    } else {

        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);

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
}

require('./views/fact.view.php');
