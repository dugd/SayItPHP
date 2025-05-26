<div class="row">
    <div class="col-md-3 mb-4">
        <div class="list-group">
            <?php foreach ($letters as $l): ?>
                <a href="/alphabet?letter=<?= urlencode($l['letter']) ?>"
                    class="list-group-item list-group-item-action <?= ($selected && $selected['letter'] === $l['letter']) ? 'active' : '' ?>">
                    <?= htmlspecialchars($l['letter']) ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="col-md-9">
        <?php if ($selected): ?>
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="card-title display-6"><?= htmlspecialchars($selected['letter']) ?></h2>
                    <?php if (!empty($selected['gesture_image'])): ?>
                        <img src="/uploads/<?= htmlspecialchars($selected['gesture_image']) ?>" class="img-fluid my-3" alt="Жест">
                    <?php endif; ?>
                    <p><?= nl2br(htmlspecialchars($selected['description'])) ?></p>
                </div>
            </div>
        <?php else: ?>
            <div class="alert alert-info">Оберіть літеру для перегляду інформації.</div>
        <?php endif; ?>
    </div>
</div>