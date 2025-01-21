<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter voiture</title>
</head>
<body>
    <div class='body'>
        <h1>Ajouter une voiture</h1>
        <form action="ajout_voi.php" method='post'>

            <div class="formline">
                <label for="matricule">matricule</label>
                <input class="pm" type="num" name="pmat" length="3">
                تونس
                <input class="gm" type="num" name="gmat" length="4">
            </div>
            <div class="formline">
                <label for="marque">marque</label>
                <input type="text" name="marque" >
            </div>
            <div class="formline">
                <label for="model">model</label>
                <input type="text" name="model" >
            </div>
            <div class="formline">
                <label for="photo">photo</label>
                <input type="file" name="photo" >
            </div>
            <div class="formline">
                <label for="annee">annee de fabrication</label>
                <input type="number" name="annee" length="4" min="2010" <?php echo "max=".date("20y"); ?>>
            </div>
            <div class="formline">
                <input type="submit" value="ajouter">
                <input type="reset" value="annuler">
            </div>
        </form>
    </div>
    <?php
    require_once("../connection.php");
    $con= connect();
    //var_dump($con);
    if(isset ($_POST['pmat']))
    {$pmat=$_POST['pmat'];
    $gmat=$_POST['gmat'];
    $marque=$_POST['marque'];
    $model=$_POST['model'];
    $status="libre";
    $photo=$_POST['photo'];
    $annee=$_POST['annee'];
    $matricule=$pmat."tu".$gmat;
    $req="insert into voiture values(
    '$matricule','$marque','$model','$status','$photo','$annee')";
    if($con->query($req))
    echo "<script>alert('voiture ajouter avec succée')</script>";
    else echo "<script>alert('problemme in req')</script>";}
    ?>
</body>
</html>