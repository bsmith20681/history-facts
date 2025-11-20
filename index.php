<?php
// TODO: Add a try catch block here
require('database.php');

if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);

    $db->query(
        "DELETE FROM facts WHERE id = :id",
        [':id' => $id]
    );
}

$statement = $db->query("SELECT * FROM facts ORDER BY ID DESC");
$facts = $statement->fetchAll();
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