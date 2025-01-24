<?php
require_once("../connection.php");
    $con= connect();
    //var_dump($_POST['status']);
    $matricule=$_POST['matricule'];
    $marque=$_POST['marque'];
    $model=$_POST['model'];
    echo $_POST['status'];
     switch ($_POST['status']) {
        case 'Disponible':
            $status ='Disponible';
            break;
        case 'Réservé':
            $status ='Réservé';
            break;
        
        default:
            $status ='en maintenance';
            break;
     }
 
    $annee=$_POST['annee'];
    $prix=$_POST['prix'];
    

    $req="UPDATE voiture 
SET marque = '$marque',prix= '$prix', model = '$model', status = '$status', annee_de_fabrication = '$annee' 
WHERE matricule ='$matricule' ";
    if($con->query($req))echo"<script>alert('voiture modifier')</script>";
    else echo"<script>alert('req error')</script>";
header('Location: http://127.0.0.1/agence%20de%20location%20des%20voitures/voitures/liste_voi.php');
?>