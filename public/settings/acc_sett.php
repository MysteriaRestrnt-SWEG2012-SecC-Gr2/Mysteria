<?php 
include '../../shared/CheckLogin.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="charset" content="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <meta name="author" content="paulos">
    <meta name="description" content="webpage for mysteria restaurant's delivery">
    <meta name="keywords" content="delivery,mysteria">
    <link rel="stylesheet" href="../../CSS/popup.css">
    <link rel="stylesheet" href="../../CSS/style-1.css">
    
    <title>Settings</title>
    <script src="../../js/side nav.js"></script>
    <script src="../../js/validator.js"></script>
    <script>
        function confPsd(){
            console.log("conf");
            var p1=document.getElementById("Password").value;
            var p2=document.getElementById("Password2").value;
            var msg=document.getElementById("msg");
            if(p1!==p2){
             console.log("not");
                msg.innerHTML="password and confirm password should match!";
                msg.style.color="red";
                return false;
            }
            else{
                return true;
            }
        }
    </script>
</head>

<body>
<?php include '../../shared/header2.php';?>
   
    <section>
  
        <div class="row" id="sectionTop">
            <div class="topTxt">
                <h1><span class="restaurant">Welcome to Your Account Settings</span> </h1>
                
            </div>
        </div>
        <div class="row">
            <div class="form col-6">

                <h2>Insert Your Credentials</h2>
                <form class="delivForm" method="POST" action="settings.php" >
                <div class="inputs" style="margin-left:25%;">
                    <i class="fas fa-user"></i>
                    <input type="Username" value="<?php $user=$_SESSION['user']; echo"$user";?>" name="usernamesignin" readonly>
                </div>
                <div class="inputs" style="margin-left:25%;">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" name="passwordsignin" required>
                </div>
                <input type="submit" name="Search" value="Search" class="btn" width="10px">

                </form>
            </div>
            <div class="col-3 goto1">
                <div class="goto"><a href="#btm">&#10225; &nbsp; Bottom</a></div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="form col-6">
                <?php
                 if(!isset($_SESSION['updated'])){
                    $_SESSION['old_password']="";
                    $_SESSION['old_email']="";
                    $_SESSION['old_username']="";
                }
                ?>
                <h2>RESULTS</h2>
                <form class="delivForm" method="POST" action="settings2.php" onsubmit="return confPsd()">
                    <label name="old_username" ><?php
                    if(isset($_SESSION['old_username'])){
                        $var=$_SESSION['old_username'];
                        if ($_SESSION['old_username']!="") {
                            echo"old username: $var";
                        }
                    }?></label><br>
                    <label name="old_email" > <?php 
                    if(isset($_SESSION['old_email'])){
                        $var=$_SESSION['old_email'];
                        if ($_SESSION['old_email']!="") {
                            echo"old email: $var";
                        }
                    }?></label><br>
                    <label name="old_password" ><?php 
                    if(isset($_SESSION['old_password'])){
                        $var=$_SESSION['old_password'];
                        if ($_SESSION['old_password']!="") {
                            echo"old password: $var";
                        }
                    }?></label><br>

                    <input type="Username" placeholder="new Username" name="Username" required><br>
                
                    <input type="email" placeholder="new Email" name="Email" required><br>
                                   
                    <input type="password" placeholder="new Password" name="Password" id="Password" required><br>
               
                    <input type="password" placeholder="Confirm new Password" name="Password2" id="Password2"required ><br>
                    <span id="msg"></span>
                  
                    <input type="submit" name='update' value="update credentials" >

                    <label name="notify" ><?php 

                    if(isset($_SESSION['updated'])){
                        $var=$_SESSION['updated'];
                        echo"$var" ;
                        $_SESSION['updated']="";
                        $_SESSION['old_password']="";
                        $_SESSION['old_email']="";
                        $_SESSION['old_username']="";
                    }?></label><br>

                    <hr>
                </form>
            </div>
           
        </div>

    </section>
    
    <!--<a href="#popup3">Feedback</a>-->
<?php include '../../shared/footer.php';?>
</body>
<?php require_once "../../db/conndelivery.php";?>
</html>
