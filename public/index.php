<?php

declare(strict_types=1);

require_once '../autoload.php';


// Iniciamos la sesión
session_start();
setcookie(session_name(), session_id(), [
    'expires' => time() + 60*60, // 1 HORA
]);

require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . 'routes' . DIRECTORY_SEPARATOR . 'web.php';
