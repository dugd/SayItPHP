<h1>Список літер</h1>

<a href="/admin/alphabet/add" class="btn btn-success mb-3">Додати нову літеру</a>

<?php if (!empty($letters)): ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Літера</th>
                <th>Зображення</th>
                <th>Опис</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($letters as $letter): ?>
                <tr>
                    <td><?= htmlspecialchars($letter['letter']) ?></td>
                    <td>
                        <?php if (!empty($letter['gesture_image'])): ?>
                            <img src="/uploads/<?= htmlspecialchars($letter['gesture_image']) ?>" alt="Жест" width="60">
                        <?php endif; ?>
                    </td>
                    <td><?= htmlspecialchars($letter['description']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Немає літер у списку.</p>
<?php endif; ?>