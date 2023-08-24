
  /*$(document).ready(function() {
    $('#log-out').click(function() {
   var confirmation = confirm("Are you sure you want to logout...");
      if(confirmation){
      $.ajax({
        url: 'Login.php',
        type: 'POST',
        data: {
          function_name: 'logOut'
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
      }
    });
  });
/*
const elements = document.querySelectorAll('.product');
elements.forEach(element => {


});
function handleMouseEnter() {
	const elements2 = document.querySelectorAll(".fav-cart-btn");
	elements2.forEach(element => {
		element.style.display = 'flex';
		element.style.background = 'red';
		
	});

}
function handleMouseEnter() {
	const elements2 = document.querySelectorAll(".fav-cart-btn");
	elements2.forEach(element => {
		element.style.display = 'none';
	});

}

/*
const gridContainer = document.querySelector('.p-row');
const gridContainer1 = Array.from(gridContainer);
const gridCells = gridContainer1.forEach(gridCell => {
	gridCell.addEventListener('mouseenter', handleMouseEnter);
	gridCell.addEventListener('mouseleave', handleMouseLeave);
});

function handleMouseEnter(){
	this.classList.add('hovered');
	const productImage = decument.getElementByClass('.img-fluid');
 productImage.forEach(element => {
		element.style.opacity = '0.5';
	});
	productImage.style.opacity = '0.5';
}
function handleMouseLeave(){
	this.classList.remove('hovered');
}


var foo = document.getElementById("product");
foo.addEventListener('mouseover',function(){
   foo.style.display="block";
   foo.style.opacity= 0.5;
})
foo.addEventListener('mouseleave',function(){
   foo.style.display="block";
})
function alert1(){
	alert("I am working then others should work!!!");
}
*/