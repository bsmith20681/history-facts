<?php
// TODO: Add a try catch block here
$dsn = "mysql:host=localhost;port=3306;dbname=history_facts;charset=utf8mb4";
$pdo = new PDO($dsn, 'root');


//Delete fact Rename the statement variable during refactor
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);

    $statement = $pdo->prepare("DELETE FROM facts WHERE id = :id");

    $statement->bindValue(':id', $id, PDO::PARAM_INT);

    $statement->execute();
}

//Fetch all facts
$statement = $pdo->prepare("SELECT * FROM facts ORDER BY ID DESC");
$statement->execute();

$facts = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<body>

    <?php require('partials/nav.php'); ?>


    <!--you could probably refactor this into something better -->
    <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
        <div class="container alert alert-success" role="alert">
            You're fact was successfully submitted!
        </div>
    <?php endif; ?>

    <?php if (isset($_GET['updated']) && $_GET['updated'] == 1): ?>
        <div class="container alert alert-success" role="alert">
            You're fact was successfully updated!
        </div>
    <?php endif; ?>


    <div class=" container">
        <figure>
            <table class="table table-striped">
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
                            <td><a href="/fact.php?id=<?php echo htmlspecialchars($fact['id']); ?>">Edit</a> | <a href="/?delete=<?php echo htmlspecialchars($fact['id']) ?>" onclick="return confirm('Delete this fact?');">Delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </figure>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>