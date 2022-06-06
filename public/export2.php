<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "mysteriadb");
$output = '';
if(isset($_POST["export"]))
    {
        $query = "SELECT * FROM ordersfood ";
        $result = mysqli_query($connect, $query);
        if(mysqli_num_rows($result) > 0)
        {
            $output .= '
                <table class="table" bordered="1">  
                    <tr>  
                    <th width="50%"> Order ID <hr> </th> 
                    <th width="50%">User ID <hr></th>  
                    <th width="90%">Food ordered<hr></th>    
                    <th>Allergy <hr></th>  
                    <th>Date <hr></th> 
                    <th>Time <hr></th> 
                    <th>Quantity<hr></th> 
                    <th>Phone: <hr></th> 
                    <th>Address <hr></th>  
                    </tr>
            ';
            while($row = mysqli_fetch_array($result))
            {
                $output .= '
                <tr>  
                <td>'.$row["order_id"].'</td>  
                <td>'.$row["user_id"].'</td>  
                <td>'.$row["food_ordered"].'</td>  
                <td>'.$row["allergy"].'</td>  
                <td>'.$row["date"].'</td>
                <td>'.$row["time"].'</td>
                <td>'.$row["quantity"].'</td>
                <td>'.$row["phone1"].'</td>
                <td>'.$row["address"].'</td>
            </tr> 
                ';
            }
            $output .= '</table>';
            header('Content-Type: application/xls');
            header('Content-Disposition: attachment; filename=download.xls');
            echo $output;
        }
}
?>