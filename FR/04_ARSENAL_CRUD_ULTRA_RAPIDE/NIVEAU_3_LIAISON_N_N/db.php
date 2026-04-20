<?php
// db.php - MAJ 20/04/2026
try {
    $pdo = new PDO("mysql:host=localhost;dbname=bts_niveau3;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) { die("Erreur : " . $e->getMessage()); }
?>