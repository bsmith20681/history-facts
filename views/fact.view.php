<?php
$title = "Create or Update a Fact";
require('partials/nav.php');
?>
<div class="container">
    <?php if (!empty($error)): ?>
        <div class="container alert alert-danger alert-dismissible" role="alert">
            <p><?= $error ?></p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <form method="POST">
        <textarea
            placeholder="Write an Interesting fact in under 140 characters"
            required
            class="form-control mb-3"
            name="fact"><?= isset($fact) ? htmlspecialchars($fact) : '' ?></textarea>
        <input class="form-control mb-3" required type="text" name="year" placeholder="Year" maxlength="4" value="<?= isset($year) ? htmlspecialchars($year) : '' ?>">
        <input class="btn btn-primary" type="submit" value="<?= isset($fact) ? "Update Fact" : "Add Fact" ?>">
    </form>
</div>

<?php require('partials/footer.php'); ?>