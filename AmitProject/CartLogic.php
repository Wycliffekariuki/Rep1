<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $function_name = $_POST['function_name'];
    $variable = $_POST['variable'];
    $variable1 = $_POST['variable1'];
    
    if($function_name === 'cartInsert'){
        $response = cartInsert($variable);
    }else if($function_name === 'cartRemove'){
        $response = cartRemove($variable1);
    }else{
        
    }
}




  $variable2 = null;
$product_name_confirm = null;
function cartInsert($param){

    $user = 'root';
    $password = '';
    $database = 'database1';
    
    try {
        $con = new mysqli('localhost', $user, $password, $database) or die("Unable to connect");
        
    }catch(Exception $e){
        echo $e->erro_message();
        echo "Connection failed";
        
    }try {
        session_start();
        if (isset($_SESSION['name']) && isset($_SESSION['email'])) {
            ;
        
        $user_name = $_SESSION['name'];
        $user_email = $_SESSION['email'];
        $table_name = $user_name.$user_email;
        $table_sql = "CREATE TABLE IF NOT EXISTS " . $table_name . " (
    product_ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    price VARCHAR(255),
    price_num INT NOT NULL,
    type VARCHAR(255) NOT NULL,
    image VARCHAR(255) NOT NULL,
    product_name VARCHAR(255) NOT NULL,
    quantity INT(10) DEFAULT 1
)";
        $table_stamt = $con->prepare($table_sql);
        $table_stamt->execute();
        
        $sql1 = "SELECT name,price,image,type,product_name,productID,price_num FROM product WHERE product_name = '$param'";
        $stmt1 = $con->prepare($sql1);
        $stmt1->execute();
        $result1 = $stmt1->get_result();
        $product_id = null;
        $product_name = null;
        $name = null;
        $image = null;
        $price = null;
        $type = null;
        $price_num = null;
         if($row = $result1->fetch_assoc()) {
            $product_id = $row['productID'];
            $product_name = $row['product_name'];
            $name = $row['name'];
            $image = $row['image'];
            $price = $row['price'];
            $type = $row['type'];;
            $variable2 = $row['image'];
            $price_num = $row['price_num'];
        
        $result2 = $con->query("SELECT product_name FROM " . $table_name . " WHERE product_name = '$param'");
       // $result2 = $stmt2->get_result();
        if($result2->num_rows > 0) {
            echo "Product already in cart";
         
                
        }else{
            $variable2 = "It's empty";
            $sql3 = "INSERT INTO $table_name (product_name,name,image,type,product_ID,price,price_num) VALUES(?,?,?,?,?,?,?)";
            
            $stmt3 = $con->prepare($sql3);
            $stmt3->bind_param("sssssss",  $product_name   ,$name   , $image  , $type  ,  $product_id ,$price ,$price_num   );
            
            
            
            
            if($stmt3->execute()){
                $variable2 = "Product added successfully";
                echo $variable2;
            }else{
                $variable2 = "insert failed";
                echo $variable2;
                
            }
            /*
             $result4 = $con->query("SELECT product_name FROM product_cart WHERE product_name = '$variable'");
             
             if ($result2->num_rows > $result4->num_rows ) {
             $variable2 = "insert successful";
             
             }else{
             $variable2  = "insert unsuccesful";
             }
             */
        }
         }else{
             echo "Unable to query data";
         }
        }else{
            echo "Login First";
        }
    } catch (Exception $e) {
        echo $e->getMessage();
        
    }
}

function cartRemove($param){
    $user = 'root';
    $password = '';
    $database = 'database1';
    
    try {
        $con = new mysqli('localhost', $user, $password, $database) or die("Unable to connect");
        
   
        SESSION_START();
        $user_name = $_SESSION['name'];
        $user_email = $_SESSION['email'];
        $table_name = $user_name.$user_email;
           $sql1 = "DELETE FROM ". $table_name . " WHERE product_name = '$param'";
           $stmt1 = $con->prepare($sql1);
           if($stmt1->execute()){
               echo "Item removed successfully";
           }else{
               echo "Item not removed";
           }
            
        }catch(Exception $e){
            echo $e->getMessage();
            
        }
}

$variable3 = "a-wine-1.jpg";
//cartRemove($variable3);

?>
