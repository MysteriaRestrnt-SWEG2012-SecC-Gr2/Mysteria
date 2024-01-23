<?php 
session_start();
if (!isset($_SESSION['userID'])&&!isset($_SESSION['user_grp']))
{
    header("Location:http://localhost/Mysteria/shared/signup.php");
    die();

}
else if($_SESSION['user_grp']!="admin"){
    echo '<script type ="application/JavaScript"> alert ("restricted page!"); history.back(); </script>';
    die();
}
else{
    if (isset($_SESSION['start']) && ((time() - $_SESSION['start']) >600)) {
        $connectVariable = mysqli_connect('localhost', 'root', '', 'mysteriadb');
        if (!$connectVariable){
            die("The database is not connected");}
        $session_id=session_id();
        $UserID=$_SESSION['userID'];
        $sql="UPDATE registration SET active_sessions=null WHERE user_id= '$UserID'";
        $insertionResult2 = mysqli_query($connectVariable, $sql);
        
        session_unset();
        session_destroy();
    
        echo '<script type ="application/JavaScript"> alert ("Your login has expired. Please login again"); window.location.assign("http://localhost/Mysteriamain/shared/signup.php"); </script>'; 
    }
    
    else
    {       
        $_SESSION['start']=time();
        $connectVariable = mysqli_connect('localhost', 'root', '', 'mysteriadb');
        if (!$connectVariable){
        die("The database is not connected");}
        $session_id=session_id();
        $sql= "SELECT * FROM registration where active_sessions= '$session_id'";
        $insertionResult2 = mysqli_query($connectVariable, $sql);
        $row=mysqli_fetch_assoc($insertionResult2);

        if(mysqli_num_rows($insertionResult2)==0){
        header("Location:http://localhost/Mysteriamain/shared/signup.php");
        die();
        }
}
}

?>