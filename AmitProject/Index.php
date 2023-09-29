<?php
//require  'LoginLogic.php';
session_start();

if(isset($_SESSION['authenticated'])) {
    
    
}else{
    header("Location: Login.php");
}
require 'Connection.php';

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

<style>
nav{
    margin-top: -40px;
    width: 100%;
    
    
    
}
.account ul i[class*=user],
.account ul i[class*=search],
.account ul i[class*=bag],
.direct-links .link-1 p{
    color: #fff;
    border-color: #fff;
}
.account ul{
    border-color: #fff;
}

nav  i[class*=bag]:hover,
nav  i[class*=user]:hover,
nav i[class*=search]:hover{
	color: #a83232;
	background: #fff;
}
.home li a{
    color: #fff;
}
.logo p{
    color: #fff;
}
.direct-links .link-1 .below-a{
    font-size: 25px;
    font-family: 'Great Vibes', cursive;
    color: orange;
    font-weight: 200;
    transition: 1s ease;
    margin-top: 5px;
    margin-bottom: 15px;
}
.welcome{
    width: 100%;
}
.welcome p,
i{
	color: #fff;
	font-size: 13px;
}
.welcome h5,
.welcome .welcome-right i{
	font-size: 16px;
	margin-left: 10px;
	border-radius: 50%;
	padding: 7px 10px;
	color: #fff;
	font-weight: 600;
	border: 0.5px solid #fff;
}
.welcome .welcome-right i{
	padding: 0;
	padding: 8px 8px;
}
.welcome h5:hover,
.welcome .welcome-right i:hover{
	background: #fff;
	color: #a83232;
	border-color: #fff;
}
.actual-nav{
    width: 100%;
}
</style>
</head>
<body>
	<div class="nav-body-wrapper">
		<div class="outer-div">
			<div class="inner-div">
				<nav>
		<div class="search-bar" id="search-bar">
			<input class="margin" type="text" placeholder="Search here...">
		<i class="fa-solid fa-x" id="cancel-bar" style="background: transparent"></i>
		</div>
		
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
		<li><a href="" tittle="account"><h5><?php echo $name2[0]?></h5></a></li>
		<li><a href="" tittle="Log out"><i class="fa fa-sign-out" aria-hidden="true" id="log-out"></i></a></li>
		</ul>
		</div>
		<div class="actual-nav margin">
					<div class="logo">
						<p style="color: #fff">Vineyard</p>
					</div>
           <div class="drop-nav" style="display: flex;">
					<ul class="home">
						<li><a href="">HOME</a></li>
						<li><a href="">PRODUCTS</a></li>
						

					</ul>
					<div class="account">
						<ul>

                   			<li><i class="fas fa-search search fa-lg mr-3" id="search-button"></i></li>
						<!--  -	<li class=shopping-bag1><a href="Login.php"><i class="fa-solid fa-user user fa-lg shopping-bag"></i></a></li> -->
							<li class="shopping-bag2"><a href="Cart.php"><i class="fa-solid fa-bag-shopping bag fa-lg shopping-bag"></i></a></li>

						</ul>
						</div>
					</div>
					</div>
				</nav>
				<div class="slideshow-container">

					<div class="mySlides">
						<p>Wine Country</p>
					</div>

					<div class="mySlides">
						<p>Taste the greatness</p>
					</div>

					<div class="mySlides">
						<p>Indigenous recipies</p>
					</div>

					<a class="prev" onclick="plusSlides(-1)">❮</a> <a class="next"
						onclick="plusSlides(1)">❯</a>



					<div class="dot-container">
						<span class="dot" onclick="currentSlide(1)"></span> <span
							class="dot" onclick="currentSlide(2)"></span> <span class="dot"
							onclick="currentSlide(3)"></span>
					</div>
				</div>
				<div class="direct-links">
					<div class="link-1">
						<a href="#">
							<p>WINES & SPIRITS</p>
						</a>
						<p class="below-a">Explore our high quality wines</p>
						<hr>
					</div>
					<div class="link-1">
						<a href="#">
							<p>PRODUCTS</p>
						</a>
						<p class="below-a">We have got you covered</p>
						<hr>
					</div>
					<div class="link-1">
						<a href="#">
							<p>EVENTS</p>
						</a>
						<p class="below-a">Get to see our wine tasting</p>
						<hr>
					</div>
					<div class="link-1">
						<a href="#">
							<p>ABOUT US</p>
						</a>
						<p class="below-a">Learn about history of Vineyard</p>
						<hr>
					</div>
				</div>
			</div>
		</div>
		<div class="separater1 margin">
		<p>Check out this offer</p>
		<hr>
		</div>
		<div class="offer margin">
			<div class="l-offer">
				<p id="offer-p">Made using one of our most treasured recipies. Get two @ the price of three now:)</p>
				<div class="offer-details">
				<p>LUCTUSO CHARDONNAY</p>
				<h3 class="price p-price">Ksh8,999</h3>
				<button class="buy-now" onclick="alert1()">Buy now</button>
				</div>
			</div>
			<div class="r-offer">

			
				<img src="assets/images/a-wine-1-1.jpg">
			</div>
		</div>
		



       <div class="separator2 separater1">
       <p>Explore our products</p>
       <hr>
       </div>
       
       
       <!--  -- Products display php algorithm */ -->
		<div class="p-row margin">
		<?php 
		$sql = "SELECT* FROM product";
	     $result = $con->query($sql);
	     if($result->num_rows > 0){
	     while($row = $result->fetch_assoc()){
	         $id = $row['product_name'];
	         $url = "Product.php?id=" . $id;
	         
		    ?>
		    <a href="Product.php?id='<?php echo $id;?>'" style="position: relative" id="p-anchor">
		    <div class="product">
		    <img class="img-fluid" id ="img-fluid" src="<?php echo $row['image']?>">
		    <div class ="p-details margin">
		    <h2 class="product-name"><?php echo $row['name']?></h2>
		    <h3 class="p-price"><?php echo $row['price']?></h3>
		    </div>
		    <ul>
		    <li><button class="buy-button" id="p-heart"><i class="fa-solid fa-bag-shopping fa-lg" id="cart-button"></i></button></li>
		    <li><button class ="but-button" id ="p-bag"><i class="fas fa-heart fa-lg" id="cart-button"></i></button></li>
		    </ul>
		    </div>
		    </a>
		    <?php 
		}
	     }
		    
		
		/*
		$rows = mysqli_fetch_all($stmt, MYSQLI_ASSOC);
		if($rows != null){
		foreach ($rows as $row){
		    echo '<div class="product">';
		    echo '<img class="img-fluid" id="img-fluid" src="'. $row['image'] . '">';
		    echo '<div class="p-details margin">';
		    echo '<h2 class="product-name">' . $row['name'] .'</h2>';
		    echo '<h3 class="p-price">' . $row['price'] . '</h3>';
		    echo '</div>';
		    echo '<ul class="fav-cart-btn">';
		    echo '<li>';
		    echo '<button class="buy-button" onclick="alert1()">';
		    echo '<i class="fa-solid fa-bag-shopping fa-lg" id="cart-button"></i>';
		    echo '</button>';
		    echo '<button class="buy-button">';
		    echo '<i class="fas fa-heart fa-lg" id="cart-button"></i>';
		    echo '</button>';
		    echo '</li>';
		    echo '</ul>';
		    echo '</div>';
		    
		}
		}else{
		    echo "No of rows is null";
		}
         */
		?>
		
		<!-- ------ --
			<div class="product">
				<img class="img-fluid" id="img-fluid" src="assets/images/a-wine-1.jpg">
				<div class="p-details margin">
					<h2 class="product-name">LUCTUSO CHARDONNAY</h2>
					<h3 class="p-price">Ksh 3,000</h3>
				
					
				</div>
				<ul class="fav-cart-btn">
				<li>
					<button class="buy-button" onclick="alert1()">
						<i class="fa-solid fa-bag-shopping fa-lg" id="cart-button"></i>
					</button>
							<button class="buy-button">
						<i class="fas fa-heart fa-lg" id="cart-button"></i>
					</button>
					</li>
					</ul>
				
			</div>
		-->
			


		</div>
	</div>







	<!-- Javascript -->
	
	<script type="text/javascript">
		const images = [ 'assets/images/jpeg-11-2.jpg',
				'assets/images/jpeg-6.jpg', 'assets/images/jpeg-15-3.jpg' ];

		let currentIndex = 0;

		function changeBackgroundImage() {
			const div = document.querySelector('.outer-div');
			div.style.backgroundImage = `url('${images[currentIndex]}')`;
			currentIndex = (currentIndex + 1) % images.length;
		}

		setInterval(changeBackgroundImage, 10000);
		var slideIndex = 1;
		showSlides(slideIndex);

		function plusSlides(n) {
			showSlides(slideIndex += n);
		}

		function currentSlide(n) {
			showSlides(slideIndex = n);
		}
		/* This is the script for the quotes */
		function showSlides(n) {
			var i;
			var slides = document.getElementsByClassName("mySlides");
			var dots = document.getElementsByClassName("dot");
			if (n > slides.length) {
				slideIndex = 1
			}
			if (n < 1) {
				slideIndex = slides.length
			}
			for (i = 0; i < slides.length; i++) {
				slides[i].style.display = "none";
			}
			for (i = 0; i < dots.length; i++) {
				dots[i].className = dots[i].className.replace(" active", "");
			}
			slides[slideIndex - 1].style.display = "block";
			dots[slideIndex - 1].className += " active";
		}

		setInterval(function() {
			plusSlides(1);
		}, 10000);
		
		$(".product").on("mouseenter", function() {
			  // Code to be executed when the mouse enters the element
			  $(this).find('ul').css("display", "flex");
			  $(this).find('img').css("opacity", "0.4");
			});

			$(".product").on("mouseleave", function() {
			  // Code to be executed when the mouse leaves the element
				  $(this).find('ul').css("display", "none");
				  $(this).find('img').css("opacity", "1");
				  

			});
			/*
		$(document).ready(function() {
			$('.product').click(function(e) {
				e.preventDefault();
				var productId = $this.data('name');
				window.location.href = "Product.php?id=" + productId;
			});
		});
		*/
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
		
		/**********************This code is calling a php function to add products to cart **/
  $(document).ready(function() {
	    $('#log-out').click(function() {
	   var confirmation = confirm("Are you sure you want to logout...");
	      if(confirmation){
	      $.ajax({
	        url: 'LoginLogic.php',
	        type: 'POST',
	        data: {
	          function_name: 'logOut'
	        },
	        success: function(response) {
	          // Handle the response from the PHP function
	          console.log(response);
	          alert(response);
	          window.location = "http://localhost:8012/AmitProject";
	        },
	        error: function(xhr, status, error) {
	          // Handle errors
	          console.log(error);
	        }
	      });
	      }
	    });
	  });
	</script>
</body>
</html>