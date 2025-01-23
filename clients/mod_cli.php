<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modifier clients</title>
</head>
<body>
    <div class="body">
        <h1>modifier clients</h1>
        <form action="mod_cli.php" method="post">
            <div class="formline">
                <label for="num_permit">numero de permit:</label>
                           
                <input type="num" name="num_permit" length="8">
            </div>
            <div class="formline">
                <input type="submit"id="btn" value="changer">
            </div>
        </form>
    </div>
    <?php
    //var_dump();
    if(isset($_POST['num_permit'])){
                require_once("../connection.php");
                $con=connect();
                $num_permit=$_POST['num_permit'];
                $vs= $con->query("select * from clients where num_permit ='$num_permit' ");
               
                if(!$vs) echo "<script>alert('eroor de req')</script>";
                else 
                 foreach ($vs as $v) {
    ?>  
                <div class="body">

                    <form action="mod2_cli.php" method="post">
                        <div class="formline">
                            <label for="num_permit">num_permit</label>
                            <input value="<?=$v['num_permit'] ?>" type="text" name="num_permit" readonly>
                        </div>
                        <div class="formline">
                            <label for="nom">nom</label>
                            <input value="<?= $v['nom'] ?>" type="text" name="nom" required>
                        </div>
                    <div class="formline">
                        <label for="prenom">Modèle</label>
                        <input value="<?= $v['prenom'] ?>" type="text" name="prenom" required>
                    </div>
                    
                    <div class="formline">
                        <label for="tel">num telephone</label>
                        <input value="<?= $v['tel'] ?>" type="number" name="tel" required>
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