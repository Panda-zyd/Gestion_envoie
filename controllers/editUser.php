<?php
session_start();
include("../connection/conn.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Document</title>
</head>
<style>
  <?php include("../styles/dashboard.css") ?>
</style>

<body>
  <?php include("../components/header.admin.php") ?>
  <?php
  $stmt = $pdo->prepare("SELECT * FROM agent WHERE code_agent = :codeAGENT");
  $stmt->execute(['codeAGENT' => $_POST['code_agent']]);
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  ?>
  <div class="main">
    <div class="form-control">
      <form method="POST">
        <label for="id" class="form-label">ID:</label>
        <input type="text" name="id" class="form-control" disabled value="<?php echo $_POST['code_agent'] ?>" id="">

        <label for="name" class="form-label">Name:</label>
        <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo $row['name'] ?>" id="">

        <label for="email" class="form-label">Email:</label>
        <input type="email" name="email" class="form-control" placeholder="email" value="<?php echo $row['email'] ?>"
          id="">

        <label for="password" class="form-label">Password:</label>
        <input type="text" name="password" class="form-control" placeholder="password"
          value="<?php echo $row['password'] ?>" id="">

        <label for="status" class="form-label">Status:</label>
        <select name="status" class="form-control" id="">
          <?php $stmt2 = $pdo->prepare("SHOW COLUMNS FROM agent LIKE `status`");?>
          <option value="<?php echo $row['status'] ?>"><?php echo $row['status'] ?></option>
          <option value="<?php echo $row['status'] ?>"><?php echo $row['status'] ?></option>
          <option value="<?php echo $row['status'] ?>"><?php echo $row['status'] ?></option>
        </select>

        <button type="submit" class="btn btn-primary" name="confirm">Confirm changes</button>
        <a href="../views/userControl.php" class="btn btn-primary" name="confirm">Cancel</a>
      </form>
    </div>
  </div>
</body>

</html>