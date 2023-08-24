<?php
SESSION_START();
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

<script src="assets/js/code.jquery.com_jquery-3.7.0.min.js"></script>
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
		$name = "O";
		$name2 = strtoupper($name);
		if(!($_SESSION['name']) === NULL) {
		    $name = $_SESSION['name'];
		    $name2 = strtoupper($name);
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
<div class="menu-content margin">
<div class="menu">
<ul>
<li><button>Dashboard</button></li>
<li><button>Add product</button></li>
<li><button>Edit Price</button></li>
<li><button>Add admin</button></li>
<li><button></button></li>
<li><button></button></li>

</ul>
</div>
<div class="content">
<div class="dashboard">
<div class="no of-users">
<p>Number of registered users 5</p>
</div>
<div class="no of-products">
<p>Number of products is 5</p>
</div>
<div class="no of-orders">
<p>Number of orders is 3</p>
</div>
<div class="no of-orders">
<p>Number of completed orders</p>
</div>
<div class="statistics">

</div>
</div>
<div class="add-product">
<p>ADD A PRODUCT</p>
<table>
<tr><td>Name of product</td>
<td><input type="text" name="name"></td></tr>
<tr><td>Price of product</td>
<td><input type="text" name="price"></td></tr>
<tr><td>Integer form price</td>
<td><input type="number" name="price-num"></td></tr>
<tr><td>Type of product</td>
<td><input type="text" name="type"></td></tr>
<tr><td>Image directory</td>
<td><input type="text" name="image"></td></tr>
<tr><td>Product name just image directory</td>
<td><input type="text" name="product_name"></td></tr>
<tr><td>Quantity</td>
<td><input type="number" name="quantity"></td></tr>
</table>
<input type="submit" id="submit" value="ADD PRODUCT">

</div>
</div>
</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
	$('#submit').click(function() {
		  var  name = $('input[name="name"]').val();
		  var  price = $('input[name="price"]').val();
		  var  price_num = $('input[name="price-num"]').val();
		  var  type = $('input[name="type"]').val();
		  var  image = $('input[name="image"]').val();
		  var  product_name = $('input[name="product_name"]').val();
		  var quantity = $('input[name="quantity"]').val(); // Missing this line
			  
		  var confirmation = confirm("Add this product to database...");
		  if(confirmation){
			  $.ajax({
				  url: 'SignUpLogic.php',
				  type: 'POST',
				  data: {
					  function_name: 'addProduct',
					  name, 
					  price ,
					  price_num ,
					  type ,
					  image ,
					  product_name,
					  quantity
				  },
				  success: function(response){
				  alert(response);
		          window.location = "http://localhost:8012/AmitProject/Admin.php";
				  
			  },
			  error: function(xhr, status, error){
				  console.log(error);
			  }

		    });
		  }	
	});

	
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
