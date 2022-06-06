<?php 
include '../shared/CheckAdminLogin.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="charset" content="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <meta name="author" content="">
    <meta name="description" content="webpage for mysteria restaurant's Admin Page">
    <meta name="keywords" content="admin,mysteria">
    <title>Admin page</title>
    <script src="../Js/side nav.js"></script>
    <script src="../Js/validator.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/AdminStyle.css">
</head>

<body>
    <header class="header">
        <div class="headerNav" style="margin-left: 5%;">
            <a href="#" >Home</a>
            <a href="../public/home/home.php">Mysteria site</a>
            <a href="../public/csv.php">Export</a>
            <a href="adminAddForm.php">Add admin</a>
            <a href="FoodAddForm.php">Add Menu</a>
            <a href="../shared/logout.php">Log Out </a>
            <form id="srchform" role="search">
                <input type="search" id="query" name="q" placeholder="Search" aria-label="search through site content">
                <button id="srchbtn" type="submit"><img id="srchimg" src="../resources/images/searchwhite.png"></button>
            </form>
        </div>
        <div>
            <label>Admin: <?php
            $var=$_SESSION['user'];
            echo $var;
            ?>

            </label>
        </div>
    </header>
    <div class="queryStyle">
        <form>
            <select id="select">
                <option value="select">Select</option>
            </select>
            <select>
                <option value="all">*</option>
                <option value="all">sth</option>
                <option value="all">sth</option>
                <option value="all">sth</option>
            </select>
            <select>
                <option>from</option>
            </select>
            <select>
                <option value="delivery">delivery</option>
                <option value="feedback">feedback</option>
                <option value="ingredient">ingredient</option>
                <option value="ordersfood">ordersfood</option>
                <option value="registration">registration</option>
                <option value="reservation">reservation</option>
                <option value="tablereservation">table reservation</option>
            </select><br>
            <input type="submit" name="submit" value="Submit" class="btn">
        </form>
    </div>

    <!--<button onclick="move()" id="downbtn">Download</button>
        <div id="myProgress">
            <div id="myBar"></div>
          </div>
          <script>
            var i = 0;
            function move() {
              if (i == 0) {
                i = 1;
                var elem = document.getElementById("myBar");
                var width = 1;
                var id = setInterval(frame, 10);
                function frame() {
                  if (width >= 100) {
                    clearInterval(id);
                    i = 0;
                  } else {
                    width++;
                    elem.style.width = width + "%";
                  }
                }
              }
            }
            </script>-->
</body>
<footer class="footer">
    <div id="btm" class="feedback col-3">
        <address>
                call: +251110000101<br> +251967882862
            </address>
        <p style="font-size:16px; text-align:center; ">Copyright &copy; Mysteria 2021/22, all rights reserved </p>
    </div>
</footer>

</html>