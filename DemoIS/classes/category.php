<?php
class Category{

    public $CategoryName_fld;
    public $CategoryId_fld;
 


    public function __construct($db_lv){
        $this->conn_cv = $db_lv;
    }

    public function viewAllCategory(){
        $sql = "SELECT  * FROM category_tbl";
        $stmt = $this->conn_cv->prepare($sql);
        $stmt->execute();
        
        return $stmt;
    }

    public function viewOneCategory(){
        $sql = "SELECT * FROM category_tbl WHERE CategoryId_fld=?";

        $stmt = $this->conn_cv->prepare($sql);
        $stmt->bindparam(1,$this->CategoryId_fld);
        $stmt->execute();
        
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        $this->CategoryId_fld = $row['CategoryId_fld'];
        $this->CategoryName_fld = $row['CategoryName_fld'];
      
        }

    public function addCategory(){
            $sql = "INSERT INTO category_tbl SET CategoryId_fld=?, CategoryName_fld=?";

            $stmt = $this->conn_cv->prepare($sql);

            $stmt->bindparam(1,$this->CategoryId_fld);
            $stmt->bindparam(2,$this->CategoryName_fld);
           
            
           

            $stmt->execute();
        }

    public function updateCategory(){
            $sql = "UPDATE category_tbl SET CategoryName_fld=? WHERE CategoryId_fld=?";
    
            $stmt = $this->conn_cv->prepare($sql);
            
            $stmt->bindparam(1,$this->CategoryName_fld);
            $stmt->bindparam(2,$this->CategoryId_fld);
         

            $stmt->execute();
            return $stmt;
        }
}

?>