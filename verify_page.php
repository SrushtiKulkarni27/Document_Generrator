<?php
session_start();
$con=mysqli_connect("localhost","root","","excelimport");
$usernameprofile= $_SESSION['user_name'];
if($usernameprofile==true)
{

}
else{
 header("Location: index.php");
}

$query="SELECT * FROM students ";
$query_run= mysqli_query($con,$query);
$row = mysqli_fetch_assoc($query_run);

$Doc_Id= $row['id'];
$Roll_no=$row['rollno'];
$sname=$row['name'];
$Doc_type="Bonafide";


$query="INSERT INTO document_issued(Doc_Id,Roll_no,sname,Doc_type) VALUES( '$Doc_Id','$Roll_no','$sname','$Doc_type')";
$result=mysqli_query($con, $query);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
     <button  formaction="LC rollno.php"   class="LC" name="lcButton" > Leaving Certificate</button> <br><br><br><br>
        <button  formaction="15ARollno.php" class="15A From"  name="15AButton">15A From  </button><br><br><br><br>
        <button  formaction="BonaRollno.php" class="Bonafide"  name="BonaButton"> Bonafide</button>  <br><br><br><br>
</form>

    <?php
    if(isset($_POST['lcButton']))
    {
        
    }
    ?>
</body>
</html>
