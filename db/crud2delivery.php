<?php
    class manipdelivery{
        private $db;

        function __construct($conndelivery)
        {
            $this->db = $conndelivery;
        }
        public function insert($fname, $lname, $date, $other, $order, $quantity, $phone, $phone1,$address){
            try {
               $sql = "INSERT INTO delivery(fname, lname,date,other,orders,quantity,phone,phone1,address) VALUES (:fname,:lname,:date,:other,:order,:quantity,:phone,:phone1,:address)";
               $stmt1 = $this->db->prepare($sql);//object of db->prepare

               $stmt1->bindparam(':fname',$fname);//function of statement
               $stmt1->bindparam(':lname',$lname);
               $stmt1->bindparam(':date',$date);
               $stmt1->bindparam(':other',$other);
               $stmt1->bindparam(':order',$order);
               $stmt1->bindparam(':quantity',$quantity);
               $stmt1->bindparam(':phone',$phone);
               $stmt1->bindparam(':phone1',$phone1);
               $stmt1->bindparam(':address',$address);

               $stmt1->execute();//function of statement
               return true;
            } catch (PDOException $e) {
               echo $e->getMessage();
               return false;
            }
        }
    }



?>