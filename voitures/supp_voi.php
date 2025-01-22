<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="body">
        <h1>Supprimer une voiture voiture</h1>
        <form action="supp_voi.php" method="post">
            <div class="formline">
                <label for="matri">Matricule</label>
                           
                <input type="text" name="matri">
            </div>
            <div class="formline">
                <input type="submit" value="Suprimer">
            </div>
        </form>
    </div>
</body>
</html>
<?php 
if(isset($_POST['matri'])){
                require_once("../connection.php");
                $con=connect();
                $matricule=$_POST['matri'];
                $req= ("delete from voiture where matricule ='$matricule' ");
             if($con->query($req))echo "<script>alert('voiture supprimée') </script>";
            else echo "<script>alert('req error') </script>";
            }
?>