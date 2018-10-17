<?php

return [
    'database' => [
        'dsn' => getenv('DB_DSN') ?: 'mysql',
        'user' => getenv('DB_USER') ?: 'root',
        'pass' => getenv('DB_PASSWORD') ?: ''
    ]
];
