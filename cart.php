<?php
	session_start();
	require 'dbconfig/config.php';
	$username=$_SESSION['username'];
	$query="SELECT * FROM cart c,book b where c.bid=b.bookid and b.status=0 and c.username='$username'";
	$query1="SELECT SUM(bprice) as value_sum from cart c,book b where c.bid=b.bookid and b.status=0 and c.username='$username'";
	$query2="SELECT * from userdetails where username='$username'";
	//$query3=""
	//$query4="DELETE FROM `cart`  WHERE username='$username'";
	$result=mysqli_query($con,$query);
	$result1=mysqli_query($con,$query1);
	$result2=mysqli_query($con,$query2);
	//$result4=mysqli_query($con,$query4);
	
	if(isset($_POST['remove']))
 {
	 $bids=$_POST['hidden_i'];
	 $username2=$_SESSION['username'];
	 $query2="DELETE from cart where bid='$bids'";
					$query_run= mysqli_query($con,$query2);
					if($query_run)
					{
						$message = "Removed From Cart";
						//echo "<script type='text/javascript'>alert('$message');</script>";
						echo"<script>
						var x= document.getElementById('success');
						x.style.display='block';
						</script>";
						header("Refresh: 1");
						
					}
					else
					{
						echo '<script type="text/javascript"> alert("Error!")</script>';
					}

 }
 
 if (isset($_POST['checkout']))
 {
	 $username1=$_SESSION['username'];
	 $query5="SELECT * FROM cart c,book b where c.bid=b.bookid and b.status=0 and c.username='$username1'";
	 
	 $result5=mysqli_query($con,$query5);
	 $address=$_POST['caddress'].",".$_POST['ccountry'].",".$_POST['ccode'];
	 $cno=$_POST['ccontactno'];
	 $pmode=$_POST['payment'];
     while($rows1=mysqli_fetch_assoc($result5))
		{
			$boid=$rows1['bid'];
			$bpri=$rows1['bprice'];
			
			$query6="insert into orders values('','$boid','$address','$cno','$username1','0','$pmode','$bpri')";
			$result6=mysqli_query($con,$query6);
			
			$query8="update book set status='2' where bookid='$boid'";
			$result8=mysqli_query($con,$query8);
			
			$query7="delete from cart where username='$username1'and bid='$boid'";
			$result7=mysqli_query($con,$query7);
			
		}

		if($result6)
			{
				$message = "Successful";
				echo"<script>
						var x= document.getElementById('success1');
						x.style.display='block';
					</script>";
			}
			
		else
		{
			echo '<script type="text/javascript"> alert("Error!")</script>';
		}
		
		header("refresh: 1");
 }
	 
if(isset($_POST['logout']))
{
	session_destroy();
	header('location:index.php');
}

?>


<!DOCTYPE html>
<html>
<head>

<title>Cart</title> 
<link rel="stylesheet" href="css/style.css"> 
<link href="https://fonts.googleapis.com/css?family=Cabin|Concert+One|Inconsolata|Nunito|Nunito+Sans|Oswald|Pacifico|Quicksand|Rubik|VT323&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel = "shortcut icon" type="image/png" href="imgs/logo3.png">
<link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
	<!-- <link rel="stylesheet" type="text/css" href="C:\Users\disha\OneDrive\Desktop\HTML EXE\bootstrap\css\bootstrap.css"> -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<script>
function myfunction()
{
	var x= document.getElementById("main-wrapper1");
	if(x.style.display==="none")
	{
		x.style.display="block";
	}
	else
	{
		x.style.display="none";
	}
}
</script>

<style type="text/css">
		h3{
			color:black;
			font-size:40px;
			font-family:Pacifico;
			
		}
		#content1{
			font-size:45px;
			font-family:Pacifico;
		}
		h2{
			color:black;
			font-family: Lato;
		}
		#content{
			
		}
		body{
			font-family: Lato;
			background:url("https://assets.website-files.com/5bfd1275cc56e15ce750b18e/5c289afb9a1575cb2f893a3b_15.%20Perfume.jpg");
			
		}
		h1{
			font-size: 5em;
		}

		html{
			height: 100%;
		}
		hr{
			width: 400px;
			border-top: 2px solid #f8f8f8;
			border-bottom: 2px solid rgba(0,0,0,0.2);
		}
		#main-wrapper1{
			width:300px;
	        margin: 0 auto;
	        background:white;
	        padding:5px;
	        border-radius:10px;
	        border:1px solid black;
			display:none;
		}
		.avatar
		{
			padding-bottom:5px;
		}


		#profile_btn{
	margin-top:3px;
	background-color:#3498db;
	padding:5px;
	color:white;
	width:73%;
	text-align:center;
	font-size:14px;
	font-weight:bold;
	margin-bottom:5px;
		
}
			#logout_btn{
        margin-top:12px;
		
}	
		html{
			scroll-behavior: smooth;
		}


