<?php
if (isset($_POST["submites"])) {
// check email 
    if(empty($_POST['Email'])){
        echo "an email is required <br>" ;
    }
    else {
        echo htmlspecialchars($_POST['Email']) ;
    }
// check userName
      if(empty($_POST['UserName'])){
        echo "UserName is required <br>" ;
    }
    else {
        echo htmlspecialchars($_POST['UserName']);
    }
// chake textarea
  if(empty($_POST['textareas'])){
        echo "type some feedback first <br>" ;
    }
    else {
        echo htmlspecialchars($_POST['textareas']) ;
    }
}

if (isset($_POST["submites"])) {
    $UserName = $_POST["UserName"];
    $Email = $_POST["Email"];
    $textareas = $_POST["textareas"];
    $connectVariable = mysqli_connect('localhost', 'root', '', 'mysteriadb');
    if (!$connectVariable)
        die("The database is not connected");
    else 
    	echo "connected with database"."<br>" ;
      $queryInsertion = "INSERT INTO userfeedback(UserName , email, textarea)";
      $queryInsertion .= "VALUES('$UserName','$Email','$textareas')";
   // $insertionResult = mysqli_query($connectVariable, $queryInsertion);
    $insertionResult = mysqli_query($connectVariable, $queryInsertion);
    if ($insertionResult){
        echo "mssage sent successfully ";
    }
    else
        die("Not Connected");

}
?>
