<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bonafide Certificate</title>
    <link rel="stylesheet" href="Bonafide.css">
    
    <style>
   select{
    appearance:none;
    border:none;

   }
   select:focus-visible{
    outline:none;
   }
</style>
</head>
<body>
<div id="invoice">
<div class="main-container">
  <div class="container">
    <div class="main" id="element1">
    <img align="left" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSfxxqK3hsw85ajcSlhSpReKX_IDIJzPSElLqnd5oq-LNpgwmp0zrfnPLZnhl1kDoN4dcQ&usqp=CAU" width="150" height="150" alt="GPN Logo">
    <div class=head-alignment>
    <h1 ><center><b>Government Polytechnic,Nashik</b></center><h1>
    <h3 ><center>(An Autonomous Institute of Government of Maharashtra)<br>
                     Samangaon Road, Nashik Road,Nashik-422101 Ph.(0253)2461221 <br>
                     Email:office.gpnashik@dtemaharashtra.gov.in Web: www.gpnashik.ac.in<br></center></h3></div>
</div>
</div>
<br>
<hr><hr>


    <div  class="submain" >
   
    <h2><u><center>BONAFIDE CERTIFICATE</center></u></h2>
    
  
    <?php
      $con=mysqli_connect("localhost","root","","excelimport");
      if(isset($_GET['rollno']))
      {
        $rollno=$_GET['rollno'];
    
        $query="SELECT * FROM  students WHERE rollno =' $rollno'";
        $query_run= mysqli_query($con,$query);
        if(mysqli_num_rows($query_run)>0)
        {
            foreach($query_run as $row)
            {
                ?>
                 <div id="roll-element">
                    UID: <span class="x1"><?= $row['id'];?></span>
                 </div><br>
                 <div id="roll-element">
                    ROLL NO: <span class="x1"><?= $row['rollno'];?></span>
                 </div>
                 <div id="branch-element">
                   BRANCH:<span class="x1"><?= $row['branch'];?></span>
                </div><br><br>
              <!-- paragraph  1 div -->
            
            <p class="textindent">This is to certify that,Master/Miss <span class="x1" ><?= $row['name'];?></span>
                 is studying in our <br>institute in the academic year <span class="x1" > <?= $row['academicYear'];?></span><per>
                <select style="font-size:20px" style="font-family: 'Times New Roman', Times, serif;" id="yearlist" >
                <option value="year selection">select year</option>
                <option value="First year">First year</option>
                <option value="second year">second year</option>
                <option value=" Third Year">Third Year</option>
            </select>
               <!--<input type="search" list="yearlist" class="no-outline">-->Diploma in</per><span class="x1"STYLE="font-weight:bold"><?= $row['branch'];?></span></p>
                  

              <!-- paragraph 2 div -->
             
             <p class="textindent"> The student bears good character and behaviour. His/Her Birth Date <span class="x1" STYLE="font-weight:bold"><?= $row['bday'];?></span> 
                as per our <br> 
              <?php
             }
           }
              else{
            echo"No Record Found";
           }
          }
        ?>
         record. This certificate is issued for the purpose of <span id="x6" STYLE="font-weight:bold">
        
         <select style="font-size:20px;" style=" font-family: 'Times New Roman', Times, serif;" id="mylist">
         <option  value="select purpose">select purpose</option>
         <option  value="Bus pass">Bus pass</option>
         <option value="Railway Concession">Railway Concession</option>
         <option value=" Caste validity">Caste validity</option>
         <option value=" Scholarship">Scholarship</option>
         <option value=" Bank Purpose">Bank Purpose</option>
         <option value="Other">
        </select>
       <!-- <input type="search" list="mylist" class="no-outline">--></span> his/her request as per <br>
        application dated <span id="x1" STYLE="font-weight:bold"><?= $d=date("dS F Y");  ?></span>.
        </p> 
     

    <p align="right">
      Registrar<br>
      Government Polytechnic,Nashik
    </p>
 </div>
</div>
</div>

<div class="btninline"><a class="buttoncss" href="home.php">Back</a>
 </div>
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
  






</body>
</html>