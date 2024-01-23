<?php
    class manip{
        private $db;

        function __construct($conn)
        {
            $this->db = $conn;
        }
        public function insert($fname, $lname, $email, $date, $time, $occasion, $quantity, $phone1, $phone2){
            try {
               $sql = "INSERT INTO reservation(Fname, Lname, email, date, time, occasion_id, quantity_id, phone1, phone2) VALUES (:fname,:lname,:email,:dates,:time_s,:occasion,:quantity,:phone1,:phone2)";
               $stmt = $this->db->prepare($sql);//object of db->prepare

               $stmt->bindparam(':fname',$fname);//function of statement
               $stmt->bindparam(':lname',$lname);
               $stmt->bindparam(':email',$email);
               $stmt->bindparam(':dates',$date);
               $stmt->bindparam(':time_s',$time);
               $stmt->bindparam(':occasion',$occasion);
               $stmt->bindparam(':quantity',$quantity);
               $stmt->bindparam(':phone1',$phone1);
               $stmt->bindparam(':phone2',$phone2);

               $stmt->execute();//function of statement
               return true;
            } catch (PDOException $e) {
               echo $e->getMessage();
               return false;
            }
        }
    }



?>