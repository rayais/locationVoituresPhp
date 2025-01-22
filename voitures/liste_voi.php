<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="../style.css">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>voitures</title>
  </head>
  <body>
    <div class="body">
      <h1>liste des voiture </h1>
      <div class="liste">
      <?php
      require_once("../connection.php");
      $con=connect();
      $req1="select * from voiture ";
      if($con->query($req1)){
      foreach($con->query($req1) as $voi){
        if ($voi['status']=='libre') {
            $color='green';
        }else $color='red';
    echo "<div class='card' style='border:1px solid ".$color.";'>
          <img src=".$voi['photo']." alt='' />
          <ul>
            <li>".$voi['marque']."</li>
            <li>".$voi['model']."</li>
            <li>".$voi['annee_de_fabrication']."</li>
          </ul>
          <h3 >".$voi['status']."</h3>
        </div>
    ";
    }}
    
      ?>
        
        <!-- <div class="card">
          <img src="" alt="" />
          <ul>
            <li>marque</li>
            <li>model</li>
            <li>année de fabrication</li>
          </ul>
          <h3>statut</h3>
        </div> -->
      </div>
    </div>
  </body>
</html>
