<?php
require_once("../connection.php");
    $con= connect();
    //var_dump($_POST['status']);
    $matricule=$_POST['matricule'];
    $marque=$_POST['marque'];
    $model=$_POST['model'];
     switch ($_POST['status']) {
        case 'libre':
            $status ='libre';
            break;
        case 'reservé':
            $status ='reservé';
            break;
        
        default:
            $status ='en maintenance';
            break;
     }
    $photo=$_POST['photo'];
    $annee=$_POST['annee'];
    

    $req="UPDATE voiture 
SET marque = '$marque', model = '$model', status = '$status', photo = '$photo', annee_de_fabrication = '$annee' 
WHERE matricule ='$matricule' ";
    if($con->query($req))echo"<script>alert('voiture modifier')</script>";
    else echo"<script>alert('req error')</script>";
?>