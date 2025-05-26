<?php

return [
    'name' => $_ENV['APP_NAME'] ?? 'MyApp',
    'debug' => filter_var($_ENV['DEBUG'] ?? false, FILTER_VALIDATE_BOOLEAN),
    'url' => $_ENV['BASE_URL'] ?? '',
];
