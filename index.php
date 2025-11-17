<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexboxgrid/6.3.1/flexboxgrid.min.css" type="text/css">-->
    <link rel="stylesheet" href="/css/styles.css">
</head>

<?php
// TODO: Add a try catch block here
$dsn = "mysql:host=localhost;port=3306;dbname=history_facts;charset=utf8mb4";
$pdo = new PDO($dsn, 'root');

$statement = $pdo->prepare("SELECT * FROM facts ORDER BY ID DESC");
$statement->execute();

$facts = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<body>

    <?php require('partials/nav.php'); ?>

    <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
        <!--Not the proper use of article, but CSS framework has it styled already so I'm going with it.-->
        <article class="container" style="background-color: #39F1A6;">
            You're fact was successfully submitted!
        </article>
    <?php endif; ?>


    <div class=" container">
        <figure>
            <table>
                <thead>
                    <tr>
                        <th>Fact</th>
                        <th>Year</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($facts as $fact): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($fact['fact_text']); ?></td>
                            <td><?php echo htmlspecialchars($fact['fact_year']); ?></td>
                            <td><a href="">Edit</a> | <a href="">Delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </figure>

    </div>

</body>

</html>