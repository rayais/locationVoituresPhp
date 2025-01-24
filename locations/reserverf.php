<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../stylec.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
require_once("../connection.php");
$con=connect();
  
if(isset($_GET['m']))
{$mat=$_GET['m'];
$permit=$_GET['p'];
$pu=$_GET['pu'];}  
if(isset($_POST['d_dep']))
{   $mat=$_POST['mat'];
$permit=$_POST['p'];
$pu=$_POST['pu'];}
?>
    <div class="body">
        <h1>Durée du location</h1>
        <form action="reserverf.php" method='post'>
            <div class="formline">
                <label for="d_dep">date de commencement</label>
                <input type="date" name="d_dep" id="">
            </div>
            <div class="formline">
                <label for="d_dep">date du fin de contrat</label>
                <input type="date" name="d_fin" id="">
            </div>
            <?php 
            echo "<input type='hidden' name='mat' value=".$mat.">";
            echo "<input type='hidden' name='pu' value=".$pu.">";
            echo "<input type='hidden' name='p' value=".$permit.">";
            ?>
            <div class="formline">
                <input type="submit"  value="réserver">
                <input type="reset"  value="réserver">
            </div>
        </form>
    </div>
<?php
if(isset($_POST['d_dep']))
{   $mat=$_POST['mat'];
$permit=$_POST['p'];
$pu=$_POST['pu'];
    $d_dep=$_POST['d_dep'];
    $d_fin=$_POST['d_fin'];

   $start_date = date_create($d_dep);
    $end_date = date_create($d_fin);


$dur = date_diff($start_date, $end_date)->format('%a');
$amount= $dur*$pu;
$req="insert into locations(matricule, num_permit, date_com, date_fin, amount) 
 values 
('$mat','$permit','$d_dep','$d_fin','$amount')";
if($con->query($req))
    {
    echo "<script> alert('reservation enregistrer avec sucée!') </script>";
    header("location:reserve.php");
}
else 
echo "req error";

}
?>
</body>
</html>

