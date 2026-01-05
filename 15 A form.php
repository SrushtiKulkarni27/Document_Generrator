<?php
session_start();
$con=mysqli_connect("localhost","root","","excelimport");
 
if(isset($_GET['rollno']))
{
 $rollno=$_GET['rollno'];
 
 $query="SELECT * FROM  students  WHERE rollno =' $rollno'";
$query_run=mysqli_query( $con, $query);
$usernameprofile= $_SESSION['user_name'];
if($usernameprofile==true)
{

}
else{
 header("Location: index.php");
}
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form-15A</title>
    <link rel="stylesheet" href="15Aformcss.css">
    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
    <style>
   select{
    appearance:none;
    border:none;

   }
   select:focus-visible{
    outline:none;
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
<body>


<div  id="invoice" class="main-container">
    <div class="submain">

    <h2><center>Form- 15A</center></h2>
    <h2><u><center>Certificate to be given by Principal of the School/College</center></u></h2>
      <?php
    if(mysqli_num_rows($query_run)>0)
        {
            foreach($query_run as $row)
            {
                ?> 
                  <p class="Pmargin"> <span class="boldtext"   > ID: <?= $row['id'];?></span></p>
                 
                 <?php
             }
           }
              else{
            echo"No Record Found";
           }
        
        ?>
    
 
  <?php
 

    if(mysqli_num_rows($query_run)>0)
        {
            foreach($query_run as $row)
            {
                ?> 
    <p class="Pmargin"> This is to certify that,Shri/Kum <span class="boldtext" ><?= $row['name'];?></span>

    is student of this School/College in year <span class="boldtext"> <?= $row['academicYear'];?></span>
    and he/she is studying in std <span id="x6">
   <select  style="font-size:20px;" style=" font-family: 'Times New Roman', Times, serif;" id="mylist">
   <option value="select Course"  style="font-weight:bold;">select course</option>
   <option value="11th Std"  style="font-weight:bold;">11th Std</option>
   <option value="12th Science"  style="font-weight:bold;">12th Science</option>
   <option value=" Engineering"  style="font-weight:bold;">Engineering</option>
   <option value=" Medical"  style="font-weight:bold;">Medical</option>
   <option value=" Management"  style="font-weight:bold;">Management</option>
   <option value=" Mechanical"  style="font-weight:bold;">Mechanical</option>
   <option value=" It">
   </select>
<!--<input type="search" list="mylist">-->faculty.

</span> His/Her name and other information is  as per mentioned at number <span class="boldtext"><?= $row['registerno'];?></span> in general register<span id="x4"></span>.
   

   And the caste stated as per our general register is  <span class="boldtext"> <?= $row['category'];?></span> 
    <br>(Strike out if not applicable)<br><br><br><br>
    <?php
             }
           }
              else{
            echo"No Record Found";
           }
          }
        ?> 
 </p>

 <p align:left class="Pmargin">
     Place:<input type="text" placeholder="Type here" class="textbox-design"><br><br>

    
     Date:<span class="boldtext"> <?= $d=date("dS F Y");  ?></span><br><br>
    
</p>
<p align ="right" class="Pmargin">Seal and Signature of the Principal/Head Master</p><br><br><br>

</div>

<div class ="sub" >
<h2  class="Pmargin"><u>Important Instructions:-</u></h2>
<ol type="a" class="Pmargin">
  <li>If Claim for Scheduled Caste,Caste evidences should br prior to 10<sup>th</sup>August 1950.</li>
  <li>If Claim for De-Notified Tribes(Vimukta Jatis),Nomadic Tribes Caste evidences should be prior to 21<sup>st</sup>November 1961.</li>
  <li>If Claim for Other Backward Class and Special Backward Category,Caste evidences should be prior to 13<sup>th</sup> October 1967.</li>
  <li>In addition,evidence of residents of above mentioned prior is essential for applicant who has migrated in Maharashtra from othe state.</li>
  <li>Migrants from other State to Maharashtra after above mentioned period whose Caste Certificate is in " Migrants" format should not apply to committee.</li>
</ol>
  </div>
  </div>


  <a href="home.php" class="previous">&laquo; Previous</a>
<div id="cssBtnWrap" class="btninline">
<button onclick="myfun()" class="buttoncss">print page</button>
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
  <?php
   
   $query1="SELECT * FROM students  where rollno =' $rollno'";
   $query_run1= mysqli_query($con,$query1);
  $row = mysqli_fetch_assoc($query_run1);
   
  $Doc_Id= $row['id'];
  $Roll_no=$row['rollno'];
  $sname=$row['name'];
  $Doc_type="15 A Form";
  
  
  $query1="INSERT INTO document_issued(Doc_Id,Roll_no,sname,Doc_type) VALUES( '$Doc_Id','$Roll_no','$sname','$Doc_type')";
  $result=mysqli_query($con, $query1);
   
  ?>

  
    
</body>
</html>