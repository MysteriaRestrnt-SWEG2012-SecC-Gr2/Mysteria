<header class="header">
    <div class="logo-box" id="logoside">
        <img src="../../resources/images/LOGO2.png" alt="logo" class="logo">
    </div>
    <div class="text-box">
        <h1 class="heading-primary">
            <spam class="heading-primary-main">
                Mysteria Restaurant
            </spam>
            <spam class="heading-primary-promo">
                Where Food is Art
            </spam>
        </h1>
        <a href="../order/order2.php" class="btn btn-white btn-animted">Order Us</a>
    </div>
    <div id="sideNav">
        <a href="javascript:void(0) " class="closebtn" onclick="closeNav()">&times;</a>
        <div id="profile" style=" width:80%; padding-left:20%;">
            <img src="../../resources/images/Profile.png" alt="profile logo" width="50%"><br><br>
            <span style=" color: #ffb03b; font-size:22px;">&nbsp;<?php $var=$_SESSION['user']; echo"$var";?></span><br>
        </div>
        <hr>
        <ul>
             <li><a href="../menu_bar/FoodMenu.php">Food Menu </a></li><hr/>
            <li><a href="../reservation/reservationnew.php#popup1">Table reservation </a></li><hr/>
            <li><a href="../event/events.php#popup1">Event reservation </a></li><hr/>
            <li><a href="../reservation/cancelreservation.php">Cancel Table reservation </a></li><hr/>
            <li><a href="../event/cancel event reservation.php">Cancel Event reservation </a></li><hr/>
            <!-- <li><a href="../delivery/delivery.php">Delivery </a></li><hr/>
            <li><a href="../order/order2.php">Food Order </a></li><hr/> -->
            <li><a href="../../shared/cart.php">Cart:  <?php  $var=$_SESSION['cartCount']; echo $var; ?></a></li><hr/>
            <li><a href="../settings/acc_sett.php">Account settings </a></li><hr/>
            <li><a href="../../shared/logout.php">Log Out </a></li><hr/>
            <?php  if(isset($_SESSION['user_grp']) && $_SESSION['user_grp']=="admin"){ echo "<li><a href=\"../../admin/AdminPage.php\">admin page</a></li><hr/>";}?>
        </ul>
    </div>
    <div class="navbutton">
        <span onclick="openNav()" style="font-size:30px; color: seashell; cursor:pointer;">&#9776;</span>
    </div>
</header>
