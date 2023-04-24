<?php
try($stmt->execute($querry)){
    $result = fetch(PDO::FETCH_ASSOC);
} catch(PDOException $e){
    header('Location: index.php');
}
header("Location: home.php");