#sell_btn{
	margin-top:10px;
	background-color:#3498db;
	padding:5px;
	color:white;
	width:100%;
	text-align:center;
	font-size:18px;
	font-weight:bold;
	margin-bottom:20px;
		
}
#reset_btn{
	margin-top:5px;
	background-color:#e67e22;
	padding:5px;
	color:white;
	width:30%;
	text-align:center;
	font-size:15px;
	font-weight:bold;
	margin-bottom:20px;
		
}
.image {
	margin-top:10px;
    width:70px;
    padding:5px;
    background:#ddd;
    height:80px;
    float:right;
    margin-left:0px;
}
.img
{
	width:80px;
	height:120px;
}
#image
{
	margin-left:8px;
	float:right;
}
#con{
		width:430px;
	    margin: 0 auto;
	    background:white;
	    padding:10px;
	    border-radius:10px;
		border:2px solid #95a5a6;
			
	}

#content
{
	width:50%;
	border-radius:10px;
	margin-left:25%;
	margin-bottom:40px;
	background-color:white;
	margin: 0 auto;
}
body{
	      background-color:#F3F3F3;

}
}
.price1{
	font-weight:bold;
	font-size:20px;
	color:red;
}
#pricelbl
{
	margin-left:335px;
	font-weight:bold;
	font-size:20px;
	color:red;
	
}
#remove{
	margin-left:100px;
}
#Buy{
	margin-left:46%;
	margin-bottom:1px;
	color:white;
	background-color:#8c7ae6;
	padding:3px;
	width:100px;
	border:1 px, solid #8c7ae6;
	font-weight:bold;
	
	
}
#success{
	display:none;
	text-align:center;
}
#success1{
	display:none;
	text-align:center;
}
#confirm_buy{
	display:none;
	padding-left:22%;
}
#main{
	border:2px solid #95a5a6;
	width:430px;
	border-radius:10px;
}
.header{
	color:red;
}
 html, body {
    max-width: 100%;
    overflow-x: hidden;
 }
pricelb{
	color:black;
}
.footer{
  
  background:#F8F8F8;
  color:black;
  
  .links{
    ul {list-style-type: none;}
    li a{
      color: black;
	  
      transition: color .2s;
      &:hover{
        text-decoration:none;
        color: black;
        }
    }
  }  
  .about-company{
    i{font-size: 25px;}
    a{
      color:white;
      transition: color .2s;
      &:hover{color:#4180CB}
    }
  } 
  .location{
    i{font-size: 18px;}
  }
  .copyright p{border-top:1px solid rgba(255,255,255,.1);} 
}
#logout_btn{
	border:none;
	padding:5px;
	margin-left:15px;
}


	</style>




</head>
<body onload="buy()">

<nav class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-nav-demo" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
				<a href="homepage.php" class="navbar-brand">Books Lake</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-nav-demo">
                    <ul class="nav navbar-nav">
					<li><a href="homepage.php"><i class="fa fa-home"></i>&nbsp;Home</a></li>
					<li><a href="buy.php"><i class="fa fa-shopping-bag"></i>&nbsp;Buy Books</a></li>
					<li><a href="sell.php"><i class="fa fa-money"></i>&nbsp;Sell Book</a></li>
					<li><a href="orders.php"><i class="fa fa-list-alt"></i>&nbsp;My Orders</a></li>
					<li><a href="history.php"><i class="fa fa-history"></i>&nbsp;History</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="profile.php"><i class="fa fa-user"></i>&nbsp;Profile</a></li>
					<li class="active"><a href="#"><i class="fa fa-cart-arrow-down"></i>&nbsp;Cart</a></li>
					<li> <form class="form" action="homepage.php" method="post"><button name="logout" type="submit" id="logout_btn"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Logout</button></form></li>
				</ul>
			</div>
		</div>
	</nav>
