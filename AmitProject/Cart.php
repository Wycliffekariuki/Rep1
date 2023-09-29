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
<link rel="Stylesheet" href="assets/css/Style.css">
<script src="https://kit.fontawesome.com/f5925100db.js" crossorigin="anonymous"></script>

<script src="assets/js/code.jquery.com_jquery-3.7.0.min.js"></script>	

<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css"
  rel="stylesheet"/>
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"
></script>
<style type="text/css">
.account ul{
    padding: 0px;
}
.welcome h5{
    margin-bottom: 0;
}
.checkout:hover{
	background: #a83232;
}
</style>
</head>
<body>
		<nav>
		<div class="search-bar" id="search-bar">
			<input class="margin" type="text" placeholder="Search here...">
		<i class="fa-solid fa-x" id="cancel-bar" style="background: transparent"></i>
		</div>
			<div class="welcome-outer margin">
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
		$user_name = $_SESSION['name'];
		$user_email = $_SESSION['email'];
		$user_table = $user_name.$user_email;
		require 'Connection.php';
		$cart_sql = "SELECT* FROM "  .$user_table;
		$cart_sql1 = "SELECT SUM(price_num) AS 'total_price' FROM " .$user_table;
		$cart_result1 = $con->query($cart_sql1);
		$total_price = null;
		if ($cart_result1->num_rows >0) {
		    $row1 = $cart_result1->fetch_assoc();
		    $total_price = $row1['total_price'];
		    ;
		}else{
		    $total_price = 0;
		    
		}
		$cart_result = $con->query($cart_sql);
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
		<li><a href="" tittle="Log out" id="log-out-1"><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
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
							<li class="shopping-bag2"><a href="Cart.php"><i class="fa-solid fa-bag-shopping bag fa-lg shopping-bag"></i></a></li>

						</ul>
						</div>
					</div>
					</div>
				</nav>
<section class="h-100 h-custom" style="background-color: #d2c9ff;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-lg-8">
                <div class="p-5" id="cart">
                  <div class="d-flex justify-content-between align-items-center mb-5">
                    <h1 class="fw-bold mb-0 text-black" style="letter-spacing: 3px">SHOPPING CART</h1>
                    <h6 class="mb-0 text-muted"><?php echo $cart_result->num_rows?></h6>
                  </div>
                  <hr class="my-4">
               <?php 
             
               while ($cart_row = $cart_result->fetch_assoc()){
                
                   
               
               ?>
                  <div class="row mb-4 d-flex justify-content-between align-items-center">
                    <div class="col-md-2 col-lg-2 col-xl-2">
                      <img
                        src="<?php echo $cart_row['image']; ?>"
                        class="img-fluid rounded-3" alt="<?php echo $cart_row['name']; ?>">
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3">
                      <h6 class="text-muted"><?php echo $cart_row['type']; ?></h6>
                      <h6 class="text-black mb-0"><?php echo $cart_row['name']; ?></h6>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                      <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                      <i class="fa-solid fa-minus"></i> 
                      </button>

                      <input id="form1" min="0" name="quantity" value="1" type="number"
                        class="form-control form-control-sm" />

                      <button class="btn btn-link px-2"
                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                   <i class="fa-solid fa-plus"></i> 
                      </button>
                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                      <h6 class="mb-0"><?php echo $cart_row['price']; ?></h6>
                    </div>
                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                      <a href="" class="text-muted"><i class="fas fa-times cancel-button" data-product-id="<?php echo $cart_row['product_name']?>"></i></a>
                    </div>
                  </div>

                  <hr class="my-4">
                  <?php 
               }
                  ?>
                  
                  
                  


                  <div class="pt-5">
                    <h6 class="mb-0"><a href="#!" class="text-body"><i
                          class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 bg-grey">
                <div class="p-5">
                  <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                  <hr class="my-4">

                  <div class="d-flex justify-content-between mb-4">
                    <h5 class="text-uppercase">items <?php echo $cart_result->num_rows?></h5>
                    <h5>Ksh <?php echo $total_price;?></h5>
                  </div>

                  <h5 class="text-uppercase mb-3">Shipping</h5>

                  <div class="mb-4 pb-2">
                    <select class="select">
                      <option value="1">Standard-Delivery- €5.00</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                      <option value="4">Four</option>
                    </select>
                  </div>

                  <h5 class="text-uppercase mb-3">Give code</h5>

                  <div class="mb-5">
                    <div class="form-outline">
                      <input type="text" id="form3Examplea2" class="form-control form-control-lg" />
                      <label class="form-label" for="form3Examplea2">Enter your code</label>
                    </div>
                  </div>

                  <hr class="my-4">

                  <div class="d-flex justify-content-between mb-5">
                    <h5 class="text-uppercase">Total price</h5>
                    <h5>Ksh <?php echo $total_price;?></h5>
                  </div>

                  <button type="button" class="btn btn-dark btn-block btn-lg checkout"
                    data-mdb-ripple-color="dark">Checkout</button>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
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

$(document).ready(function() {
	  // Attach the click event handler to the 'cart' element and delegate it to 'cancel-button'
	  $('#cart').on('click', '.cancel-button', function() {
	    var productElement = $(this).closest('.cancel-button');
	    var phpVariable = productElement.data('product-id');
	    // Get the necessary information from the product element
	   // var productId = productElement.data('product-id');

	    // Call a function or do whatever you need to remove the product from the cart
	    // Example: removeProductFromCart(productId);

	    // For demonstration purposes, let's just remove the product element from the cart
	
	    var confirmation = confirm("Remove this item from cart...");
	    if(confirmation){
	    $.ajax({
	      url: 'CartLogic.php',
	      type: 'POST',
	      data: {
	        function_name: 'cartRemove',
	        variable1: phpVariable,
	        variable: 'hi'
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
	    }else{
	        
	    }
	  });
	});



$(document).ready(function() {
    $('#log-out-1').click(function() {
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