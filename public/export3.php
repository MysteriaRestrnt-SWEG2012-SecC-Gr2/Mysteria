<?php  
require ('../fpdf/fpdf.php');
$connect = mysqli_connect("localhost", "root", "", "mysteriadb");
$output = '';
if(isset($_POST["export"]))
    {
        $query = "SELECT * FROM ordersfood ";
        $result = mysqli_query($connect, $query);
        if(mysqli_num_rows($result) > 0)
        {
    
            while($row = mysqli_fetch_array($result))
            { 
                $orderid= $row["order_id"];
                $user= $row["user_id"]; 
                $order=$row["food_ordered"];
                $allergy=$row["allergy"];
                $date= $row["date"];
                $time= $row["time"];
                $quantity= $row["quantity"];
                $phone1= $row["phone1"];
                $address= $row["address"];

                $pdf = new FPDF();
                $pdf->AddPage();
                $pdf->SetFont("Arial", "I", 13);
                $pdf->Cell(110,10,"Order Information", 1,1,'C');
            

                $pdf->Cell(50,10,"Order ID: ",1,0);
                $pdf->Cell(60,10,$orderid,1,1);

                $pdf->Cell(50,10,"User ID: ",1,0);
                $pdf->Cell(60,10,$user,1,1);

                $pdf->Cell(50,10,"Order: ",1,0);
                $pdf->Cell(60,10,$order,1,1);

                $pdf->Cell(50,10,"allergy: ",1,0);
                $pdf->Cell(60,10,$allergy,1,1);

                $pdf->Cell(50,10,"Date: ",1,0);
                $pdf->Cell(60,10,$date,1,1);

                $pdf->Cell(50,10,"Time: ",1,0);
                $pdf->Cell(60,10,$time,1,1);

                $pdf->Cell(50,10,"Quantity: ",1,0);
                $pdf->Cell(60,10,$Quantity,1,1);

                $pdf->Cell(50,10,"Phone: ",1,0);
                $pdf->Cell(60,10,$phone1,1,1);

                $pdf->Cell(50,10,"Address: ",1,0);
                $pdf->Cell(60,10,$address,1,1);

                header('Content-Type: application/pdf');
                header('Content-Disposition: attachment; filename=download.pdf');
                $pdf->output();
                ob_end_flush();
            }

            

        }
}
?>