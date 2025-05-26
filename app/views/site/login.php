<h1 class="mb-4">Вхід до адмін-панелі</h1>

<?php if (!empty($error)): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>

<form method="POST" class="card p-4 shadow-sm">
    <div class="mb-3">
        <label for="username" class="form-label">Username:</label>
        <input type="text" name="username" id="username" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Пароль:</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>

    <button class="btn btn-primary">Увійти</button>
</form>