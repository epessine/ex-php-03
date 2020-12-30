<?php

declare(strict_types=1);

$pdo = null;

try
{
    $pdo = new PDO('mysql:host=localhost;dbname=ex-php-03', 'root', '');
}
catch (Exception $e)
{
    echo $e->getMessage();
    die();
}

return $pdo;