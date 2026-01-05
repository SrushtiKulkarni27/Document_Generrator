<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excel Import</title>
   <!-- <link rel="stylesheet" href="code_css.css">-->
   <link rel="stylesheet" href="ChoosefileStyle.css">
   <link rel="stylesheet" href="css/all.min.css"/>
  <link rel="stylesheet" href="css/fontawesome.min.css"/>
  
  
   
</head>
<body>


    <!--<?php
      #if(isset($_SESSION['message']))
     # {
       # echo"<h4>".$_SESSION['message']."</h4>";
        #unset($_SESSION['message']);
      #}
    ?>
   <center> <h1>Uploading Files</h1></center>

  
 <form action="code.php" method="POST" enctype="multipart/form-data">
    <label ><b>Choose 1st year file<b></label><br><br>
     <input type="file" name="import_file" class="upload-box1"/>
     <input type="submit" name="submit" class="design">
</form>
<br><br>
<form action="code2.php" method="POST" enctype="multipart/form-data">
     <label><b>Choose 2nd year file<b></label><br><br>
     <input type="file" name="import_file" class="upload-box"/>
     <input type="submit" name="submit" class="design">
</form><br><br>
<label id="setlabel"><b>Delete Records<b></label><br>
   <div class="btninline">
<a class="buttoncss" href="DeleteRecords.php">Delete </a>
 </div> -->
 <?php
      if(isset($_SESSION['message']))
      {
        echo"<h4>".$_SESSION['message']."</h4>";
        unset($_SESSION['message']);
      }
    ?>
<form action="LcCode.php" method="POST"  enctype='multipart/form-data' class="form-container">
  <div class="upload-files-container">
    <div class="drag-file-area">
      <span class="material-icons-outlined upload-icon"> <i class="fa-solid fa-arrow-up-from-bracket"></i> </span>
      <h3 class="dynamic-message"> Choose any file from here </h3>
      <label class="label"> or <span class="browse-files">
     <input type="file" name="import_file" class="default-file-input"/> 
     <span class="browse-files-text">browse file</span> <span>from device</span> </span> </label>
</div>

   <!-- <span class="cannot-upload-message"> <span class="material-icons-outlined">error</span> Please select a file first <span class="material-icons-outlined cancel-alert-button">cancel</span> </span>
    <div class="file-block">
      <div class="file-info"> <span class="material-icons-outlined file-icon">description</span> <span class="file-name"> </span> | <span class="file-size">  </span> </div>
      <span class="material-icons remove-file-icon">delete</span>
      <div class="progress-bar"> </div>
    </div>-->
    <input type="submit" name="submit"  class="upload-button">
    </form>
   <!-- <button type="button" class="upload-button"> Upload </button>-->
    <div class="upload-button">
        <a  style="text-decoration: none; " class="buttoncss" href="DeleteRecords.php">Delete </a>
  </div>
<div>
  <a   style="text-decoration: none; " class="upload-button"href="home.php">Back</a>
    </div>

  

<!--<script src="ChoosefileJS.js"></script>-->
 
</body>
</html>