<?php
  session_start();
  
  $con=mysqli_connect("localhost","root","","excelimport");
  if(isset($_GET['Roll_No']))
  {
   $Roll_No=$_GET['Roll_No'];
   $query="SELECT * FROM  lcdata WHERE Roll_No ='$Roll_No'";
  $query_run=mysqli_query( $con, $query);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LC Certificate</title>
    <link rel="stylesheet"   href="LcStyle.css">
    <link rel="stylesheet" type="text/css" media="print" href="print.css">
    <link rel="stylesheet" href="css/all.min.css"/>
    <link rel="stylesheet" href="css/fontawesome.min.css"/>
    
       <style>
      table {
        border-collapse:collapse;
        margin-left: 70px;
        margin-right: 70px;
        width:85%;
        height:500px;
      
      }
      
      tr,td{
        border:1.5px solid black;
        padding:15px;
       
      }
   

.bold{
  font-weight: bold;
}
a {
  text-decoration: none;
  display: inline-block;
  padding: 9px 19px;
  margin-left:20px;
}

a:hover {
  background-color: #ddd;
  color: black;
}

.previous {
  background-color: #035865;
  color: white;
}

</style>
</head>

<!--body part-->
<body  class="watermark">

<?php
     $usernameprofile= $_SESSION['user_name'];
        if($usernameprofile==true)
        {
     
        }
        else{
         header("Location: index.php");
        }
?>


<div    class="main-container">
  <div class="container">
    <div class="main" id="element1">
    <img align="left" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSfxxqK3hsw85ajcSlhSpReKX_IDIJzPSElLqnd5oq-LNpgwmp0zrfnPLZnhl1kDoN4dcQ&usqp=CAU"
     width="140" height="140" alt="GPN Logo">
    </div>

    <div class="main1">
    <img  src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSfxxqK3hsw85ajcSlhSpReKX_IDIJzPSElLqnd5oq-LNpgwmp0zrfnPLZnhl1kDoN4dcQ&usqp=CAU" 
    width="140" height="140" alt="GPN Logo">
    </div>
<div id="invoice">
    <div>
    <h1 ><center><b>GOVERNMENT POLYTECHNIC NASHIK</b></center><h1>
    <h3 ><center>(An Autonomous Institute of Government of Maharashtra)<br>
                    Vide G.R.H.E.& E.D.No.WBP/1094/(2711)(161)/Voc.Date 9-1-95<br></center></h3>
    </div>

       

</div>
<br>
         <div id="box">
        <h1 class="boxed">Leaving Certificate</h1>
        </div>
        <?php
        if( mysqli_num_rows( $query_run)>0)
        {  
             foreach($query_run as $row)
             {
                ?>
                    <div class="right-align">
                    Sr.No:-<span><?=$row['srno'];?><br>
                    Roll No:- <span><?=$row['Roll_No'];?></span>
                    </div> 
                    <?php
                 }
             }
             else{
               echo"No record Found";
             }
            
             ?>
         <br>  <br> <br>
       
       <div class="main2">
         <p>No change in any entry in this certificate shall be made except by the authority issuing and any infringement of this requirement is liable to involve the imposition of a penalty even that of rustication.</p>
         </div>
       <br> 
<table>
   <?php
    if( mysqli_num_rows( $query_run)>0)
      {  
         foreach($query_run as $row)
         {
            ?>
<tr>
<td> 1</td>
 <td> Register No. of the Candidate</td>
 <td> <span class="bold"><?=$row['register_no'];?></span></td>
</tr>

<tr>
<td> 2</td>
<td>Name of the Candidate(In Full)</td>
<td><span class="bold"><?=$row['fullname'];?></span></td>
</tr>

<tr>
<td>3</td>
<td>Mother's Name</td>
<td><span class="bold"><?=$row['mother_name'];?></span></td>
</tr>

<tr>
<td> 4</td>
<td>Race,Cast & Sub Caste</td>
<td><span class="bold"> <?=$row['Race'];?></span> <span class="bold"> <?=$row['caste_SubCaste'];?></span></td>
</tr>

<tr>
<td> 5</td>
<td> Nationality</td>
<td style="font-weight:bold"> <?=$row['Nationality'];?></td>
</tr>

<tr>
<td> 6</td>
<td> Place of Birth</td>
<td><span class="bold"> <?=$row['place_of_birth'];?></span></td>
</tr>

<tr>
<td> 7</td>
<td> Date of Birth (According to the Christian Era in words and figures)</td>
<td><span class="bold"> <?=$row['Date_of_Birth'];?></span><span class="bold"> <?=$row['Birth_in_word'];?></span></td>
</tr>

<tr>
<td> 8</td>
<td>Institute/Polytechnic Last attended</td>
<td><span class="bold"> <?=$row['last_school'];?></span></td>
</tr>

<tr>
<td> 9</td>
<td> Date of Admission</td>
<td><span class="bold"><?=$row['adm_date'];?><span> </td>
</tr>

<tr>
<td> 10</td>
<td> Progress</td>
<td> <!--<input type="text" placeholder="Type here" class="textbox-design">--><span class="bold"><?=$row['progress'];?><span> </td>
</tr>

<tr>
<tr>
<td> 11</td>
<td> Conduct</td>
<td><!--<input type="text"  placeholder="Type here"class="textbox-design"><span class="bold">--><span class="bold"><?=$row['conduct'];?><span> </td>
</tr>

<tr>
<td> 12</td>
<td> Date of Leaving this Institution</td>
<td><!-- <input type="date" class="date-formating" >--><span class="bold"><?=$row['leaving_date'];?><span> </td>
</tr>

<tr>
<td> 13</td>
<td> Course and year in which studying and since when</td>
<td > <span class="bold"><?= $row['diploma_year'];?> <span class="bold"><?= $row['course'];?> <span>since <?= $row['since_when'];?></td>
</tr>

<tr>
<td> 14</td>
<td> Reason for leaving this Institution</td>
<td><!--<input type="text"placeholder="Type here" class="textbox-design">--><span class="bold"><?=$row['reason'];?><span> </td>	
</tr>

<td> 15</td>
<td> Remarks</td>
<td><!--<input type="text" placeholder="Type here"class="textbox-design">--><span class="bold"><?=$row['remark'];?><span></td>
</tr>
             <?php
                 }
             }
             else{
               echo"No record Found";
             }
            }
             ?>
</table>

<div class ="main2">
<p>Certified that the above information is in accordance with the Polytechnic Institution's Register.</P>
<br><br><br>

<div id="Div-Left">
Date:<span> 30-06-2023</span>
<br>
Place: Nashik Road
</div>

<div id="Div-Right">
<center>Principal<center>
Government Polytechnic , Nashik
</div>
</div> 
</div> 
</div>


<a href="home.php" class="previous">&laquo; Previous</a>
<div id="cssBtnWrap" class="btninline">
<button onclick="myfun()" class="buttoncss">Print Page</button>

</div>



<p id="cssOp"></p>
<script type="text/javascript">
  var cssOutE1=document.getElementById("cssOp");
  var cssBtnWrapE1=document.getElementById("cssBtnWrap");
   function myfun(){
    cssOutE1.innerHTML="Printing the document...";
    cssBtnWrapE1.style.display="none";
    print();
  }

  </script>
  
  



</body>
</html>