<?php 
session_start();
include("../connection/conn.php");
if(!isset($_SESSION['email'])){
  header("Location: index.php");
};
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
  <?php include("../styles/dashboard.css") ?>
</style>
<body>
  <div id="root"></div>
  <div class='header'>
    <div>dashboard</div>
    <div class="user">
      <div class="welcome">Welcome <?php echo $_SESSION['username'] ?> </div>
      <div><button class="btn btn-danger" onclick="location.href='../controllers/logout.php'">Logout</button></div>
    </div>
</div>
<div class="main">
<div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>
                          Calculer le prix
                        </h3>
                        <form class="requires-validation" method="post">
                            <div class="col-md-12">
                                <input class="text-dark form-control"  value="<?php echo isset($_POST['poids']) ? $_POST['poids'] : ''; ?>" id="input" type="text" name="poids" placeholder="Poids" required>
                                <select name="type" id="type" required>
                                  <option value="kg">Kg</option>
                                  <option value="g">g</option>
                                </select>
                            </div>
                           <div>
                           </div>
                            <div class="form-button mt-3">
                                <button id="submit" type="submit" class="btn btn-primary">Afficher les prix</button>
                            </div>
                        </form>
                </div>
              </div>
              <div id="table">
                <table border=1>
                  <tr>
                    <th>Produit</th>
                    <th>Prix</th>
                    <th>Action</th>
                  </tr>
                  <tr>
                    <td>
                      colis
                    </td>
                    <td>
                    <?php 
                  if(isset($_POST['poids'])){
                    $poids = $_SESSION['poids'];
                    $stmt2 = $pdo->prepare('SELECT `price` FROM `tarif_par_produit_colis` WHERE `from` < :lepoids AND `to`>= :lepoids');
                    $stmt2->execute(['lepoids' => $poids]);
                    $row = $stmt2->fetch(PDO::FETCH_ASSOC);
                    if(!empty($row)){
                        echo "$row";
                    }
                        else{
                            echo $_SESSION['poids'];
                        }
                     }
                ?>
                    </td>
                    <td>
                      <a href="#" target="_self" rel="noopener noreferrer">proceed</a>
                    </td>
                  </tr>
                  <tr>
                    <td>courrier</td>
                    <td>
                        <?php
                        function calculate($poids, $type){
                            $stmt2 = $pdo->prepare('SELECT `price` FROM `tarif_par_produit_courier` WHERE `from` < :lepoids AND `to`>:lepoids');
                            $stmt2->execute(['lepoids' => $poids]);
                            $username = $stmt2->fetchColumn(0);
                            if(!empty($username)){
                                echo "$username";
                            }
                            else {
                                echo "<div> Not" . $poids, $type . "</div>";
                            }
                        }
                        if(isset($_POST['poids'])){
                            $poids = $_SESSION['poids'];
                            $type = $_SESSION['type'];
                            if($type != "kg") {
                                $poids = $poids / 1000;
                            }
                            calculate($poids, $type);
                        }
                        ?>
                    </td>
                    <td>
                      <a href="#" target="_self" rel="noopener noreferrer">proceed</a>
                    </td>

                  </tr>
                </table>
              </div>
        </div>
    </div>


</div>

</div>
</body>
<script src="../javascript/app.js"></script>
</html>