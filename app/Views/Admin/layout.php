<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <title>Admin — <?= $title ?? 'SayIt' ?></title>
</head>

<body>
    <nav>
        <a href="/admin">Головна</a>
        <a href="/admin/alphabet">Букви</a>
        <a href="/admin/signs">Жести</a>
    </nav>
    <main>
        <?php require $view; ?>
    </main>
</body>

</html>