<br>
		
			<form class="l" action="cart.php" method="post">
			<div id="content">
			
			<div class="alert alert-success" id="success1">
			<span class="increase"><strong>Success!</strong>Thank you for shopping with us!</span>
			</div>
			
			<div class="alert alert-success" id="success">
			<span class="increase"><strong>Success!</strong>Removed from cart.</span>
			</div>
			<center><div id = "content1"><h3><b>Cart</b></h3></div></center>
			
			
			<?php
         while($rows=mysqli_fetch_assoc($result))
		{
	
			?>
			<div id="con">
			
			
			<div id="image">
			<?php

			if($rows['imglink']=="bookuploads/")
			{
				echo'<img class="img" src="bookuploads\book.png">';
			}
			else
			{
				echo'<img class="img" src="'.$rows['imglink'].'">';
	
			}
			?>
			</div>
			<br>
			<label>Book id :&emsp;<span id="bidb"><?php echo $rows['bookid'];?></span></label>
			<br>
			<label>Book name:&emsp;<?php echo $rows['bookname'];?></label>
			<br>
			<label>Price:&emsp;<?php echo $rows['bprice'];?></label>
			<br>
			<input class="btn btn-primary" type="submit" name="remove" id="remove" value="Remove from Cart">
			</div>
			
			
			<br>
	<?php }?>
			
	
			<?php
			
				while($row=mysqli_fetch_assoc($result1))
				{
					$total=$row['value_sum'];
					$total1=round($total, 2)?>
					
					<label id="pricelbl" id="pricelb">SubTotal: <span class="price1"><?php echo $total1;?></span></label>
				<?php }?>
				<br><input type="button" class="btn btn-primary" name="Buy" value="Buy" id="Buy" onclick="confirm();"><br>
				<input type="hidden" id="stotal",name="stotal" value="<?php echo $total1;?>">
				
				
				<input type="hidden" id="hidden_id" name="hidden_i">

</form>
				
				
				<div id="confirm_buy">
				
			    <?php $rows=mysqli_fetch_assoc($result2)?>
				
				
			
	
				
	<div id="main">
	<div class="container">	
			
		<div class="col-md-4 container bg-default">
			
			<h4 class="my-4" class="header">
					Billing Address
			</h4>
			
			<form action="cart.php" method="post">
				<div class="form-row">

				<div class="form-group">
					<label for="adress">Address</label>
					<input type="text" class="form-control" name="caddress" id="address" value="<?php echo $rows['address'];?>" required>
				</div>

				<div class="form-group">
					<label for="address2">Contact no:
					</label>
					<input type="text" class="form-control" name="ccontactno" id="contactno" placeholder="" value="<?php echo $rows['contactno'];?>">
				</div>

				<div class="row">
					<div class="col-md-6 form-group">
						<label for="country">Country</label>
						<select name= "ccountry" type="text" class="form-control" id="country">
							<option value="India">India</option>
						</select>
					</div>
					
					<div class="col-md-6 form-group">
						<label for="postcode">Postcode</label>
						<input type="text" name="ccode" class="form-control" id="postalcode" placeholder="Enter Postal code" required>
						

					</div>
				</div>
				
				<h4 class="mb-4" class="header">Payment</h4>
				<div class="form-check">
					<input type="radio" class="form-check-input" id="cod" value="cod" name="payment" checked required>
					<label for="paypal" class="form-check-label">Cash on delivery</label>
				</div>
			
					<button name= "checkout" class="btn btn-primary bt-lg btn-block" type="submit">Continue to Checkout</button>
					<br>
			</form>
		</div>
				
				
				
				
				
				
				
				

				
	</div>
				

</div>
</div>
<br>
</div>



<script src="https://code.jquery.com/jquery-2.1.4.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>


function buy()
{
	var subtotal=document.getElementById('stotal').value
	//alert(document.getElementById('stotal').value);
	if(subtotal==0)
	{
		document.getElementById('Buy').style.display="none";
	}
	else
	{
		document.getElementById('Buy').style.display="block";
	}
	
}


function setval(bidb){
	
	document.getElementById('hidden_id').value=bidb;
	//alert(document.getElementById('hidden_id').value);
    	
	
}

var remove= document.getElementsByName('remove');

	for(var i=0;i<remove.length;i++)
	{
		
		var button=remove[i];
		button.addEventListener('click',function(event)
		{
			
			var buttonclicked=event.target;
			var row1=buttonclicked.parentElement;
			var x=row1.querySelectorAll("#bidb");
			var bidb=x[0].innerText;
			//alert(bidb);
			setval(bidb); 

		}
		)
	};
	
function confirm(){
	var x=document.getElementById('confirm_buy');
	x.style.display='block';
}



</script>

</div>
<br>
</body>
</html>