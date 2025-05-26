<h1><?= $title ?></h1>

<?php if (!empty($success)): ?>
    <div class="alert alert-success">Зміни збережено!</div>
<?php endif; ?>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($errors as $e): ?>
                <li><?= htmlspecialchars($e) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="letter" class="form-label">Літера</label>
        <input type="text" name="letter" id="letter" class="form-control" maxlength="1" required
            value="<?= htmlspecialchars($letterData['letter'] ?? '') ?>">
    </div>

    <div class="mb-3">
        <label for="gesture_image" class="form-label">Зображення жесту</label>
        <?php if (!empty($letterData['gesture_image'])): ?>
            <div class="mb-2">
                <img src="/uploads/<?= htmlspecialchars($letterData['gesture_image']) ?>" height="50">
            </div>
        <?php endif; ?>
        <input type="file" name="gesture_image" id="gesture_image" class="form-control" accept="image/*">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Опис (необов’язково)</label>
        <textarea name="description" id="description" class="form-control"><?= htmlspecialchars($letterData['description'] ?? '') ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary"><?= isset($letterData) ? 'Оновити' : 'Додати' ?></button>
    <a href="/admin/alphabet" class="btn btn-secondary">Назад</a>
</form>