<!--Login display page-->

<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>Login</title>
    <script type="text/javascript">
        function preventBack(){window.history.forward()};
        setTimeout("preventBack()",0);
        window.onunload=function(){null;}
        </script>
</head>
<body>

<div class="box">
        <div class="container">
    
            <div class="top">
               <!-- <span>Have an account?</span>-->
                <header>Login</header>
            </div>
    
<form action="login.php" method="post">
    
   <?php if(isset($_GET['error'])) { ?>
    <p class="error"><?php echo $_GET['error']; ?></p>
   <?php } ?>

            <div class="input-field">
                <input type="text" class="input"name="username" placeholder="User Name" id="">
                <i class='bx bx-user' ></i>
            </div>
            <br>
            <div class="input-field">
                <input type="Password" class="input" name="password" placeholder="Password" id="password"> 
             <img src = "eye-close.png" id="eyeicon">
                
  
            </div>
            <br>
            <div class="input-field">
                <input type="submit" class="submit" value="Login" id="">
            </div>
    </form>
    
            <div class="two-col">
                <div class="one">
                 <!--  <input type="checkbox" name="" id="check">-->
                  <!-- <label for="check"> Remember Me</label>-->
                </div>
                <div class="two">
                 <!--   <label><a href="#">Forgot password?</a></label>-->
                </div>
            </div>
        </div>
    </div> 
    
    <script>

        let eyeicon = document.getElementById("eyeicon");
        let password = document.getElementById("password");

        eyeicon.onclick = function(){
            if (password.type == "password"){
                password.type = "text";
                eyeicon.src = "eye-open.png"
               
            }else{

                password.type = "password";
                eyeicon.src = "eye-close.png"
            }
        }
    </script>
</body>
</html>