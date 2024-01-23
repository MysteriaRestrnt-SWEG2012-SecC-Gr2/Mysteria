<?php 
    $title = 'Confirm';
    require_once '../../db/conndelivery.php';

    if(isset($_POST['submit'])){
        $fname =$_POST['fname'];
        $lname =$_POST['lname'];
        $date =$_POST['date'];
        $other =$_POST['other'];
        $order =$_POST['order'];
        $quantity =$_POST['quantity'];
        $phone =$_POST['phone'];
        $phone1 =$_POST['phone1'];
        $address =$_POST['address'];
        
        $isconfirmed = $manipdelivery->insert($fname, $lname, $date, $other, $order, $quantity, $phone, $phone1,$address);

        if($isconfirmed){
            echo '<h1 class="text-center text-success" style="margin-left: 31%; color:white">You order is on the way</h1>';
        }
        else{
            echo '<h1 class="text-center text-danger" style="margin-left: 31%; color:white">There was an error</h1>';
        }
    }
?>
<body style="background :linear-gradient(-45deg, #f0b342, #520852);">



<div class="card" style="width: 18rem; margin-left: 35%;">
    <div class="card-body"   style=" padding: 20px 20px; border-radius:30px; background:linear-gradient(-45deg, #520852, #f0b342);">
        <h3 class="card-subtitle mb-2 text-muted">
           <?php echo $_POST['order']?>
        </h3>
        <p>
           Name: <?php echo $_POST['fname'] . ' ' . $_POST['lname']?>
        </p>
        <p class="card-text">
            Date: <?php echo $_POST['date']?>
        </p>
        <p class="card-text">
            Time: <?php echo $_POST['other']?>
        </p>
        <p class="card-text">
            Quantity: <?php  echo $_POST['quantity']?>
        </p>
        <p class="card-text">
            Phone: <?php echo $_POST['phone'].' '. $_POST['phone1']?>
        </p>
        <p class="card-text">
            Address: <?php  echo $_POST['address']?>
        </p>
        
    </div>
</div>
    
</body>