<?php
require('partials/nav.php');


//TODO: add try catch
$dsn = "mysql:host=localhost;port=3306;dbname=history_facts;charset=utf8mb4";
$pdo = new PDO($dsn, 'root');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fact = trim($_POST['fact']);
    $year = trim($_POST['year']);

    $statement = $pdo->prepare("INSERT INTO facts (fact_text, fact_year) VALUES (:fact, :year)");

    $statement->execute([
        ':fact' => $fact,
        ':year' => $year
    ]);

    header('Location: http://localhost:3000/?success=1');
    die();
}

?>

<div class="container">
    <form method="POST">
        <textarea
            required
            name="fact"
            placeholder="Write an Interesting fact">
            </textarea>
        <input required type="text" name="year" placeholder="Year" maxlength="4">
        <input type="submit" value="Add Fact">
    </form>
</div>

</body>

</html>