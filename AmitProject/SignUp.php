<?php
//require  'LoginLogic.php';
require 'Connection.php';

SESSION_START();
if (isset($_SESSION['authenticated'])) {
    header("Location: Index.php");
}




$message = "";

if (isset($_POST['submit'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password1 = $_POST['password1'];
    $checkuser = "SELECT email from login where email = '$email'";
    $result = $con->query($checkuser);
    if (!$result->num_rows > 0) {
    
    if ($con === null) {
        $message = "Connection Error";
    } else {
        $sql = "INSERT INTO login (firstName, lastName, email, password) VALUES ('$firstName', '$lastName', '$email', '$password')";

        if ($password === $password1) {
            if (($con->query($sql)) === TRUE) {
                $message = "Details submitted successfully";
                header("Location: Login.php");
            } else {
                echo "Error: " . $sql . "<br>" . $con->error;
                $message = "Chech details and try again";
            }
        } else {
            $message = "Passwords don't match";
        }
        $con->close();
    }
    }else{
        $message = "User exists";
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="Stylesheet" href="assets/css/Style.css">
<script src="https://kit.fontawesome.com/f5925100db.js"
	crossorigin="anonymous"></script>

<script src="assets/js/code.jquery.com_jquery-3.7.0.min.js"></script>
<style>
p {
	margin-bottom: 20px;
	max-inline-size: 200px;
}

p.ex1 {
	maxwidth: 200px;
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
		<input class="margin" type="text" placeholder="Search here..."> <i
			class="fa-solid fa-x" id="cancel-bar" style="background: transparent"></i>
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
					<li class=shopping-bag1><a href="Login.php"><i
							class="fa-solid fa-user user fa-lg shopping-bag"></i></a></li>
					<li class="shopping-bag2"><a href="Cart.php"><i
							class="fa-solid fa-bag-shopping bag fa-lg shopping-bag"></i></a></li>

				</ul>
			</div>
		</div>
	</div>
	</nav>
	<div class="wrapper">

		<div class="form-div">
			<form action="SignUp.php" method="POST">
				<h5><?php echo $message; ?></h5>
				<h2>JOIN US</h2>
				<input type="text" name="firstName" id="firstName"
					placeholder="firstName" required=""> <input type="text"
					name="lastName" id="lastName" placeholder="lastName" required=""> <input
					type="text" name="email" id="email" placeholder="email" required="">
				<input type="text" name="password" id="password"
					placeholder="Password" required=""> <input type="text"
					name="password1" id="password1" placeholder="Password" required="">
				<input type="submit" name="submit" value="Submit">
				<p>If you already have an account</p>
				<a href="Login.php"><input type="button" name="popup-form"
					value="LogIn"></a>
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