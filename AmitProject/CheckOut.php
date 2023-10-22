<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="Stylesheet" href="assets/css/Style.css">
<link href="https://unpkg.com/pattern.css" rel="stylesheet">
<script src="https://kit.fontawesome.com/f5925100db.js" crossorigin="anonymous"></script>
<script src="assets/js/Script.js"></script>
<script src="assets/js/code.jquery.com_jquery-3.7.0.min.js"></script>
<title>Vineyard</title>	

</head>
<body>
<div class="nav-body-wrapper">
		<nav>
		<div class="search-bar" id="search-bar">
			<input class="margin" type="text" placeholder="Search here...">
		<i class="fa-solid fa-x" id="cancel-bar" style="background: transparent"></i>
		</div>
		<div class="welcome-outer">
		<div class="welcome margin">
		
		<ul class="welcome-left">
				<li><p>Follow Us</p></li>
		
		<li><a><i class="fa-brands fa-instagram"></i></a></li>
		<li><a><i class="fa-brands fa-facebook"></i></a></li>
		<li><a><i class="fa-brands fa-twitter"></i></a></li>
		</ul>
		<ul class="welcome-right">
		<li><a>
		<?php 
		$name = $_SESSION['name'];
		$name2 = strtoupper($name);
		
		if (isset($_SESSION['name'])) {
		    echo "<p>Welcome, ". $name ."</p>";
		    
		}else{
		    echo "session variable gone";
		    
		}
		?>
		
		</a></li>
		<li><a href="" tittle="account"><h5><?php echo $name2[0]?><span class="tooltiptext">Account</span>
		</h5></a></li>
		<li><a href="" tittle="Log out" id="log-out"><i class="fa fa-sign-out" aria-hidden="true"></i>  <span class="tooltiptext">Log out</span>
		</a></li>
		</ul>
		</div>
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
							<!--  --<li class=shopping-bag1><a href="Login.php"><i class="fa-solid fa-user user fa-lg shopping-bag"></i></a></li> -->
							<li class="shopping-bag2"><a href="Cart.php"><i class="fa-solid fa-bag-shopping bag fa-lg shopping-bag"></i></a></li>

						</ul>
						</div>
					</div>
					</div>
				</nav>
				
		<div class="product-row  margin">
			<h4>CHECK OUT</h4>
			<div class="address">
			<div class="input-container">
			<input type="text" name="f-name" placeholder="First Name" id="f-name">
			<label for="f-name">First Name</label>
			</div>
			<div class="input-container">
			<input type="text" name="l-name" placeholder="Last Name" id="l-name">
			<label for"l-name">Last Name</label>
			</div>
			<div class="input-container">
			<input type="number" name="number" placeholder="Phone Number" id="number">
			<label for="number">Phone Number</label>
			</div>
			<div class="input-container">
			<input type="text" name="address" placeholder="Address" id="address">
			<label for="address">Address</label>
			</div>
			<div class="input-container">
			<input type="text" name="address-info" placeholder="Additional Information" id="address-info">
			<label for="address-info">Additional Information</label>
			</div>
			<div class="input-container-n">
			<select id="region">
			<option value=""></option>
			<option value="" disabled>Please select</option>
			<option value="Baringo">Baringo</option>
			<option value="Bomet">Bomet</option>
			<option value="Bungoma">Bungoma</option>
			<option value="Busia">Busia</option>
			<option value="Elgeyo-Marakwet">Elgeyo-Marakwet</option>
			<option value="Embu">Embu</option>
			<option value="Garissa">Garissa</option>
			<option value="Homa Bay">Homa Bay</option>
			<option value="Isiolo">Isiolo</option>
			<option value="Kajiado">Kajiado</option>
			<option value="Kakamega">Kakamega</option>
			<option value="Kericho">Kericho</option>
			<option value="Kericho">Kericho</option>
			<option value="Kilifi">Kilifi</option>
			<option value="Kirinyaga">Kirinyaga</option>
			<option value="Kisii">Kisii</option>
			<option value="Kisumu">Kisumu</option>
			<option value="Kitui">Kitui</option>
			<option value="Kwale">Kwale</option>
			<option value="Laikipia">Laikipia</option>
			<option value="Lamu">Lamu</option>
			<option value="Machakos">Machakos</option>
			<option value="Makueni">Makueni</option>
			<option value="Marsabit">Marsabit</option>
			<option value="Meru">Meru</option>
			<option value="Migori">Migori</option>
			<option value="Mombasa">Mombasa</option>
			<option value="Murang'a">Murang'a</option>
			<option value="Nairobi" selected>Nairobi</option>
			<option value="Nakuru">Nakuru</option>
			<option value="Nandi">Nandi</option>
			<option value="Narok">Narok</option>
			<option value="Nyamira">Nyamira</option>
			<option value="Nyandarua">Nyandarua</option>
			<option value="Nyeri">Nyeri</option>
			<option value="Samburu">Samburu</option>
			<option value="Siaya">Siaya</option>
			<option value="Taita-Taveta">Taita-Taveta</option>
			<option value="Tana River">Tana River</option>
			<option value="Tharaka-Nithi">Tharaka-Nithi</option>
			<option value="Trans-Nzoia">Trans-Nzoia</option>
			<option value="Turkana">Turkana</option>
			<option value="Uasin Gishu">Uasin Gishu</option>
			<option value="Vihiga">Vihiga</option>
			<option value="West Pokot">West Pokot</option>
			</select>
			<label for="region">Region</label>
			</div>
			<div class="input-container">
			<input type="text" name="email" placeholder="email" id="email">
			<label for="email"></label>
			</div>
			<div class="input-container">
			<input type="number" name="postcode" placeholder="postcode" id="postcode">
			<label for="postcode"></label>
			</div>
			
			
			</div>	
			
		</div>
		<?php 
       
		?>
		<div class="p-reviews margin">
			
		</div>
		
	</div>
<script type="text/javascript">
$(document).ready(function() {
	
    $('input[type="text"]').focus(function() {
        $(this).next('label').css('display','block');
        $(this).attr('placeholder','');

        });

    $('input[type="text"]').blur(function() {
        $(this).next('label').css('display','none');
        var originalPlaceholder = $(this).attr('placeholder');
        $(this).val(originalPlaceholder);
        });
	
});

</script>	
</body>
</html>