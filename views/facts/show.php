<?php
$title = "View a fact";

require __DIR__ . '/../partials/nav.php';
?>
<div class="container">
    <h1>Fact from the year <?= htmlspecialchars($year) ?></h1>
    <hr>
    <p><?= htmlspecialchars($fact) ?></p>
</div>

<?php require __DIR__ . '/../partials/footer.php'; ?>