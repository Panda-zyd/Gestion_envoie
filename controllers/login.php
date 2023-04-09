<?php
require("../connection/conn.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the login form data
    $email = $_POST['email'];
    $password = $_POST['password'];
    // Check if the email and password are correct
    $stmt = $pdo->prepare('SELECT * FROM agent WHERE email = :email AND password = :password');
$stmt->execute(['email' => $email, 'password' => $password]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row) {
    // If the login info is correct, fetch the 'name' column value and store it in a variable
    $stmt2 = $pdo->prepare('SELECT `name` FROM agent WHERE `email` = :email');
    $stmt2->execute(['email' => $email]);
    $username = $stmt2->fetchColumn();

    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    header('Location: ../views/dashboard.php');
    exit;
} else {
    // If the login info is incorrect, redirect back to the login page with an error message
    $_SESSION['error'] = 'Invalid email or password';
    header('Location: ../views/index.php');
    exit;
}}
?>
