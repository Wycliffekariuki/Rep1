<?php
SESSION_START();
if (isset($_SESSION['authenticated'])) {
    header("Location: Index.php");
}
//require  'LoginLogic.php';




$email = null;
$message = null;
$password = null;
$role = "admin";
$name = null;
require 'Connection.php';

if(isset($con)){
    
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $condition = $email;
        //$sql = "SELECT password,role,firstName,email,ID FROM login WHERE email = ?";
        $sql = "SELECT password, role, firstName, email, ID FROM login WHERE email = ?";
        $sql1 = "SELECT password, role, firstName, email, ID FROM login WHERE email = '$email'";
        
        $stmt1  = $con->query($sql1);

        $admin = "admin";
        if ($stmt1->num_rows > 0) {
            $stmt = $con->prepare($sql);
            $stmt->bind_param("s",$email);
            $stmt->execute();
            $result = $stmt->get_result();
            ;
        
        while($row = $result->fetch_assoc()){
                if($row['password'] === $password){
                    if (!$row['role'] ==$admin) {
                    $_SESSION['admin'] = false;
                    $_SESSION['authenticated'] = true;
                    $_SESSION['name'] = $row['firstName'];
                    $_SESSION['email'] = $row['ID'];
                    header("Location: Index.php");
                    }else{
                        $_SESSION['authenticated'] = true;
                        $_SESSION['admin'] = true;
                        $_SESSION['email'] = $row['ID'];
                        $_SESSION['name'] = $row['firstName'];
                        

                        header("Location: Admin.php");
                    }
                }else {
                    $_SESSION['admin'] = false;
                    $_SESSION['authenticated'] = false;
                    $_SESSION['name'] = null;
                    $_SESSION['email'] = null;
                    $message = "Wrong password";
                    //  header("Location: Login.php");
                }
            
            
        }
    }else{
        $message = "Invalid email SignUp";
        
    }
    }
}else{
    $message = "Error on our end";
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="Stylesheet" href="assets/css/Style.css">
<script src="https://kit.fontawesome.com/f5925100db.js" crossorigin="anonymous"></script>

<script src="assets/js/code.jquery.com_jquery-3.7.0.min.js"></script>
<style>
p {
	margin-bottom: 20px;
	max-inline-size: 200px;
}
body{
position: relative;
}
nav{
position: absolute;
}
</style>
</head>
<body>
<nav>
		<div class="search-bar" id="search-bar">
			<input class="margin" type="text" placeholder="Search here...">
		<i class="fa-solid fa-x" id="cancel-bar" style="background: transparent"></i>
		</div>
		<div class="actual-nav margin">
		        
					<div class="logo">
						<p>Vineyard</p>
					</div>
           <div class="drop-nav" style="display: flex;">
					<ul class="home">
						<li><a href="Index.php">HOME</a></li>
						<li><a href="">PRODUCTS</a></li>
						

					</ul>
					<div class="account">
						<ul>

                   			<li><i class="fas fa-search search fa-lg mr-3" id="search-button"></i></li>
							<li class=shopping-bag1><a href="Login.php"><i class="fa-solid fa-user user fa-lg shopping-bag"></i></a></li>
							<li class="shopping-bag2"><a href="Cart.php"><i class="fa-solid fa-bag-shopping bag fa-lg shopping-bag"></i></a></li>

						</ul>
						</div>
					</div>
					</div>
				</nav>
	<div class="wrapper">

		<div class="form-div">
			<p id="message"><?php echo($message); ?> </p>
			<form action="Login.php" id="login_form" method="post">
				<h2>Please Login</h2>
				<input type="text" name="email" id="email" placeholder="email" required=""> 
				<input type="text" name="password" id="password" placeholder="Password" required="">
				 <input type="submit" name="submit" value="Login">
				<p>If you don't have and account</p>

				<a href="SignUp.php"><input type="button" onclick=""
					name="popup-form" value="Signup"></a>
			</form>
		</div>

	</div>
<script type="text/javascript">

/****** This code implements the disappearing search-bar *****/
$(document).ready(function() {
$('#search-button').on('click', function(){
	var search_status = $('#search-bar').css('display');
    if(search_status === 'none'){
        $('#search-bar').css("display", "inline-block");
    }else{
        $('#search-bar').css("display", "none");
    }
});
});
	
$(document).ready(function() {
	$('#cancel-bar').on('click', function(){
		var search_status = $('#search-bar').css('display');
	    if(search_status === 'none'){
	        $('#search-bar').css("display", "inline-block");
	    }else{
	        $('#search-bar').css("display", "none");
	    }
	});
	});
</script>
</body>
</html>
<?php 

?>
