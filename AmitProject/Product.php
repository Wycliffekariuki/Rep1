<?php 
session_start();

if(isset($_SESSION['authenticated'])) {
    
}else{
    header("Location: Login.php");
    exit();
    
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Insert title here</title>
<link rel="Stylesheet" href="assets/css/Style.css">
<script src="https://kit.fontawesome.com/f5925100db.js" crossorigin="anonymous"></script>
<script src="assets/js/Script.js"></script>

<script src="assets/js/code.jquery.com_jquery-3.7.0.min.js"></script>
<style>
/*
nav{
width: 100%;
position: relative;
}
nav .logo p{
    color: #a83232;
}
nav ul li a,
.link-1 a p,
nav i[class*=search],
nav input[type="text"]{
    color: black;
}

.account ul{
    border: 0.5px solid black;
}
.account ul i[class*= search]{
    border-right: 0.5px solid black;
    font-wight: 300;
    color: #717873;
    transition: background-color 100ms linear;
    
}
.account ul i[class*= user]{
    border-right: 0.5px solid black;
    color: #717873;
    
}
.account ul i[class*= bag]{
    color: #717873;
}
nav  i[class*=fa-solid]:hover,
nav  i[class*=fas]:hover,
nav i[class*=search]:hover{
	background: #a83232;
	color: #fff;
}
.home li{
    margin-left: 15px;
}
.home li a{
    font-family: 'Nanum Myeongjo', serif;
	font-weight: 400;
	font-size: 16px;
	letter-spacing: 3px;
}
nav input[type="text"]{
    position: absolute;
    z-index: 1;
    width: 100%;
    display: inline-block;
    height: 80px;
    color: #a83232;
    background: #FFFBF9;
    text-indent: 60px;
    font-family: 'Nanum Myeongjo', serif;
	font-weight: 400;
	font-size: 16px;
	border: none;
}
.search-bar{
    box-sizing: border-box;
    position: relative;
    z-index: 1;
    width: 100%;
    display: none;
}

.search-bar  i{
    position: absolute;
    top: 40%;
    right: 0;
    z-index: 1;
    margin-right: 70px;
    border: none;
    background: transparent;
    padding-top: 2.3%;
}
#cancel-bar{

}
#cancel-bar:hover{
    color: #a83232;
}
*/
</style>	
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
				<?php 
				
				require 'Connection.php';
				$condition = $_GET['id'];
				$p_sql = "SELECT name,price,image,type,product_name FROM product WHERE product_name = $condition";
				$p_stmt = $con->prepare($p_sql);
				//$p_stmt->bind_param("1",$condition);
				$p_stmt->execute();
				$p_result = $p_stmt->get_result();
				$name = null;
				$image = null;
				$price = null;
				$type = null;
				$product_name = null;
				while ($row = $p_result->fetch_assoc()) {
				    $name = $row['name'];
				    $image = $row['image'];
				    $price = $row['price'];
				    $type = $row['type'];
				    $product_name = $row['product_name'];
				}
				?>
		<div class="product-row margin">
			<div class="product-image">
				<img alt="" src="<?php echo $image;?>">
			</div>
			<div class="product-details">
				<h2><?php echo $name;?></h2>

				<div class="rating">
				
					<i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
						class="fa fa-star"></i> <i class="fa fa-star"></i> <i
						class="fa fa-star-o"></i>
						<span>(1 Customer review)</span>
				</div>
				<h3><?php echo $price;?></h3>
				<p>This wine has been made with one of our most exotic recipies dating back to our ancesters. This
				 bottle peace has been made with greatness in mind. This trully make you appretiate wines in general. Cheers</p>
				 <div class="p-buttons" id="p-buttons">
				 <div class="quantity"><input type="number" value="1" min="1" max="10" id="quantity"></div>
				 <button id="add-p">ADD TO CART</button>
				 </div>
			 <div class="p-fav">
			 <button><i class="fa fa-heart-o"></i></button><span class="span">ADD TO WISHLIST</span>
				 <p>category ~ wine</p>
				 </div>
				 
			</div>
				
			
		</div>
		<?php 
       
		?>
		<div class="p-reviews margin">
			<ul class="margin">
				<li><p id="info">INFO</p></li>
				<li><P id="review">REVIEWS</P></li>
			</ul>
			<hr>
			<div class="info-reviews margin">
				<table class="info">

					<tr>
						<td><p class="p">WEIGHT</p></td>
						<td class="span"><span>2Kg</span></td>
					</tr>
					<tr>
						<td><P class="p">DIMENSIONS</P></td>
						<td class="span"><span>32 18 43 cm</span></td>
					</tr>
				</table>
				<div class="reviews margin">
					<img alt="" src="assets/images/melissa-1.jpg">
					<div class="review-details">
						<div class="date-rate">
							<p>August 6,2023</p>
							<div class="rating">

								<i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
									class="fa fa-star"></i> <i class="fa fa-star"></i> <i
									class="fa fa-star-o"></i>
							</div>
						</div>
						<p class="name">MELISSA BENOIST</p>
						<p>I bought this thing to celebrate my graduation. It was probable
							one of the best wines i have ever tasted. It is quite expensive
							throught so thats why i gave it a rating of 4. cheers :)</p>
					</div>
				</div>
			</div>
		</div>
		<div class="related-p margin">
		<p>RELATED PRODUCTS</p>
			<div class="p-row margin">
