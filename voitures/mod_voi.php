<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modifier voiture</title>
</head>
<body>
    <div class="body">
        <h1>modifier voiture</h1>
        <form action="mod_voi.php" method="post">
            <div class="formline">
                <label for="matri">matricule</label>
                           
                <input type="text" name="matri">
            </div>
            <div class="formline">
                <input type="submit"id="btn" value="changer">
            </div>
        </form>
    </div>
    <?php
    //var_dump();
    if(isset($_POST['matri'])){
                require_once("../connection.php");
                $con=connect();
                $matricule=$_POST['matri'];
                $vs= $con->query("select * from voiture where matricule ='$matricule' ");
               
                if(!$vs) echo "<script>alert('eroor de req')</script>";
                else 
                 foreach ($vs as $v) {
    ?>  
                <div class="body">

                    <form action="mod2_voi.php" method="post">
                        <div class="formline">
                            <label for="matricule">Matricule</label>
                            <input value="<?=$v['matricule'] ?>" type="text" name="matricule" readonly>
                        </div>
                        <div class="formline">
                            <label for="marque">Marque</label>
                            <input value="<?= $v['marque'] ?>" type="text" name="marque" required>
                        </div>
                    <div class="formline">
                        <label for="model">Modèle</label>
                        <input value="<?= $v['model'] ?>" type="text" name="model" required>
                    </div>
                    <div class="formline">
                        <label for="photo">Photo</label>
                        <input type="file" name="photo" accept="image/*">
                    </div>
                    <div class="formline">
                        <label for="annee">Année de fabrication</label>
                        <input value="<?= $v['annee_de_fabrication'] ?>" type="number" name="annee" min="2010" max="<?= date('Y') ?>" required>
                    </div>
                    <div class="formline">
                        <label for="status">Statut</label>
                        <input type="radio" name="status" value="Disponible" <?= $v['status'] == 'Disponible' ? 'checked' : '' ?>> Disponible
                        <input type="radio" name="status" value="Réservé" <?= $v['status'] == 'Réservé' ? 'checked' : '' ?>> Réservé
                        <input type="radio" name="status" value="En maintenance" <?= $v['status'] == 'En maintenance' ? 'checked' : '' ?>> En maintenance
                    </div>
                    <div class="formline" >
                        <input type="submit"id="btn" value="Modifier">
                        <input type="reset"id="btn" value="Annuler">
                    </div>
                </form>
            </div>
                <?php
                }

      }
                ?>
</body>
</html>