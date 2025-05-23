<?php

class Router
{
    public function dispatch($uri)
    {
        $path = parse_url($uri, PHP_URL_PATH);

        if ($path === '/') {
            // HomeController::index();
            $view = __DIR__ . '/../Views/Site/Home.php';
            $title = 'Home';

            require __DIR__ . '/../Views/Site/layout.php';
        } elseif ($path === '/users') {
            try {
                $pdo = Database::connect();
                $stmt = $pdo->query("SELECT * FROM users");
                while ($row = $stmt->fetch()) {
                    echo $row['id'] . " - " . $row['username'] . "<br>";
                }
            } catch (Exception $e) {
                echo "Database connection error: " . $e->getMessage();
                return;
            }
        } elseif ($path === '/alphabet') {
            // AlphabetController::index();
            $view = __DIR__ . '/../Views/Site/Alphabet.php';
            $title = 'Alphabet';

            require __DIR__ . '/../Views/Site/layout.php';
        } else {
            http_response_code(404);
            echo "404 Not Found";
        }
    }
}
