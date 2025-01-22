<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter voiture</title>
</head>
<body>
    <div class='body'>
        <h1>Ajouter une voiture</h1>
        <form action="ajout_voi.php" method='post' enctype="multipart/form-data">

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
                <label for="annee">annee de fabrication</label>
                <input type="number" name="annee" length="4" min="2010" <?php echo "max=".date("20y"); ?>>
            </div>
            <div class="formline">
                <label for="photo">photo</label>
                <input type="file" name="photo" >
            </div>
            <div class="formline">
                <input type="submit"id="btn" value="ajouter">
                <input type="reset"id="btn" value="annuler">
            </div>
        </form>
    </div>
    <?php
    require_once("../connection.php");
    $con= connect();
    
    if(isset ($_POST['pmat']))
    {
    // Retrieve file details
    $fileTmpPath = $_FILES['photo']['tmp_name']; // Temporary file path
    $fileName = $_FILES['photo']['name'];       // Original file name
    $fileSize = $_FILES['photo']['size'];       // File size in bytes
    $fileType = $_FILES['photo']['type'];       // MIME type
    $fileError = $_FILES['photo']['error'];     // Error code

    
    $Ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $uploadDir = './uploads/';
    $newFileName = uniqid() . '.' . $Ext;
    $photo = $uploadDir . $newFileName;

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    if (move_uploaded_file($fileTmpPath, $photo)) {
        echo "File uploaded successfully! <br>";
        
    } else {
        echo "Error: Could not move the file to the upload directory.";
    }

    {$pmat=$_POST['pmat'];
    $gmat=$_POST['gmat'];
    $marque=$_POST['marque'];
    $model=$_POST['model'];
    $status="libre";
    //$photo=$_FILES['photo']['tmp_name'].".jpg";
    var_dump($_FILES['photo']['error']);
    $annee=$_POST['annee'];
    $matricule=$pmat."tu".$gmat;
    $req="insert into voiture values(
    '$matricule','$marque','$model','$status','$photo','$annee')";
    if($con->query($req))
    echo "<script>alert('voiture ajouter avec succée')</script>";
    else echo "<script>alert('problemme in req')</script>";}
    }?>
</body>
</html>