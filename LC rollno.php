<?php
session_start();

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
    <title>LC</title>
    <link href="RollnoStyle.css" rel="stylesheet">
    <style>
        a {
  text-decoration: none;
  display: inline-block;
  padding: 8px 16px;
 margin-left:10px;
 margin-top:130px;

 
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
      
       <div class="subscribe-box"> 
    <h1>Enter rollno to generate document</h1>
    <form action="Lc.php" method="GET" class="subscribe">
      <input type="text" placeholder="example 205109"name="Roll_No" value="<?php if(isset($_GET['Roll_No'])){echo $_GET['Roll_No'];}?>" autocomplete="off" required="required"/>
      <button type="submit"> <span>Generate</span></button>
    </form>
  </div>
  <a href="home.php" class="previous">&laquo; Previous</a>


</body>
</html>