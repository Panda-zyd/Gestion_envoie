<?php 
require("../connection/conn.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Document</title>
</head>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap');
  <?php require("../styles/dashboard.css"); ?>
  body{
    min-height: 100vh;
  }
  .main{
    height:100vh;
    width: 100%;
    display: flex;
    flex-direction: column;
  }
  .header{
    /* height: 80px */
  }
  .page{
    font-family: 'Montserrat', sans-serif;
    flex: 1;
    font-weight: 1000 !important;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .page form{
    margin-inline: 20px
  }
  .page form a{
    width: 200px;
    padding: 12px;
  }
  .page form a:hover{
    background-color: blue !important;
  }
</style>
<body>
  <div class="main">
  <?php include("../components/header.admin.php"); ?>
  <div class="page">
    <form action="../controllers/employees.php" method="post">
      <a class="btn btn-primary bg-primary" href="userControl.php" name="add_user">Manage Employees</a>
    </form>
    <form action="../controllers/addPromo.php" method="post">
      <a class="btn btn-primary bg-primary" href="promoControl.php" name="add_promo">Add Promo</a>
    </form>
  </div>
</div>
</body>
</html>