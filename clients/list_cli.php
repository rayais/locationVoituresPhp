<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="../stylec.css">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>clients</title>
  </head>
  <body>
    <div class="body">
      <h1>liste des clients </h1>
      <div class="liste">
      <?php
      require_once("../connection.php");
      $con=connect();
      $req1="select * from clients ";
      if($con->query($req1)){
      foreach($con->query($req1) as $voi){
        
    echo "<div class='card' style='border:1px solid ;'>
          
          <ul>
          <li>prenom: ".$voi['prenom']."</li>
          <li>nom: ".$voi['nom']."</li>
          <li>tel: ".$voi['tel']."</li>
          <li>permit: ".$voi['num_permit']."</li>
          </ul>
           <h3 ><a href=".$voi['permit']." download>telecharger permit</a></h3>
        </div>
    ";
    }}
    
      ?>
        
        <!-- <div class="card">
          <img src="" alt="" />
          <ul>
            <li>nom</li>
            <li>prenom</li>
            <li>année de fabrication</li>
          </ul>
          <h3>statut</h3>
        </div> -->
      </div>
    </div>
  </body>
</html>
