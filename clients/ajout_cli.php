<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter client</title>
</head>
<body>
    <div class='body'>
        <h1>Ajouter client</h1>
        <form action="ajout_cli.php" method='post' enctype="multipart/form-data">

            <div class="formline">
                <label for="num_permit">num_permit</label>
                <input  type="num" name="num_permit" length="8">
            </div>
            <div class="formline">
                <label for="nom">nom</label>
                <input type="text" name="nom" >
            </div>
            <div class="formline">
                <label for="prenom">prénom</label>
                <input type="text" name="prenom" >
            </div>
            <div class="formline">
                <label for="tel">numero de telephone</label>
                <input type="number" name="tel" length="8">
            </div>
            <div class="formline">
                <label for="permit">charger copie de permit</label>
                <input type="file" name="permit" length="8">
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
    
    if(isset ($_POST['num_permit']))
    {
    // Retrieve file details
    $fileTmpPath = $_FILES['permit']['tmp_name']; // Temporary file path
    $fileName = $_FILES['permit']['name'];       // Original file name
    $fileSize = $_FILES['permit']['size'];       // File size in bytes
    $fileType = $_FILES['permit']['type'];       // MIME type
    $fileError = $_FILES['permit']['error'];     // Error code

    
    $Ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $uploadDir = './uploads/';
    $newFileName = uniqid() . '.' . $Ext;
    $permit = $uploadDir . $newFileName;

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    if (move_uploaded_file($fileTmpPath, $permit)) {
        echo "File uploaded successfully! <br>";
        
    } else {
        echo "Error: Could not move the file to the upload directory.";
    }

    {$num_permit=$_POST['num_permit'];
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $tel=$_POST['tel'];
    
    $req="insert into clients values(
    '$num_permit','$nom','$prenom','$tel','$permit')";
    if($con->query($req))
    echo "<script>alert('client ajouter avec succée')</script>";
    else echo "<script>alert('problemme in req')</script>";}
    }?>
</body>
</html>