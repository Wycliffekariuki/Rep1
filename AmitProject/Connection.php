<?php
$user = 'root';
$password = '';
$database = 'database1';
 
try {
$con = new mysqli('localhost', $user, $password, $database) or die("Unable to connect");

}catch(Exception $e){
    //echo $e->erro_message();
    echo "Error on our end...";
    
}
?>