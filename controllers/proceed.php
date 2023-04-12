<?php
require("../connection/conn.php");
session_start();
ob_start();
var_dump($_SESSION);
echo "<hr />";
var_dump($_POST);
echo "<hr/>";
var_dump($_SERVER);
if (isset($_SESSION)){
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $expediteur = $_POST['expediteur'];
        $type = $_POST['type'];
        $price = $_POST['price'];
        $destination = $_POST['destination'];
        $date = $_POST['date'];
        $code_agent = $_POST['code_agent'];
        $code_agency = $_POST['code_agency'];
        $fragile = $_POST['fragile'];
        $cache_en_delivery = $_POST['cache_en_delivery'];
        if(isset($fragile)){
            $fragile = 1;
        }else{
            $fragile = 0;
        }
        if(isset($cache_en_delivery)){
            $cache_en_delivery = 1;
        }else{
            $cache_en_delivery = 0;
        }
        $stmt = $pdo->prepare("INSERT INTO `package`(`expediteur`, `type`, `prix`, `destination`, `date`, `code_agency`, `code_agent`, `fragile`, `cache_en_delivery`) VALUES (:expediteur,:type,:price,:destination,:date,:code_agent,:code_agency,:fragile,:cache_en_delivery)");
        $stmt->execute([
            'expediteur' => $expediteur,
            'type' => $type,
            'price' => $price,
            'destination' => $destination,
            'date' => $date,
            'code_agent' => $code_agent,
            'code_agency' => $code_agency,
            'fragile' => $fragile,
            'cache_en_delivery' => $cache_en_delivery
        ]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if(isset($row)){
            $_SESSION['message_success'] = "votre commande a été envoyée avec succès";
            $_SESSION['worked'] = true;
        } else{
            $_SESSION['message_failed'] = "Une erreur est survenue";
            $_SESSION['worked'] = false;
        }
        header("Location: ../views/dashboard.php");
    }
}
ob_flush();
