<!--Home page where options are displayed-->
<?php
session_start();
$conn=mysqli_connect("localhost","root","","excelimport");
if(isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
  
    <title>HOME</title>
    <script type="text/javascript">
        function preventBack(){window.history.forward()};
        setTimeout("preventBack()",0);
        window.onunload=function(){null;}
        </script>
</head>
<body>
<h1>Documents</h1>
<form action="login.php" method="post">
   
   <?php if(isset($_GET['error'])) { ?>
    <p class="error"><?php echo $_GET['error']; ?></p>
   <?php }
   $usernameprofile= $_SESSION['user_name'];
   if($usernameprofile==true)
   {

   }
   else{
    header("Location: index.php");
   }
   
   
   ?>


<form method="post"> 
   
<div class="multi-button">

        <button formaction="LC rollno.php"  class="LC" name="lcButton" > Leaving Certificate</button> <br><br><br><br>
        <button formaction="15ARollno.php"  class="15A From"  name="15AButton">15A From  </button><br><br><br><br>
        <button formaction="BonaRollno.php" class="Bonafide"  name="BonaButton"> Bonafide</button>  <br><br><br><br>
        <button formaction="importindex.php" class="Upload files"  > Upload Files</button><br><br><br><br>
        <button formaction="verify_id.php"  class="Verify "> Verify</button>
       

      </div>
</form>


    
    <a href="logout.php">Logout</a>

<?php 
}
else{
    header("Location: index.php");
    exit();

}
?>

</body>
</html>