<h1 class="mb-4">Список літер</h1>

<a href="/admin/alphabet/add" class="btn btn-success mb-3">+ Додати нову літеру</a>

<?php if (!empty($letters)): ?>
    <div class="table-responsive">
        <table class="table table-bordered align-middle bg-white">
            <thead class="table-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Літера</th>
                    <th scope="col">Зображення</th>
                    <th scope="col">Опис</th>
                    <th scope="col" style="width: 160px;">Дії</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($letters as $index => $letter): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><strong><?= htmlspecialchars($letter['letter']) ?></strong></td>
                        <td>
                            <?php if (!empty($letter['gesture_image'])): ?>
                                <img src="/uploads/<?= htmlspecialchars($letter['gesture_image']) ?>" alt="Жест" height="100">
                            <?php endif; ?>
                        </td>
                        <td><?= nl2br(htmlspecialchars($letter['description'])) ?></td>
                        <td class="d-flex">
                            <a href="/admin/alphabet/edit?id=<?= $letter['id'] ?>" class="btn btn-sm btn-primary me-1 rounded-4">
                                Редагувати
                            </a>
                            <form method="POST" action="/admin/alphabet/delete" class="d-inline" onsubmit="return confirm('Видалити літеру?');">
                                <input type="hidden" name="id" value="<?= $letter['id'] ?>">
                                <button type="submit" class="btn btn-sm btn-danger rounded-4">Видалити</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <div class="alert alert-info">Немає літер у списку.</div>
<?php endif; ?>