<?php
require_once("../connection.php");
    $con= connect();
    //var_dump($_POST['status']);
    $num_permit=$_POST['num_permit'];
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    
 
    $tel=$_POST['tel'];
    

    $req="UPDATE clients 
SET nom = '$nom', prenom = '$prenom', tel = '$tel' 
WHERE num_permit ='$num_permit' ";
    if($con->query($req))echo"<script>alert('client modifier')</script>";
    else echo"<script>alert('req error')</script>";
header('Location: http://127.0.0.1/agence%20de%20location%20des%20voitures/clients/list_cli.php');
?>