<?php

return [
    #'dsn' => 'mysql:host=127.0.0.1;dbname=bug_report_app;charset=utf8;port=3306;'
    'pdo' => [
        'driver' => 'mysql',
        'host' => '127.0.0.1',
        'db_name' => 'bug_report_app', // 'bug_report_app', bug_app_testing
        'db_username' => 'root',
        'db_user_password' => 'secret',
        'default_fetch' => PDO::FETCH_OBJ,
    ],
    'mysqli' => [
        'host' => '127.0.0.1',
        'db_name' => 'bug_report_app',
        'db_username' => 'root',
        'db_user_password' => 'secret',
        'default_fetch' => MYSQLI_ASSOC,
    ],
];