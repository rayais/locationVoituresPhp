<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../stylec.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trouver client</title>
</head>
<body>
    <div class="body">
        <h1>Trouver client(s)</h1>
        <form action="rech_cli.php" method="post">
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
                <input type="submit" value="chercher">
            </div>
        </form>
        <?php
    if(isset($_POST['critere'])){
        require_once("../connection.php");
        $con=connect();
        $critere=$_POST['critere'];
        $val=$_POST['valeur'];
        echo $critere;
        $list= $con->query("select * from clients where $critere like '%$val%' ");
        
        if(!$list) echo "<script>alert('eroor de req')</script>";
        else 
        {
            foreach($list as $voi){
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
            }}}
            ?>
            </div>
</body>
</html>