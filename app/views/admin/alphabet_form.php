<h1>Додати літеру</h1>

<?php if (!empty($success)): ?>
    <div class="alert alert-success">Літеру додано!</div>
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
        <input type="text" name="letter" id="letter" class="form-control" maxlength="1" required>
    </div>

    <div class="mb-3">
        <label for="gesture_image" class="form-label">Зображення жесту</label>
        <input type="file" name="gesture_image" id="gesture_image" class="form-control" accept="image/*">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Опис (необов’язково)</label>
        <textarea name="description" id="description" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Додати</button>
</form>