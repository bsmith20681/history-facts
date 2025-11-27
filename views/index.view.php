<?php
$title = "Home";
require('partials/nav.php');
?>

<?php if ($alertMessage): ?>
    <div class="container alert alert-success alert-dismissible" role="alert">
        <p><?= htmlspecialchars($alertMessage) ?></p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>


<div class=" container">
    <figure>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Fact</th>
                    <!--this is really bad, I'll clean this up later-->
                    <th><a href="<?= isset($_GET['page']) ? '/?page=' . $_GET['page'] . '&order=desc' : '/?order=desc' ?>">Year</a></th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($facts as $fact): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($fact['fact_text']); ?></td>
                        <td><?php echo htmlspecialchars($fact['fact_year']); ?></td>
                        <td class="d-flex align-items-center gap-1"><a href="/fact?id=<?php echo htmlspecialchars($fact['id']); ?>">Edit </a> | <form method="POST"><input type="text" name="id" value="<?php echo htmlspecialchars($fact['id']) ?>" hidden><input type="submit" class="btn btn-link p-0" value="Delete" onclick="return confirm('Delete this fact?');"></form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </figure>

    <div class="container my-3 d-flex justify-content-center">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <?php if ($page > 1): ?>
                    <li class="page-item"><a class="page-link" href="/?page=<?= $page - 1 ?>">Previous</a></li>
                <?php endif; ?>

                <?php for ($p = 1; $p <= $totalPages; $p++): ?>
                    <?php $active = ($p === $page) ? 'active' : ''; ?>
                    <li class="page-item"><a class="page-link <?= $active ?>" href="/?page=<?= $p ?>"><?= $p ?></a></li>
                <?php endfor ?>

                <?php if ($page < $totalPages): ?>
                    <li class="page-item"><a class="page-link" href="/?page=<?= $page + 1 ?>">Next</a></li>
                <?php endif; ?>

            </ul>
        </nav>
    </div>

</div>

<?php require('partials/footer.php'); ?>