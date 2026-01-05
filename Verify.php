<?php
  session_start();
  
  $conn=mysqli_connect("localhost","root","","excelimport");
  $Doc_Id=$_GET['Doc_Id'];

  $query="SELECT * FROM  document_issued WHERE Doc_Id=' $Doc_Id'  ";
  $result= mysqli_query($conn,$query);


  
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify</title>
    
    <style>

        table{
            border-collapse:collapse;
        margin-left: 200px;
        margin-right: 70px;
        margin-top:40px;
        width:70%;
        position: relative;
        }
        tr,td,th{
        border:1.5px solid black;
        padding:15px;
        font-weight:bold;
       
      }
      a {
  text-decoration: none;
  display: inline-block;
  padding: 8px 16px;
}

a:hover {
  background-color: #ddd;
  color: black;
}

.previous {
  background-color: #035865;
  color: white;
}
   
.align{
  margin-left:450px;
  position: absolute;
  bottom: 320px;
  font-weight:bold;  
  font-size:40px;
  
  
}
        </style>
  
</head>

<!--body part-->
<body >

<?php
     $usernameprofile= $_SESSION['user_name'];
        if($usernameprofile==true)
        {
     
        }
        else{
         header("Location: index.php");
        }
?>
<a href="home.php" class="previous">&laquo; Previous</a><br><br>
 
<table>
  
<tr>
<th>Document Id</th>
<th>Roll No</th>
<th>Name</th>
<th>Document Type</th>
<th>Date</th>
</tr>
<tr>
    <?php
   if (mysqli_num_rows($result) == 0) {
    ?> 
       <span class="align" ><?php echo"No records Found"?></span>
                 
                 <?php
  } else {
 while($row= mysqli_fetch_assoc($result))
 {
  
     ?>
     
 <td> <?=$row['Doc_Id'];?></td>
 <td> <?=$row['Roll_no'];?></td>
 <td> <?=$row['sname'];?></td>
 <td> <?=$row['Doc_type'];?></td>
 <td><?=$row['Date'];?></td>
     </tr>
 <?php
 }
}
  ?>

</table>







</body>
</html>