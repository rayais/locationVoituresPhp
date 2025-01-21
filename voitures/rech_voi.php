<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trouver voiture</title>
</head>
<body>
    <div class="body">
        <h1>Trouver voiture(s)</h1>
        <form action="rech_voi.php" method="post">
            <div class="formline">
                <label for="critére">choisir un critére</label>
                <select name="critere" id="">
                    <option value="matricule">matricule</option>
                    <option value="marque">marque</option>
                    <option value="model">model</option>
                    <option value="status">statut</option>
                    <option value="annee_de_fabrication">année de fabrication</option>
                </select>
            </div>
            <div class="formline">
                <label for="valeur">valeur</label>
                
                <input type="text" name="valeur">
            </div>
            <div class="formline">
                <input type="submit" value="chercher">
            </div>
        </form>
    </div>
    <?php
    if(isset($_POST['critere'])){
        require_once("../connection.php");
        $con=connect();
        $critere=$_POST['critere'];
        $val=$_POST['valeur'];
        $list= $con->query("select * from voiture where $critere like '%$val%' ");
        
        if(!$list) echo "<script>alert('eroor de req')</script>";
                else 
                {
      foreach($list as $voi){
        if ($voi['status']=='libre') {
            $color='green';
        }else $color='red';
        echo "<div class='card' style='border:1px solid ".$color.";'>
          <img src='../photos/".$voi['photo']."' alt='' />
          <ul>
            <li>".$voi['marque']."</li>
            <li>".$voi['model']."</li>
            <li>".$voi['annee_de_fabrication']."</li>
          </ul>
          <h3 >".$voi['status']."</h3>
        </div>
    ";
    }}}
                ?>
</body>
</html>