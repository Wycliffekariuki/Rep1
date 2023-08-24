<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $function_name = $_POST['function_name'];
    if ($function_name = 'addProduct') {
        if (isset($_POST['name'], $_POST['price'], $_POST['price_num'], $_POST['type'], $_POST['image'], $_POST['product_name'], $_POST['quantity'] )) {
            ;
        
        $name = $_POST['name'];
        $price = $_POST['price'];
        $price_num = $_POST['price_num'];
        $image = $_POST['type'];
        $type = $_POST['image'];
        $product_name = $_POST['product_name'];
        $quantity = $_POST['quantity'];
        $response = addProduct($name, $price, $price_num, $image, $type, $product_name, $quantity);
        ;
        }else{
            echo "Please fill in all the fields";
        }
    }
}



function addProduct($name, $price, $price_num, $type, $image, $product_name, $quantity) {
    
    $user = 'root';
    $password = '';
    $database = 'database1';
    
    try {
        $con = new mysqli('localhost', $user, $password, $database) or die("Unable to connect");
        if (empty($name) || empty($price) || empty($price_num) || empty($type) || empty($image) || empty($product_name) || empty($quantity) ){
            ;
            echo "Please fill in all the fields";
            
   
        }else{
            $result1 = $con->query("SELECT product_name FROM product WHERE product_name = '$product_name'");
            if ($result1->num_rows > 0) {
                echo "Product already exists";
            }else{
                $sql2 = "INSERT INTO product (name, price, price_num, type, image, product_name,quantity) VALUES(?,?,?,?,?,?,?)";
                $stmt1 = $con->prepare($sql2);
                $stmt1->bind_param("sssssss", $name, $price, $price_num, $type, $image, $product_name, $quantity );
                if($stmt1->execute()){
                    echo "Product added successfully";
                }else{
                    echo "Product inserting failed";
                }
            }
        }
    
        
    }catch(Exception $e){
        echo $e->getMessage();
        echo "Connection failed";
        
    }
}
/*
$name = "HANING BANNINGO";
$price = "Ksh11,999";
$price_num = 11999;
$image = "a-wine-7.jpg";
$type = "wine";
$product_name = "a-wine-7.jpg";
$quantity = 46;

addProduct($name, $price, $price_num, $image, $type, $product_name, $quantity );
*/
?>