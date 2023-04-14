<?php
require("../connection/conn.php");
session_start();
if(!isset($_POST['email'])){
    header("Location: ../views/index.php");
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $stmt = $pdo->prepare('SELECT * FROM agent WHERE email = :email AND password = :password');
$stmt->execute(['email' => $email, 'password' => $password]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($row) {
    if($row['status']!='active'){
        $_SESSION['inactive_user'] = "This account is no longer functional";
        header("Location: ../views/index.php");
    }
    $_SESSION['agent_id'] = $row['code_agent'];
    $_SESSION['agency_id'] = $row['code_agency'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['username'] = $row['name'];

    header('Location: ../views/dashboard.php');
} else if(!$row) {
    $_SESSION['error'] = "Invalid Email or password";
    header('Location: ../views/index.php');
}
exit();
}
