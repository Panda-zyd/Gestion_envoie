<div style="display: none" class="msg">
<?php
require("../connection/conn.php");
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
</div>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="C:/Program Files/bootstrap-5.1.3-dist/css/bootstrap.min.css">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion commandes</title>
</head>
<style>
  <?php require("../styles/style.css") ?>
</style>
<body>
<div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Login</h3>
                        <p>Fill in the data below.</p>
                        <form class="requires-validation" action="../controllers/login.php" method="post">
                            <div class="col-md-12">
                                <input onchange="check()" class="text-dark form-control" type="email" name="email" placeholder="E-mail Address" required>
                                 <div class="valid-feedback">Email field is valid!</div>
                                 <div class="invalid-feedback">Email field cannot be blank!</div>
                            </div>
                           <div class="col-md-12">
                              <input onchange="check()" class="text-dark form-control" type="password" name="password" placeholder="Password" required>
                               <div class="valid-feedback">Password field is valid!</div>
                               <div class="invalid-feedback">Password field cannot be blank!</div>
                           </div>
                           <div>
                            <?php if(isset($_SESSION['error'])){
                              echo '<div class="text-danger pt-2">'.$_SESSION['error'] . '</div>';
                              unset($_SESSION['error']);
                            } ?>
                           </div>
                            <div class="form-button mt-3">
                                <button id="submit" type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <!-- <form
    action="../controllers/login.php"
    class="container form-control d-flex h-100 row g-3"
    method="post"
  >
    <div class="col">
    <div class="col-lg-6 mx-auto">
      <label for="email" class="form-label"> Email: </label>
      <input
        placeholder="abc@gmail.com"
        type="email"
        name="email"
        id="email"
        required
      />
    </div>
    <div class="col-lg-6 mx-auto">
      <label for="password" class="form-label"> Password: </label>
      <input
        class="input"
        placeholder="Password"
        type="password"
        name="password"
        id="password"
        required
      />
    </div>
    <div class="col-lg-6 mx-auto">
      <input type="submit" value="Login" class="btn btn-primary mb-3" />
    </div>
    </div>
  </form> -->
</body>
<script>
function check() {
  "use strict";
  const forms = document.querySelectorAll(".requires-validation");
  Array.from(forms).forEach(function (form) {
    if (!form.checkValidity()) {
      event.preventDefault();
      event.stopPropagation();
    }
    form.classList.add("was-validated");
  });
}


</script>
</html>