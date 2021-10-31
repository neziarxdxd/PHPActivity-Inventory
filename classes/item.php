<?php
class Item{
   
    public $itemId_fld;
    public $ItemName_fld;
    public $CategoryId_fld;
    public $ItemQuantity_fld;
   
    
    private $conn_fld;
    
    
    public function __construct($db_lv){
        $this->conn_fld = $db_lv;
    } 

    public function viewAllItem(){
        $sql = "SELECT * FROM item_tbl
        INNER JOIN category_tbl ON item_tbl.CategoryId_fld = category_tbl.CategoryId_fld";
        $stmt = $this->conn_fld->prepare($sql);
        $stmt->execute();

        return $stmt;   
    }

    public function viewOneItem(){
        $sql = "SELECT * FROM item_tbl WHERE itemId_fld=?";

        $stmt = $this->conn_fld->prepare($sql);
        $stmt->bindparam(1,$this->itemId_fld);
        $stmt->execute();
        
        $row=$stmt->fetch(PDO::FETCH_ASSOC);

        $this->ItemQuantity_fld = $row['ItemQuantity_fld'];
        $this->itemId_fld = $row['itemId_fld'];
        $this->ItemName_fld = $row['ItemName_fld'];
        $this->CategoryId_fld = $row['CategoryId_fld'];
        }

    public function updateItem(){
            $sql = "UPDATE item_tbl SET ItemQuantity_fld=?, ItemName_fld=?, CategoryId_fld=? WHERE itemId_fld=?";
    
            $stmt = $this->conn_fld->prepare($sql);
            
            $stmt->bindparam(1,$this->ItemQuantity_fld);   
            $stmt->bindparam(2,$this->ItemName_fld);
            $stmt->bindparam(3,$this->CategoryId_fld);
        
            $stmt->bindparam(4,$this->itemId_fld);

            $stmt->execute();
            return $stmt;
        }

    public function addItem(){
            $sql = "INSERT INTO item_tbl SET itemId_fld=?, ItemName_fld=?, CategoryId_fld=?, ItemQuantity_fld=?";

            $stmt = $this->conn_fld->prepare($sql);

            $stmt->bindparam(1,$this->itemId_fld);
            $stmt->bindparam(2,$this->ItemName_fld);
            $stmt->bindparam(3,$this->CategoryId_fld);
            $stmt->bindparam(4,$this->ItemQuantity_fld);

            $stmt->execute();
        }
}
?>