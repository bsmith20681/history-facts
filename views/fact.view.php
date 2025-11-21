<?php
$title = "Create or Update a Fact";
require('partials/nav.php');
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

<?php require('partials/footer.php'); ?>