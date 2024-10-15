<?php

$host = "";
$db = "";
$user = "";
$password = "";

try {
    $pdo = new PDO(" ", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (\Throwable $e) {
    die("Connection failed: " . $e->getMessage());
}