<?php 
        require 'Connection.php';
		$sql = "SELECT* FROM product LIMIT 4";
	     $result = $con->query($sql);
	     if($result->num_rows > 0){
	     while($row = $result->fetch_assoc()){
	         $id = $row['product_name'];
	         $url = "Product.php?id=" . $id;
	         
		    ?>
		    <a href="Product.php?id='<?php echo $id;?>'" style="position: relative">
		    <div class="product">
		    <img class="img-fluid" id ="img-fluid" src="<?php echo $row['image']?>">
		    <div class ="p-details margin">
		    <h2 class="product-name"><?php echo $row['name']?></h2>
		    <h3 class="p-price"><?php echo $row['price']?></h3>
		    </div>
		    <ul>
		    <li><button class="buy-button"><i class="fa-solid fa-bag-shopping fa-lg" id="cart-button"></i></button></li>
		    <li><button class ="but-button"><i class="fas fa-heart fa-lg" id="cart-button"></i></button></li>
		    </ul>
		    </div>
		    </a>
		    <?php 
		}
	     }
	     ?>
		</div>
		</div>
	</div>
<script type="text/javascript">
jQuery('<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>').insertAfter('.quantity input');
jQuery('.quantity').each(function() {
  var spinner = jQuery(this),
    input = spinner.find('input[type="number"]'),
    btnUp = spinner.find('.quantity-up'),
    btnDown = spinner.find('.quantity-down'),
    min = input.attr('min'),
    max = input.attr('max');

  btnUp.click(function() {
    var oldValue = parseFloat(input.val());
    if (oldValue >= max) {
      var newVal = oldValue;
    } else {
      var newVal = oldValue + 1;
    }
    spinner.find("input").val(newVal);
    spinner.find("input").trigger("change");
  });

  btnDown.click(function() {
    var oldValue = parseFloat(input.val());
    if (oldValue <= min) {
      var newVal = oldValue;
    } else {
      var newVal = oldValue - 1;
    }
    spinner.find("input").val(newVal);
    spinner.find("input").trigger("change");
  });

});
/*  ****************** Products Hover efffect for buttons **********/
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



  $(document).ready(function() {
    $('#add-p').click(function() {
      var phpVariable = '<?php echo $product_name; ?>';

      $.ajax({
        url: 'CartLogic.php',
        type: 'POST',
        data: {
          function_name: 'cartInsert',
          variable: phpVariable,
          variable1: 'hi' 
        },
        success: function(response) {
          // Handle the response from the PHP function
          console.log(response);
          alert(response);
        },
        error: function(xhr, status, error) {
          // Handle errors
          console.log(error);
        }
      });
    });
  });

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
	  // This code switches the details and reviews of a product


	$('#review').on('click', function() {
		$('.reviews').css('display','flex');
		$('.info').css('display','none');
		$('#review').css('color', '#a83232');
		$('#info').css('color', '#111');
	});
	$('#info').on('click', function() {
		$('.reviews').css('display','none');
		$('.info').css('display','block');
		$('#info').css('color', '#a83232');
		$('#review').css('color', '#111');
	});
 });
</script>
</body>
</html>