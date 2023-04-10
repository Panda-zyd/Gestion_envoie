<?php
require("../connection/conn.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $stmt = $pdo->prepare('SELECT * FROM agent WHERE email = :email AND password = :password');
$stmt->execute(['email' => $email, 'password' => $password]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row) {
    $stmt2 = $pdo->prepare('SELECT `name` FROM agent WHERE `email` = :email');
    $stmt3 = $pdo->prepare('SELECT `code_agent` FROM agent WHERE `email`=:email');
    $stmt4 = $pdo->prepare('SELECT `code_agency` FROM agent WHERE `email`=:email');
    $stmt2->execute(['email' => $email]);
    $stmt3->execute(['email' => $email]);
    $stmt4->execute(['email' => $email]);
    $agent_id = $stmt3->fetchColumn();
    $username = $stmt2->fetchColumn();
    $agency_id = $stmt4->fetchColumn();
    $_SESSION['username'] = $username;
    $_SESSION['agent_id'] = $agent_id;
    $_SESSION['agency_id'] = $agent_id;
    $_SESSION['email'] = $email;
    header('Location: ../views/dashboard.php');
} else {
    $_SESSION['error'] = "Invalid Email or password";
    header('Location: ../views/index.php');
}
exit();
}
