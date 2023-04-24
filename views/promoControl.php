<?php
require("../connection/conn.php");
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: ../views/index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>User Edit</title>
</head>
<style>
  <?php include("../styles/dashboard.css"); ?>
  <?php include("../styles/side_admin.css"); ?>
    body{
        overflow: hidden;
    }
</style>

<body>
  <?php include("../components/header.admin.php"); ?>
<div class="main">
    <?php include("../components/sidebar.admin.php"); ?>
<!--    <iframe src="../assets/histoiredelaposte.pdf" width="100%" height="100%"></iframe>-->
    <div class="promo"></div>
</div>
</body>