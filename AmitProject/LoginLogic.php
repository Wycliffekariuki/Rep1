
<?php
session_start();


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $function_name = $_POST['function_name'];
    if($function_name = 'logOut'){
        $response = logOut();
    }
    
    
}
function logOut() {
    try {
        session_unset();
        session_destroy();
        echo "logout successful";
    } catch (Exception $e) {
        echo $e->get_message();
    }
    
}











function while1(){
define("greeting","I am Mr Kamondo");
$a = 1;
while($a <= 10){
    echo $a;
    echo "</br>";
    $a++;
}
}
function doWhile1(){
print "<h1>This is doWhile loop</h1>";
do{
    echo $a;
    echo "</br>";
    $a++;
   
} while($a <= 20);
}
function for1(){
    print "<h1>This is for loop</h1>";
for($a = 1;$a <= 10;$a++){
    if($a === 4){
        continue;
    }else{
        echo "I have been printed 10 times";
        print "</br>";
    }
    }
}
function forEach1(){
    print "<h1>This is foreach loop</h1>";
    
$cars = array("Bugatti", "Lamborgini","Bugatti Cheron" );

foreach ($cars as $values){
echo "$values </br>";
}
}
function arrayEcho(){
$cars = array("Bugatti", "Lamborgini","Bugatti Cheron" );
    
$arrlength = count($cars);
for($b = 0;$b < $arrlength;$b++){
    echo $cars[$b];
    echo "</br>";
}
}
function assosArray(){
$marks = array("peter" => "A", "Ben" => "B", "Samuel" => "C");
echo "Peter got an " . $marks['peter'] . " in the test.";
}
function SupperGlobals(){
echo $_SERVER['SERVER_NAME'];
print "</br>";
eCHO $_SERVER['SCRIPT_NAME'];
print "</br>";

echo $_SERVER['HTTP_HOST'];
print "</br>";

echo $_SERVER['HTTP_USER_AGENT'];
print "</br>";
echo $_SERVER['PHP_SELF'];

}
//arrayEcho();
/*
require 'Login.php';

if(isset($_SESSION('authenticated'))){
    session_start();
    $_SESSION('authenticated_final') = true;
}else{
    session_start();
    $_SESSION('authenticated_final') = true;
}




/*
require 'Connection.php';
$email = null;
$message = null;
$password = null;

if($con !== null){
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $condition = $email;
        $sql = "SELECT password FROM login WHERE email = '$condition'";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        
        while($row = $result->fetch_assoc()){
            if($row !== null){
            if($row['password'] === $password){
                header("Location: Index.php");
                
                $message = "Login successfull";
                $message1 = json_encode($message);
                echo ($message1);
                SESSION_START();
                $_SESSION['authenticated'] = true;
      
            }else {
                
                $message1 = json_encode($message);
                echo ($message1);
                $_SESSION['authenticated'] = false;
                $message = "Login failed"; 
                 //  header("Location: Login.php");
            }
            }else{
                $message = "No such user";
                $message1 = json_encode($message);
                echo ($message1);
            }
            
        }
        
    }
}else{
    $message = "Connection is null";
}
*/
?>