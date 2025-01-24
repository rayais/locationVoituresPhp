<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../stylec.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reservation</title>
</head>
<body>
    <div class="body">
        <h1>voitures disponible</h1>
        <?php 
        require_once("../connection.php");
        $con=connect();
        $req="select * from voiture where status='disponible'";
        if(!$con->query($req)) echo "req prob";
        else {
            foreach($con->query($req) as $voi){
        $mat=$voi['matricule'];
        $pu=$voi['prix'];
    echo "<div class='card' style='border:1px solid green;'>
          <img src='../voitures/".$voi['photo']."' alt='' />
          <ul>
          <li>".$voi['matricule']."</li>
            <li>".$voi['marque']."</li>
            <li>".$voi['model']."</li>
            <li>".$voi['annee_de_fabrication']."</li>
            <li>".$voi['prix']."DT</li>
          </ul>
          <div class='prix'>
          <h3 style='color: 'green';'>".$voi['status']."</h3>
          <a href='./reserver.php?mat=$mat&pu=$pu'>Réservée</a>
          </div>
        </div>
    ";
    }
        }
        ?>
    </div>
</body>
</html>