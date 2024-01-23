<?php
session_start();
if (isset($_POST["Treserve"])) 
{
    $user=$_SESSION['user'];
    $user_id=$_SESSION['userID'];
    $table_number=$_POST["table_number"];
    $date = $_POST["date"];
    $people = $_POST["people"];
    $state=false;


    $connectVariable = mysqli_connect('localhost', 'root', '', 'mysteriadb');
    if (!$connectVariable)
        die("The database is not connected");

        $sql= "SELECT * FROM tablereservation where user_id='$user_id' and date='$date' and table_number='$table_number' and number_of_people='$people' and reserved='1';";
        $insertionResult2 = mysqli_query($connectVariable, $sql);
    if(mysqli_num_rows($insertionResult2)>0){
        echo mysqli_num_rows($insertionResult2);
        $row=mysqli_fetch_assoc($insertionResult2);
        $reserved=$row['reserved'];
        $reservID=$row['reservation_id'];
      if($reserved==1)
        {
            $queryInsertion = "UPDATE tablereservation SET reserved='$state' WHERE reservation_id='$reservID'";
            $insertionResult = mysqli_query($connectVariable, $queryInsertion);
    
            $queryInsertion2 = "UPDATE table_info SET table_state='$state' WHERE table_number='$table_number'";
            $insertionResult2 = mysqli_query($connectVariable, $queryInsertion2);
            if ($insertionResult && $insertionResult2)
            {
                header ("Location: cancelreservation.php#popup3");
                exit();
            }
            else
            {
                die("Not Connected");
            }
        }
    }
    else{

        $_SESSION['sent'] = <<<eol
        <span id="message" style="font-size:15px; color:red;">There is no such reservation in our database or your reservation is already cancelled <br> &nbsp; Please reserve before cancellation!.</span><br>
        eol;
        header("Location: http://localhost/Mysteriamain/public/reservation/reservationnew.php");
    }
          

 
}
?>
