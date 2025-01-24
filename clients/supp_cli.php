<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="../style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer un client</title>
</head>
<body>
    <div class="body">
        <h1>Supprimer un client</h1>
        <form action="supp_cli.php" method="post">
            <div class="formline">
                <label for="num_permit">Numero de permit</label>
                           
                <input type="text" name="num_permit">
            </div>
            <div class="formline">
                <input type="submit" value="Supprimer">
            </div>
        </form>
    </div>
</body>
</html>
<?php 
if(isset($_POST['num_permit'])){
                require_once("../connection.php");
                $con=connect();
                $num_permit=$_POST['num_permit'];
                $req= ("delete from voiture where num_permit ='$num_permit' ");
             if($con->query($req))echo "<script>alert('voiture supprimée') </script>";
            else echo "<script>alert('req error') </script>";
            }
?>