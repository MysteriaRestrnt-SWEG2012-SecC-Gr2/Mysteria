<?php 
session_start();
if (!isset($_SESSION['userID']))
{
    header("Location:http://localhost/Mysteriamain/shared/signup.php");
    die();
}
else{ 
    
    
    $connectVariable = mysqli_connect('localhost', 'root', '', 'mysteriadb');
        if (!$connectVariable){
            die("The database is not connected");}
    if (isset($_SESSION['start']) && ((time() - $_SESSION['start']) >600)) {
       
        $session_id=session_id();
        $UserID=$_SESSION['userID'];
        $start=$_SESSION['start'];
        $sql="UPDATE registration SET active_sessions=null WHERE user_id= '$UserID'";
        $insertionResult2 = mysqli_query($connectVariable, $sql);
        session_unset();
    
        session_destroy();
    
        echo '<script type ="application/JavaScript"> alert ("Your login has expired. Please login again");  
        window.location.assign("http://localhost/Mysteriamain/shared/signup.php"); </script>'; 
     
    }
    else
    {      
         $_SESSION['start']=time();

         $UserID=$_SESSION['userID'];
         $sql="SELECT SUM(quantity) FROM cart WHERE user_id='$UserID' ";
         $result2=mysqli_query($connectVariable,$sql);
         $rowMenu=mysqli_fetch_row($result2);
         $_SESSION['cartCount']=$rowMenu[0];

            $session_id=session_id();
            $sql= "SELECT * FROM registration where active_sessions= '$session_id'";
            $insertionResult2 = mysqli_query($connectVariable, $sql);
            $row=mysqli_fetch_assoc($insertionResult2);

            if(mysqli_num_rows($insertionResult2)==0 || mysqli_num_rows($insertionResult2)>1){
                echo '<script type ="application/JavaScript"> alert ("Simultaneous login is not allowed. Please login again");  
                             window.location.assign("http://localhost/Mysteriamain/shared/signup.php"); </script>'; 
                $sql="UPDATE registration SET active_sessions=null WHERE active_sessions= '$session_id'";
                    $insertionResult2 = mysqli_query($connectVariable, $sql);
                    session_unset();
                
                    session_destroy();
                // header("Location:http://localhost/Mysteria/shared/signup.php");
                die();
            }
    }   
    
}

?>