<header class="row">
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
            <li><a href="../../shared/cart.php">Cart:  <?php   $var=$_SESSION['cartCount'];  echo $var;?></a></li><hr/>
            <li><a href="../settings/acc_sett.php">Account settings </a></li><hr/>
            <li><a href="../../shared/logout.php">Log Out </a></li><hr/>
            <?php  if($_SESSION['user_grp']=="admin"){ echo "<li><a href=\"../../admin/AdminPage.php\">admin page</a></li><hr/>";}?>
        </ul>
</div>
        <div class="headerShadow">
            <div class="header">
                <div id="navigation">
                    <nav id="letters">
                        <span onclick="openNav()"
                            style="font-size:30px; color: seashell; cursor:pointer;">&#9776;</span>
                        <a href="../home/home.php">Home</a>
                        <a href="../review/about us2.php">About us</a>
                        <a href="../review/contact.php">Contact us</a>
                        <a href="../review/about us2.php#popup4">Feedback</a>
                    </nav>
                    <nav id="logos">
                        <div id="span"><span onclick="openNav()"
                                style="font-size:140%; color: seashell; cursor:pointer;">&#9776;</span></div>
                        <a href="../home/home.php">&#8962;</a>
                        <a href="../review/about us2.php">&#8505;</a>
                        <a href="../review/contact.php">&#9743;</a>
                        <a href="../review/about us2.php#popup4">&#x1f5e8;</a>
                    </nav>
                </div>
                <div id="logo">
                    <a href="../home/home.php"><img id="Mystlogo" src="../../resources/images/MLOGO.png"
                            alt="Mysteria Logo"></a>
                </div>
            </div>
        </div>
        <div id="search">
        <form id="srchform" role="search" method="GET" action="../../shared/searching.php" onsubmit="return search()" >
                <input type="search" id="query" name="query" placeholder="Search for foods" aria-label="search through site content">
                <button id="srchbtn" type="submit" name="search"><img id="srchimg"src="../../resources/images/searchwhite.png"></button>
                <label for="sort">   &nbsp;  &nbsp; Sort By: </label>
                <select id="sorting" name="sort">
                    <option value="">none</option>
                    <option value="food_name">name</option>
                    <option value="price">price</option>
                    <option value="food_name desc">name desc</option>
                    <option value="price desc">price desc</option>                   
                </select>
                <label for="filter">   &nbsp;  filter: </label>
                <select id="filtering" name="filter"  onchange="checkOptions(this)">
                    <option value="">none</option>
                    <option value="price>">price > </option>
                    <option value="price<">price < </option>
                    <option value="vegetarian">vegetarian only </option>
                    <option value="meatatarian">meatatarian only </option>
                    <option value="drinks">drinks only </option>
                    <option value="dessert">dessert only </option>
                    <option value="appetizer">appetizer only </option>
                    <option value="specials">specials only </option>
                </select>
                <input type="number" name="compare" id="compare" value="100" style="display:none;">
        </form>
        </div>
    </header>
