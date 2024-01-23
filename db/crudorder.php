<?php
    class maniporder{
        private $db;

        function __construct($connorder)
        {
            $this->db = $connorder;
        }
        public function insert($fname, $lname, $order,$food,$additional,$ingredients, $other,$date,$time, $quantity, $phone, $phone1,$address){
            try {
               $sql = "INSERT INTO ordersfood(fname, lname, orders, food,additional_food, ingredients_id, other_allergy, date, time, quantity, phone,phone1,address) VALUES(:fname,:lname,:order,:food,:additional,:ingredients,:other,:date,:time,:quantity,:phone,:phone1,:address)";
               $stmt2 = $this->db->prepare($sql);//object of db->prepare

               $stmt2->bindparam(':fname',$fname);//function of statement
               $stmt2->bindparam(':lname',$lname);
               $stmt2->bindparam(':order',$order);
               $stmt2->bindparam(':food',$food);
               $stmt2->bindparam(':additional',$additional);
               $stmt2->bindparam(':ingredients',$ingredients);
               $stmt2->bindparam(':other',$other);
               $stmt2->bindparam(':date',$date);
               $stmt2->bindparam(':time',$time);
               $stmt2->bindparam(':quantity',$quantity);
               $stmt2->bindparam(':phone',$phone);
               $stmt2->bindparam(':phone1',$phone1);
               $stmt2->bindparam(':address',$address);

               $stmt2->execute();//function of statement
               return true;
            } catch (PDOException $e) {
               echo $e->getMessage();
               return false;
            }
        }
    }



?>