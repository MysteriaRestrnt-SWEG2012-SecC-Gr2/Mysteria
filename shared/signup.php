<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'C:/xampp/composer/vendor/autoload.php';
$mail = new PHPMailer(true);

include 'CheckSignup.php';
require_once'../db/connectVar.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" /> -->
    <link rel="stylesheet" href="../css/stylesignup.css">
    <link rel="stylesheet" href="../css/popup.css">
    <title>Document</title>
    <script>
        function validate(){
            if (email == "" || email == null) {
                alert("Sorry Email is required");
                return false;
            }
            if (dotPosition - atPosition < 3 || email.length - dotPosition < 3 || atPosition < 1) {
                alert("Invalid Email format");
                return false;
            }
        }
        function openForm1() {
            document.getElementById("myForm").style.display = "block";
            // document.getElementById("bt_close").style.display = "block";
           document.getElementById("pass_reset1").style.display = "block";
           document.getElementById("pass_reset3").style.display = "none";
           document.getElementById("pass_reset2").style.display = "none";
           document.getElementById("pass_reset4").style.display = "none";
        }
        function openForm2() {
            console.log("hi2");
            document.getElementById("myForm").style.display = "block";
            // document.getElementById("bt_close").style.display = "block";
           document.getElementById("pass_reset1").style.display = "none";
        //    document.getElementById("pass_reset3").style.display = "none";
        //    document.getElementById("pass_reset4").style.display = "none";
           document.getElementById("pass_reset2").style.display = "block";
        }
        function openForm3() {
            console.log("hi3");
            document.getElementById("myForm").style.display = "block";
            // document.getElementById("bt_close").style.display = "block";
           document.getElementById("pass_reset1").style.display = "none";
           document.getElementById("pass_reset2").style.display = "none";
           document.getElementById("pass_reset4").style.display = "none";
           document.getElementById("pass_reset3").style.display = "block";
        }
        function openForm4() {
            console.log("hi4");
            document.getElementById("myForm").style.display = "block";
            // document.getElementById("bt_close").style.display = "block";
           document.getElementById("pass_reset1").style.display = "none";
        //    document.getElementById("pass_reset2").style.display = "none";
        //    document.getElementById("pass_reset3").style.display = "none";
           document.getElementById("pass_reset4").style.display = "block";
          
        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
            document.getElementById("pass_reset1").style.display = "none";
           document.getElementById("pass_reset2").style.display = "none";
           document.getElementById("pass_reset3").style.display = "none";
           document.getElementById("pass_reset4").style.display = "none";
           sessionStorage.clear();  
        }
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
        function confPsd2(){
            console.log("conf");
            var p1=document.getElementById("password3").value;
            var p2=document.getElementById("password4").value;
            var msg=document.getElementById("msg2");
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
    <div class="container">
        <div class="sign" name="">
            <form action="registration.php" method="POST" class="sign-in">
                <h2 class="title">Sign in</h2>
                <div class="inputs">
                    <i class="fas fa-user"></i>
                    <input type="Username" placeholder="Username" name="usernamesignin" required>
                </div>
                <div class="inputs">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" name="passwordsignin" required>
                </div>
                <?php if(isset($_SESSION['sent'])){
                    $var=$_SESSION['sent'];
                    echo $var;
                    $_SESSION['sent']="";
                }?>     
                <input type="submit" name="signin" value="Login" class="btn">
                       
                <p class="social-text"> Or Sign in with social platform</p>
                <div class="social-media">
                    <a href="#" class="social-icon"> <i class="fab fa-facebook"></i> </a>
                    <a href="" class="social-icon"> <i class="fab fa-twitter"></i> </a>
                    <a href="" class="social-icon"> <i class="fab fa-google"></i> </a>
                    <a href="" class="social-icon"> <i class="fab fa-linkedin-in"></i> </a>
                </div><br>
                <a href="#myForm" onclick="openForm1()"><font color="black"> Forgot password?</font></a> 
                <p class="account-text">Don't have an account? <a href="#" id="sign-up-btn2">Sign-up</a> </p>
            </form>
            <form action="mail/sendcode.php" method="POST" class="sign-up" onsubmit="return confPsd()">
                <h2 class="title"  >Sign up</h2>
                <div class="inputs">
                    <i class="fas fa-user"></i>
                    <input type="Username" placeholder="Username" name="Username" required>
                </div>
                <div class="inputs">
                    <i class="fas fa-envelope"></i>
                    <input type="Email" id="email" placeholder="Email" name="Email" required>
                </div>
                <div class="inputs">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" name="Password" id="Password"required>
                </div>
                <div class="inputs">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Confirm Password" name="Password2" id="Password2" required >
                </div>
                <span id="msg"></span>
                <input type="submit" name="signup" value="Sign up" class="btn">
                <p class="social-text"> Or Sign up with social platform</p>
                <div class="social-media">
                    <a href="#" class="social-icon"> <i class="fab fa-facebook"></i> </a>
                    <a href="" class="social-icon"> <i class="fab fa-twitter"></i> </a>
                    <a href="" class="social-icon"> <i class="fab fa-google"></i> </a>
                    <a href="" class="social-icon"> <i class="fab fa-linkedin-in"></i> </a>
                </div>
                <p class="account-text">Already have an account? <a href="#" id="sign-in-btn2">Sign-in</a> </p>

            </form>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content" id="signup">
                    <h3>Already have an account? </h3>
                    <button class="btn" id="sign-in-btn" name="submit1">Sign in</button>
                </div>
                <div>
                    <img src="../resources/images/signin.svg" alt="signin " class="image">
                </div>
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>New to Mysteria Restaurant </h3>
                    <p>Get started with creating your free account</p>
                    <button class="btn" id="sign-up-btn" name="submit2">Sign up</button>
                    
                </div>
                <div>
                    <img src="../resources/images/signup.svg" alt=" signup" class="image">
                </div>
            </div>
        </div>
  </div>


<div class="form-popup form-container" id="myForm">

  <form action="<?php $var=$_SERVER['PHP_SELF'].""; echo $var;?>" method="POST">
        <div class="pass_reset" id="pass_reset1">
            <h2 class="title" id="Res_title4"  >Password Resetting form</h2>

            <div class="inputs">
            <i class="fas fa-envelope"></i>
                <input type="text" placeholder="insert username or email"  name="srchUser" required>
            </div>
            <button type="submit" id="cl_btn2" class="btn" name="sub_btn4" >search</button>

        </div>
  </form>

  <form action="" method="POST">
     <div class="pass_reset" id="pass_reset4">
          <h2 class="title" id="Res_title1"  >choose your account</h2>
            <?php
                if(isset($_POST["sub_btn4"])){
                    $scr=<<<EOL
                    <script type="text/JavaScript">
                    console.log("hi choose");
                    openForm4();
                    </script>
                    EOL;
                    echo $scr;
                 
                     $query=$_POST['srchUser'];

                     $sql="SELECT * FROM registration WHERE user_name LIKE '%$query%' or user_email LIKE '%$query%'";
                     $result=mysqli_query($connectVariable,$sql);
                    echo "<div id=\"userResult\">";
                     while($row=mysqli_fetch_assoc($result)){
                        $id=$row['user_id'];
                        $name=$row['user_name'];
                        $email=$row['user_email'];
                            $userItem=<<<EOL
                                    <div class= "inputsR">
                                        <input type="radio" name="users" value="$id">Username: $name <br>Email: $email<br>
                                     </div> <br>
                                EOL;
                            echo $userItem;
                     }
                    echo"</div>";
                 }   
            ?>
        <button type="submit" id="cl_btn1" class="btn" name="sub_btn1" >Submit</button>
    </div>
  </form>

  <form action="<?php $var=$_SERVER['PHP_SELF']."";?>" id="sendCode" method="POST">
    <div class="pass_reset" id="pass_reset2">
        <h2 class="title" id="Res_title2"  >Password Resetting form</h2>
        <?php
           
                if (isset($_POST['sub_btn1'])) {
                    $scr=<<<EOL
                    <script type="text/JavaScript">
                        console.log("hi rightcode not set");
                        openForm2();
                    </script>
                    EOL;
                    echo $scr;
                    if (isset($_POST['sub_btn1'])) {
                        $id=$_POST['users'];
                        $_SESSION['tempID']=$id;
                    } else {
                        $id= $_SESSION['tempID'];
                    }
                    
                
                    $conn = mysqli_connect('localhost', 'root', '', 'mysteriadb');
                    $sql1= "SELECT * FROM registration WHERE  user_id='$id'";
                    $insertionResult = mysqli_query($conn, $sql1);

                    $row=mysqli_fetch_assoc($insertionResult);
                    $UserName=$row['user_name'];
                    $email=$row['user_email'];

                    // $_SESSION['tempEmail']=$email;
                    // //sanitize form data
                    // $email = $conn-> real_escape_string($email);
                    $random = mt_rand(1111, 9999);

                    if (!$conn) {
                        die("The database is not connected");
                    }
                    $queryInsertion = "UPDATE registration SET code='$random' WHERE user_id='$id' ";
                    $result=mysqli_query($conn, $queryInsertion);
                    
                    
                    if (mysqli_num_rows($insertionResult)>0 && $result) {
                        $mail->SMTPDebug = false;                             //Enable verbose debug output
                                $mail->isSMTP();                                                  //Send using SMTP
                                $mail->Host       = 'smtp.gmail.com';                            //Set the SMTP server to send through
                                $mail->SMTPAuth   = true;                                       //Enable SMTP authentication
                                $mail->Username   = 'restaurantmysteria@gmail.com';                   //SMTP username
                                $mail->Password   = '@Mysteria#2';                              //SMTP password
                                $mail->SMTPSecure = 'tls';                                   //Enable implicit TLS encryption
                                $mail->Port       = 587;
                        
                        //Recipients
                        $mail->setFrom('restaurantmysteria@gmail.com', 'MYSTERIA RESTAURANT');
                        $mail->addAddress($email, $UserName);        //Add a recipient

                                        
                        //Content
                                $mail->isHTML(true);                                  //Set email format to HTML
                                $mail->Subject = 'Forgot password verification code';
                        $mail->Body = 'Here is your code '.$random.'';
                        if ($mail->send()) {
                            $_SESSION['sent2'] = <<<eol
                                    <span id="message" style="font-size:15px; color:green;">We have sent a reset code to your email.</span><br>
                                    eol;
                        } else {
                            $_SESSION['sent2'] = <<<eol
                                    <span id="message" style="font-size:15px; color:red;">Message could not be sent. Mailer Error: {$mail->ErrorInfo}</span><br>
                                eol;
                            header("Location: http://localhost/Mysteria/shared/signup.php#pass_reset2");
                            ignore_user_abort();
                            echo '<script type ="application/JavaScript"> 
                                    console.log("hi mess not sent");
                                    openForm2();

                                </script>';
                            exit();
                        }
                    } else {
                        $_SESSION['sent'] = <<<eol
                        <span id="message" style="font-size:15px; color:red;">There is no such user name please sign up
                        </span><br>
                    eol;
                        header("Location: http://localhost/Mysteria/shared/signup.php");
                        exit();
                    }
                }
            
        ?>
        <div class="inputs">
        <i class="fas fa-envelope"></i>
            <input type="number" placeholder="code" name="code" min=1000 max=9999 required>
            </div>
        <?php 
                if(isset($_SESSION['sent2'])){
                    $var=$_SESSION['sent2'];
                    echo $var;
                    $_SESSION['sent2']="";
                }
        ?>
        <button type="submit" id="cl_btn2" class="btn" name="sub_btn2" value="<?php $var=$_SESSION['tempID']; echo $var;?>" >Submit</button>
        <button type="button" class="btn cancel" id="bt_close" onclick="closeForm()">&times;</button>
    </div>
  </form>
            
        
  <form action="mail/sendcode.php" method="POST" onsubmit="return confPsd2()">
    <div class="pass_reset" id="pass_reset3">
            <?php
                if(isset($_POST['sub_btn2'])){

                    $id=$_POST['sub_btn2'];
                    $inputCode=$_POST['code'];

                    $conn = mysqli_connect('localhost', 'root', '', 'mysteriadb');
                        if(!$conn)
                        {
                            die("The database is not connected");
                        }

                        $rand= "SELECT * FROM registration WHERE user_id='$id'";
                        $result= mysqli_query($conn,$rand);
                        $row=mysqli_fetch_assoc($result);
                        // $UserName=$row['user_name'];
                        $code=$row['code'];
                        // $email=$row['user_email'];

                    if ($inputCode===$code)
                    {

                            $_SESSION['sent2'] = <<<eol
                            <span id="message" style="font-size:15px; color:green;">code has been verified.</span><br>
                            eol;
                            $scr=<<<EOL
                            <script type="text/JavaScript">
                            console.log("hi coderight");
                            openForm3();
                            </script>
                            EOL;
                            echo $scr;
                    }
                    else
                    {
                            $_SESSION['sent2'] = <<<eol
                            <span id="message" style="font-size:15px; color:red;">Wrong code please check your Email
                            </span><br>
                            eol;
                            echo '<script type ="application/JavaScript"> 
                            console.log("hi wrong");
                            openForm2();
                            </script>'; 
                            header("Location: http://localhost/Mysteria/shared/signup.php#myForm");
                            die();
                    }

                }
            ?>
        <h2 class="title" id="Res_title3"  >Password Resetting form</h2>
           <?php if(isset($_SESSION['sent2'])){
                    $var=$_SESSION['sent2'];
                    echo $var;
                    $_SESSION['sent2']="";
                }
            ?>
            
            <div class="inputs">
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="New Username" name="newUser" required>
            </div>
            <div class="inputs">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="New Password" name="newPassword" id="password3" required>
            </div>
            <div class="inputs">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Confirm New Password" name="Password2" id="password4" required >
            
            </div>
            <span id="msg2"></span>
            <button type="submit" id="cl_btn3" name="sub_btn3" class="btn" value="<?php $var=$_SESSION['tempID']; echo $var;?>">Submit</button>
        
        </div>  
  </form>

    <button type="button" class="btn cancel" id="bt_close" onclick="closeForm()">&times;</button>
</div>
    <script src="../js/sign.js"></script>
</body>
</html>    