<?php
    class manip{
        private $db;

        function __construct($conn)
        {
            $this->db = $conn;
        }
        public function insert( $date, $time, $occasion, $quantity, $phone1, $phone2,$reserved){
            try {
               $sql = "INSERT INTO reservation(date, time, occasion, quantity, phone1, phone2,reserved) VALUES (:dates,:time_s,:occasion,:quantity,:phone1,:phone2,:reserved)";
               $stmt = $this->db->prepare($sql);//object of db->prepare

               $stmt->bindparam(':dates',$date);
               $stmt->bindparam(':time_s',$time);
               $stmt->bindparam(':occasion',$occasion);
               $stmt->bindparam(':quantity',$quantity);
               $stmt->bindparam(':phone1',$phone1);
               $stmt->bindparam(':phone2',$phone2);
               $stmt->bindparam(':resrved',$reserved);

               $stmt->execute();//function of statement
               return true;
            } catch (PDOException $e) {
               echo $e->getMessage();
               return false;
            }
        }
    }
?>