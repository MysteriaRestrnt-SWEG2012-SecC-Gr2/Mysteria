<?php
session_start();
include '../db/connectVar.php';
if (isset($_POST['submites'])) {
    echo "hithere";
    $feedbackText = $_POST['textareas'];
    $feedbackSubject = $_POST['subject'];
    $id=$_SESSION['userID'];
    $da=date("Y-m-d");

    $query = "INSERT INTO feedback (user_id,subject,date, feedback) values ('$id','$feedbackSubject','$da','$feedbackText') ";
    $result = mysqli_query($connectVariable, $query);
    if ($result) {
        $_SESSION['sentFeed'] = <<<eol
            <span id="message" style="font-size:15px; color:yellow;">Your comment has been sent </span>
            eol;
            echo '<script type ="application/JavaScript"> history.back(); </script>';
    } else {
        echo "Check your Code";
    }
}
?>