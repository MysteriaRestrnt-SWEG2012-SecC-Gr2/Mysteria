<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'C:/xampp/composer/vendor/autoload.php';
$mail = new PHPMailer;
include 'CheckSignup.php';
include '../controller/filter.php';
require_once '../db/connectVar.php';

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
    <script src="../js/signup.js">
      
    </script>
    <title>Document</title>
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
                    unset($_SESSION['sent']);
                }?>
                <span style="color:red;"><?php if(isset($_SESSION['sent_signup'])){
                    $var=$_SESSION['sent_signup'];
                    echo $var;
                    unset($_SESSION['sent_signup']);
                }?></span>     
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
                    <input type="Username" placeholder="Username" name="Username" id="name">
                </div>
                <div class="inputs">
                    <i class="fas fa-envelope"></i>
                    <input type="Email" id="email" placeholder="Email" name="Email" id="email">
                </div>
                <div class="inputs">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" name="Password" id="Password">
                </div>
                <div class="inputs">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Confirm Password" name="Password2" id="Password2">
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

  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <div class="pass_reset" id="pass_reset1">
            <h2 class="title" id="Res_title4"  >Password Resetting form</h2>

            <div class="inputs">
            <i class="fas fa-envelope"></i>
                <input type="text" placeholder="insert username or email"  name="srchUser">
            </div>
            <span style="color:red;"><?php if(isset($_SESSION['sent_forgot1'])){
                    $var=$_SESSION['sent_forgot1'];
                    echo $var;
                    unset($_SESSION['sent_forgot1']);
                }?></span><br> 
            <button type="submit" id="cl_btn2" class="btn" name="sub_btn4" >search</button>
            <button type="button" class="btn cancel" id="bt_close1" onclick="closeForm()">&times;</button>
        </div>
  </form>

  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
     <div class="pass_reset" id="pass_reset4">
          <h2 class="title" id="Res_title1"  >choose your account</h2>
            <?php
                if(isset($_POST["sub_btn4"])){
                  
                     $query=check_forgot($_POST['srchUser'],"search");

                     $scr=<<<EOL
                     <script type="text/JavaScript">
                     console.log("hi choose");
                     openForm4();
                     </script>
                     EOL;
                     echo $scr;

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

  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="sendCode" method="POST">
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
                    $email = $conn-> real_escape_string($email);
                    $random = mt_rand(1111, 9999);

                    if (!$conn) {
                        die("The database is not connected");
                    }
                    $queryInsertion = "UPDATE registration SET code='$random' WHERE user_id='$id' ";
                    $result=mysqli_query($conn, $queryInsertion);
                    
                    
                    if (mysqli_num_rows($insertionResult)>0 && $result) {
                          //Enable verbose debug output
                            $mail->IsSMTP();   
                            $mail->SMTPDebug = false;                                          //Send using SMTP
                            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                            $mail->Username   = 'restaurantmysteria@gmail.com';                     //SMTP username
                            $mail->Password   = 'zfahqguufmkoznks';                               //SMTP password
                            $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
                            $mail->Port       = 587;     
         
                        
                        //Recipients
                        $mail->setFrom('restaurantmysteria@gmail.com', 'MYSTERIA RESTAURANT');
                        $mail->addAddress($email, $UserName);        //Add a recipient

                                        
                        //Content
                                $mail->isHTML(true);                                  //Set email format to HTML
                                $mail->Subject = 'Forgot password verification code';
                                $mail->Body = 'Here is your code '.$random.'';
                        if ($mail->send()) {
                            $_SESSION['sent2C'] = <<<eol
                                    <span id="message" style="font-size:15px; color:green;">We have sent a reset code to your email.</span><br>
                                    eol;
                        } else {
                            $_SESSION['sent_forgot1'] = <<<eol
                                    <span id="message" style="font-size:15px; color:red;">Message could not be sent. Mailer Error: {$mail->ErrorInfo} Try again</span><br>
                                eol;

                                $sendd=<<<eol
                                    <script type="text/javascript">
                                    window.location.replace('http://localhost/Mysteria/shared/signup.php#myForm');
                                    console.log("hi mess not sent");
                                        openForm1();
                                    </script>
                                    eol;
                                 echo $sendd;
                                exit();
                        }
                    } else {
                        $_SESSION['sent'] = <<<eol
                                            <span id="message" style="font-size:15px; color:red;">
                                                There is no such user please sign up
                                            </span><br>
                                            eol;
                            echo <<<eol
                                    <script type="text/javascript">
                                         window.location.replace('http://localhost/Mysteria/shared/signup.php');
                                    </script>
                                    eol;
                        exit();
                    }
                }
            
        ?>
        <div class="inputs">
        <i class="fas fa-envelope"></i>
            <input type="number" placeholder="code" name="code">
            </div>
        <?php 
                if(!isset($_SESSION['sent2C'])){
                    $var2="";
                }
                else{
                    $var2=$_SESSION['sent2C'];
                    unset($_SESSION['sent2C']);
                }
                echo $var2;
        ?>
        <button type="submit" id="cl_btn2" class="btn" name="sub_btn2" value="<?php $var=$_SESSION['tempID']; echo $var;?>" >Submit</button>
        <button type="button" class="btn cancel" id="bt_close2" onclick="closeForm()">&times;</button>
    </div>
  </form>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" onsubmit="return confPsd2()">
    <div class="pass_reset" id="pass_reset3">
            <?php
                if(isset($_POST['sub_btn2'])){

                    $id=$_POST['sub_btn2'];
                    $inputCode=check_forgot($_POST['code'],"code");
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
                            $_SESSION['sent2C'] = <<<eol
                            <span id="message" style="font-size:15px; color:red;">Wrong code please check your Email
                            </span><br>
                            eol;
                            echo '<script type ="application/JavaScript"> 
                            window.location.replace("http://localhost/Mysteria/shared/signup.php#pass_reset2");
                            console.log("code wrong");
                            openForm2();
                            </script>'; 
                           exit();
                    }

                }
            ?>
        <h2 class="title" id="Res_title3"  >Password Resetting form</h2>
           <?php if(isset($_SESSION['sent2'])){
                    $var=$_SESSION['sent2'];
                    echo $var;
                    unset($_SESSION['sent2']);
                }
            ?>
            
            <div class="inputs">
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="New Username" name="newUser">
            </div>
            <div class="inputs">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="New Password" name="newPassword" id="password3">
            </div>
            <div class="inputs">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Confirm New Password" name="Password2" id="password4">
            
            </div>
            <span id="msg2"></span>
            <span style="color:red;"><?php if(isset($_SESSION['sent_forgotPN'])){
                    $var=$_SESSION['sent_forgotPN'];
                    echo $var;
                    unset($_SESSION['sent_forgotPN']);
                }?></span><br> 
            <button type="submit" id="cl_btn3" name="sub_btn3" class="btn" value="<?php $var=$_SESSION['tempID']; echo $var;?>">Submit</button>
        
        </div>  
  </form>
  <?php
  if (isset($_POST['sub_btn3'])) 
  {
      $conn = mysqli_connect('localhost', 'root', '', 'mysteriadb');
      if(!$conn){
          die("The database is not connected");
      }

      $id=$_POST["sub_btn3"];
      
      $UserName=check_forgot($_POST["newUser"],"name");
      $new_pass=check_forgot($_POST["newPassword"],"psd");
      $c_pass=check_forgot($_POST["Password2"],"psd");

      $UserName = $conn-> real_escape_string($UserName);
      $password = $conn-> real_escape_string($new_pass);
      $c_pass = $conn-> real_escape_string($c_pass);
      

      $sql= "SELECT * FROM registration WHERE user_name = '$UserName'";
$insertionResult3 = mysqli_query($connectVariable, $sql);
    if(mysqli_num_rows($insertionResult3)>0){
        $_SESSION['sent_forgotPN'] = "username is taken";
        $err=<<<eol
              <script type="text/javascript">
               window.location.replace('http://localhost/Mysteria/shared/signup.php#pass_reset3');
               console.log("wrong name");
                    openForm3();
              </script>
              eol;
              echo $err;
    }else{
        $rand= "SELECT * FROM registration WHERE user_id='$id'";
        $result= mysqli_query($conn, $rand);
        $row=mysqli_fetch_assoc($result);
        $email=$row['user_email'];
        $hash = password_hash($c_pass, PASSWORD_DEFAULT);

        $Insertion = "UPDATE registration SET user_name='$UserName', user_password='$hash' WHERE user_email='$email' and user_id='$id'";
        mysqli_query($conn, $Insertion);

        $sql= "SELECT * FROM registration where user_id='$id'";
        $insertionResult2 = mysqli_query($conn, $sql);
      
        $row=mysqli_fetch_assoc($insertionResult2);

        if ($Insertion && isset($row['email_verified_at'])) {
            $_SESSION['user']=$UserName;
            $_SESSION['userID']=$row["user_id"];
            $_SESSION['email']=$row["user_email"];
            $_SESSION['user_grp']=$row['user_grp'];
            $_SESSION['query']="";
            $_SESSION['cartCount']=0;
            $_SESSION['terms']=false;
            $_SESSION['terms2']=false;
            $session_id=session_id();

            $sql= "SELECT * FROM registration where user_name='$UserName' and (active_sessions='$session_id' or active_sessions IS NULL or active_sessions=''  )";
            $insertionResult2 = mysqli_query($conn, $sql);
            $row=mysqli_fetch_assoc($insertionResult2);
              
            if (mysqli_num_rows($insertionResult2)==0) {
                session_unset();
                echo '<script type ="application/JavaScript"> alert ("this account is already logged in.");  window.location.replace("http://localhost/Mysteria/shared/signup.php"); </script>';
            // echo "hi";
            } elseif (mysqli_num_rows($insertionResult2)>0) {
                $_SESSION['start'] = time();
                $sql2="UPDATE registration SET active_sessions='$session_id' WHERE user_name = '$UserName'";
                $insertion = mysqli_query($conn, $sql2);
                if ($row['user_grp']=="admin") {
                    echo"<script> window.location.replace('http://localhost/Mysteria/shared/signup.php'); </script>";
                    header("Location: ../../admin/AdminPage.php");
                } else {
                    header("Location: ../../public/home/home.php");
                }
                exit();
            }
        } elseif (!isset($row['email_verified_at'])) {
            $_SESSION['sent'] = <<<eol
              <span id="message" style="font-size:15px; color:red;">Please verify your account before login.</span>
              eol;
            echo"<script> window.location.replace('http://localhost/Mysteria/shared/signup.php'); </script>";
        } else {
            $_SESSION['sent'] = <<<eol
              <span id="message" style="font-size:15px; color:red;">Your Username or Password is invalid.</span>
              eol;
            echo"<script> window.location.replace('http://localhost/Mysteria/shared/signup.php'); </script>";
        }
    }
  }
  ?>

    <button type="button" class="btn cancel" id="bt_close3" onclick="closeForm()">&times;</button>
</div>
    <script src="../js/sign.js"></script>
</body>
</html>    