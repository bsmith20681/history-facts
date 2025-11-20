<?php
require('partials/nav.php');

//TODO: add try catch
require('database.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $statement = $db->query(
        "SELECT * FROM facts WHERE id =:id",
        [':id' => $id]
    );

    $fact = $statement->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fact = trim($_POST['fact']);
    $year = trim($_POST['year']);

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

        header('Location: http://localhost:3000/?updated=1');
        exit;
    }

    $db->query(
        "INSERT INTO facts (fact_text, fact_year) VALUES (:fact, :year)",
        [
            ':fact' => $fact,
            ':year' => $year
        ]
    );

    header('Location: http://localhost:3000/?success=1');
    exit;
}

?>

<div class="container">
    <form method="POST">
        <textarea
            placeholder="Write an Interesting fact"
            required
            class="form-control mb-3"
            name="fact"><?= isset($fact) ? htmlspecialchars($fact['fact_text']) : '' ?></textarea>
        <input class="form-control mb-3" required type="text" name="year" placeholder="Year" maxlength="4" value="<?= isset($fact) ? htmlspecialchars($fact['fact_year']) : '' ?>">
        <input class="btn btn-primary" type="submit" value="<?= isset($fact) ? "Update Fact" : "Add Fact" ?>">
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>