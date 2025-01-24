<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../stylec.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>réserver</title>
</head>
<body>
    <div class="body">
        <div>
        <h1>voiture sélectionnée</h1>
            <?php 
           
           require_once("../connection.php");
           $con=connect();
           if(isset($_GET['mat']))
           {$mat=$_GET['mat'];
           $pu=$_GET['pu'];}
           else{
            $mat=$_POST['mat'];
            $pu=$_POST['pu'];
           }
           
           $req="select * from voiture where matricule='$mat'";
           $vois=$con->query($req);
           if(!$vois) echo "<h1>pas des voitures</h1><br> ";
           else {
               foreach ($vois as $voi) {
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
                   </div>
                   </div>
                   ";
                }
            }
        
        ?>
        <h1>Sélectionnée une personne</h1>
        <form action="reserver.php" method="post">
            <?php 
            echo "<input type='hidden' name='mat' value=".$mat.">";
            echo "<input type='hidden' name='pu' value=".$pu.">";
            ?>
            
            <div class="formline">
                <label for="critere">choisir un critére</label>
                <select name="critere" id="">
                    <option value="num_permit">num permit</option>
                    <option value="nom">nom</option>
                    <option value="prenom">prenom</option>
                    <option value="tel">numero telephone</option>
                    
                </select>
            </div>
            <div class="formline">
                <label for="valeur">valeur</label>
                
                <input type="text" name="valeur">
            </div>
            <div class="formline">
                <?php $v=false;?>
                <input type="submit" value="chercher">
            </div>
        </form>
        <?php
    if(isset($_POST['critere'])){
        
        $critere=$_POST['critere'];
        $val=$_POST['valeur'];
        echo $critere;
        $list= $con->query("select * from clients where $critere like '%$val%' ");
        $mat=$_POST['mat'];
        $pu=$_POST['pu'];
        if(!$list) echo "<script>alert('eroor de req')</script>";
        else 
        {
            foreach($list as $voi){
                $p=$voi['num_permit'];
                echo "<div class='card' style='border:1px solid ;'>
          
          <ul>
          <li>prenom: ".$voi['prenom']."</li>
          <li>nom: ".$voi['nom']."</li>
          <li>tel: ".$voi['tel']."</li>
          <li>permit: ".$voi['num_permit']."</li>
          </ul>
           <h6 ><a href=".$voi['permit']." download>télécharger permit</a></h6>
           <h2 ><a href='./reserverf.php?p=$p&m=$mat&pu=$pu'>Réserver</a></h2>
        </div>
    ";
            }}}
            ?>
            
    </div>
</div>
</body>
</html>