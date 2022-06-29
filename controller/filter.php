<?php
function check_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

function check_signup($data, $field)
{
    $err=<<<eol
    <script type="text/javascript">
     window.location.replace('http://localhost/Mysteria/shared/signup.php');
    </script>
  eol;
    if ((empty($data) || is_null($data))) {
        if ($field=="name") {
            $_SESSION['sent_signup'] = "Username is required for signup";
        } else if ($field=="email") {
            $_SESSION['sent_signup'] = "Email is required for signup";
        } else if ($field=="psd") {
            $_SESSION['sent_signup'] = "Password is required for signup";
        }
        echo $err;
        exit();
    } else {
        if ($field=="name") {
            $name = check_input($data);
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $_SESSION['sent_signup'] = "Only letters and white space allowed for Username sign up";
                echo $err;
                exit();
            } else {
                return $name;
            }
        } else if ($field=="email") {
            $email = check_input($data);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['sent_signup'] = "Invalid email format during sign up";
                echo $err;
                exit();
            } else {
                return $email;
            }
        } else if ($field=="psd") {
            if (strlen($data)<8) {
                $_SESSION['sent_signup'] = "password should be atleast 8 characters during sign up";
                echo $err;
                exit();
            } else {
                $psd=check_input($data);
                if (!preg_match("/[A-Z]/", $psd) || !preg_match("/[a-z]/", $psd)  || !preg_match("/[0-9]/", $psd)|| !preg_match("/[!@#$%^&*()_+=]/", $psd)) {
                  $_SESSION['sent_signup'] = "password should contain lowercase, uppercase,digit(0-9) and special character during sign up";
                  echo $err;
                  exit();
                }
                else{
                  return $psd;
                }
            }
        }
    }
}

function check_forgot($data, $field)
{
    if ((empty($data) || is_null($data))) {
        if ($field=="search") {
            $_SESSION['sent_forgot1'] = "Input is required ";
            $err=<<<eol
            <script type="text/javascript">
             console.log("empty f1");
             window.location.replace('http://localhost/Mysteria/shared/signup.php#myForm');
                  openForm1();
            </script>
            eol;
            echo $err;
                exit();
        }else if ($field=="name") {
          $_SESSION['sent_forgotPN'] = "Username is required for reseting";
          $err=<<<eol
            <script type="text/javascript">
             window.location.replace('http://localhost/Mysteria/shared/signup.php#pass_reset3');
              openForm3();
            </script>
            eol;
            echo $err;
            exit();
        } 
        else if ($field=="code") {
           
            $sendd=<<<eol
                    <script type="text/javascript">
                    window.location.replace('http://localhost/Mysteria/shared/signup.php#pass_reset2');
                    console.log("empty code");
                        openForm2();
                    </script>
                    eol;
                  echo $sendd;
                   $_SESSION['sent2C'] =<<<eol
                      <span id="message" style="font-size:15px; color:red;">code is required
                      </span><br>
                      eol;
                exit();
        } else if ($field=="psd") {
            $_SESSION['sent_forgotPN'] = "Password is required for reset";
            $err=<<<eol
              <script type="text/javascript">
               window.location.replace('http://localhost/Mysteria/shared/signup.php#pass_reset3');
               console.log("empty psd");
                    openForm3();
              </script>
              eol;
              echo $err;
              exit();
        }
      
    } else {
        if ($field=="search") {
            $srch = check_input($data);
                return $srch;
            
        } else if ($field=="name") {
          $name = check_input($data);
          if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
              $_SESSION['sent_forgotPN'] = "Only letters and white space allowed for resetting";
              $err=<<<eol
              <script type="text/javascript">
               window.location.replace('http://localhost/Mysteria/shared/signup.php#pass_reset3');
               console.log("wrong name");
                    openForm3();
              </script>
              eol;
              echo $err;
              exit();
          } else {
              return $name;
          }
      } else if ($field=="code") {
        $code=check_input($data);
            if (strlen($code)!=4) {
               
                $sendd=<<<eol
                        <script type="text/javascript">
                        window.location.replace('http://localhost/Mysteria/shared/signup.php#pass_reset2');
                        console.log("bad len code");
                            openForm2();
                        </script>
                        eol;
                      echo $sendd;
                      $_SESSION['sent2C'] =<<<eol
                      <span id="message" style="font-size:15px; color:red;">code should have the right length
                      </span><br>
                      eol;
                    exit();
            } else {
                return $code;
            }
        }else if ($field=="psd") {
          $psd=check_input($data);
          if (strlen($psd)<8) {
              $_SESSION['sent_forgotPN'] = "password should be atleast 8 characters";
              $err=<<<eol
              <script type="text/javascript">
              console.log("bad len psd"");
               window.location.replace('http://localhost/Mysteria/shared/signup.php#pass_reset3');
                    openForm3();
              </script>
              eol;
              echo $err;
              exit();
          } else {
              if (!preg_match("/[A-Z]/", $psd) || !preg_match("/[a-z]/", $psd)  || !preg_match("/[0-9]/", $psd)|| !preg_match("/[!@#$%^&*()_+=]/", $psd)) {
                $_SESSION['sent_forgotPN'] = "password should contain lowercase, uppercase,digit(0-9) and special character";
                $err=<<<eol
              <script type="text/javascript">
               window.location.replace('http://localhost/Mysteria/shared/signup.php#pass_reset3');
               console.log("bad form psd");
                    openForm3();
              </script>
              eol;
              echo $err;
              exit();
              }
              else{
                return $psd;
              }
          }
      }
    }
}
?>