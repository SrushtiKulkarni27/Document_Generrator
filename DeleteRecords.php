<?php
session_start();
$con =mysqli_connect('localhost','root','','excelimport');
if($con->connect_error){
    die("connection failed".$con->connect_error);

}

$sql="DELETE   FROM  students";

if($con->query($sql)==TRUE){
    $_SESSION['message']="Records deleted successfully";
    header('Location:importindex.php');
    exit(0);
   
}
else{
   $_SESSION['message']="Not deleted successfully";
          header('Location:importindex.php');
          exit(0);
    
}
$con->close();
?>