<?php 
require("../connection/conn.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <title>Localhost</title>
  </head>
  <style>
    <?php include("../styles/style.css"); ?>
  </style>
</html>
<body style="overflow-y:auto">
  <div class="form-body">
    <div class="row">
      <div class="form-holder">
        <div class="form-content">
          <div class="form-items">
            <h3>Proceed The order</h3>
            <p>Fill in the data below.</p>
            <form
              class="requires-validation"
              action="../controllers/proceed.php"
              method="post"
            >
              <div class="col-md-12">
                <input 
                  class="text-dark from-control"
                  name="expediteur"
                  type="text"
                  placeholder="sender's name"
                  required
                />
              </div>
              <div class="row g-3" style=" display:flex!important;justify-content:space-between!important;">
                <div class="col">
                <input 
                  value="<?php echo $_GET['type']; ?>"
                  class="new-inputleft text-dark from-control"
                  name="expediteur"
                  type="text"
                  placeholder="Type"
                  disabled
                />
                </div>
                <div class="col">
                <input 
                  value="<?php echo $_GET['price']; ?>"
                  class="new-inputright text-dark from-control"
                  name="expediteur"
                  type="text"
                  placeholder="Prix"
                  disabled
                />
                </div>
              </div>
              <div class="col-md-12">
                <select
                  class="text-dark from-select"
                  name="expediteur"
                  type="text"
                  placeholder="Destination"
                  required
                >
                  <option value="" disabled selected>
                    select a Destination
                  </option>
                  <?php 
                    $stmt = $pdo->prepare("SELECT * from `agency`");
                    $stmt->execute();
                    $row = $stmt->fetchAll();
                    if($row){
                      // echo $row["nom_agency"];
                      foreach($row as $rows){
                        echo "<option value=".$rows['city'].">".$rows['nom_agency']."</option>";
                    }}
                  ?>
                </select>
              </div>
              <div class="col-md-12">
                <input type="date" id="day-input" name="date" min="2023-01-01">
              </div>
              <div class="col-md-12">
                <div class="row g-3" style=" display:flex!important;justify-content:space-between!important;">
                  <div class="col">
                  <input type="text" name="code_agent" id="" value="<?php echo $_SESSION['agent_id'] ?>" disabled>
                  </div>
                  <div class="col">
                  <input type="text" name="code_agency" id="" value="<?php echo $_SESSION['agency_id'] ?>" disabled>
                  </div>
                </div>
              </div>
              <div class="form-button mt-3">
                <a href="dashboard.php" class="btn btn-danger">< Go back</a>
                <button id="submit" type="submit" class="btn btn-primary">
                  Porceed
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
