<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'SayIt' ?></title>
</head>

<body>
    <header>
        <a href="/">Home</a>
        <a href="/alphabet">Alphabet</a>
    </header>

    <main>
        <?php require $view; ?>
    </main>

    <footer>
        <p>&copy; <?= date('Y') ?> SayIt</p>
    </footer>
</body>

</html>