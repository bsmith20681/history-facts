<?php
$title = "Home";
require('partials/nav.php');
?>

<!--this needs to be refactor this into something better -->
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
                        <td><a href="/fact?id=<?php echo htmlspecialchars($fact['id']); ?>">Edit</a> | <a href="/?delete=<?php echo htmlspecialchars($fact['id']) ?>" onclick="return confirm('Delete this fact?');">Delete</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </figure>

</div>

<?php require('partials/footer.php'); ?>