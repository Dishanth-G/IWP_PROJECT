<?php
session_start();
?>
<?php
if(isset($_POST['logout']))
{
	session_destroy();
	header('location:index.php');
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Home Page</title> 
<link rel="stylesheet" href="css/style.css"> 
<link rel = "shortcut icon" type="image/png" href="imgs/logo3.png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Cabin|Concert+One|Inconsolata|Nunito|Nunito+Sans|Oswald|Pacifico|Quicksand|Rubik|VT323&display=swap" rel="stylesheet">

	<!-- <link rel="stylesheet" type="text/css" href="C:\Users\disha\OneDrive\Desktop\HTML EXE\bootstrap\css\bootstrap.css"> -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">



<style type="text/css">
		h1,h3{
			color:white;
		}
		h2{
			color:white;
		}
		#content{
			padding-top:70px;
			text-align: center;

		}
		html{
			scroll-behavior: smooth;
		}
		body{
			background-image: url("https://images.unsplash.com/photo-1496104679561-38d3af73f9b0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1922&q=80") ;
			background-size: cover;
			background-position: center;
			font-family: Lato;
		}
		h1{
			font-family: Pacifico;
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
	        float:right;
			display:none;
		}
		
		#logout_btn{
			
			
			margin-top:12px;
		}

.circle{
	border:3px solid white;
	background:rgba(179,45,0,0.9);
	border-radius:75%;
	width:600px;
	margin-left:22%;
	margin-top:10%;
	
	
}
#cent
{
	padding-bottom:80px;
}

#section2{
	width:80%;
	background:rgba(179, 45, 0,0.9);
	margin-left: 150px;
	margin-bottom:30px;
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


#bk{
	color:black;
}
#logout_btn{
	border:none;
	padding:5px;
	margin-left:15px;
}



	</style>




</head>
<body>
<form class="logout" action="homepage.php" method="post">
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
					<li class="active"><a><i class="fa fa-home"></i>&nbsp;Home</a></li>
					<li><a href="buy.php"><i class="fa fa-shopping-bag"></i>&nbsp;Buy Books</a></li>
					<li><a href="sell.php"><i class="fa fa-money"></i>&nbsp;Sell Book</a></li>
					<li><a href="orders.php"><i class="fa fa-list-alt"></i>&nbsp;My Orders</a></li>
					<li ><a href="history.php"><i class="fa fa-history"></i>&nbsp;History</a></li>
					
					
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="profile.php"><i class="fa fa-user"></i>&nbsp;Profile</a></li>
					<li><a href="cart.php"><i class="fa fa-cart-arrow-down"></i>&nbsp;Cart</a></li>
					<li> <form class="form" action="homepage.php" method="post"> <button name="logout" type="submit" id="logout_btn"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Logout</button></form></li>
				</ul>
			</div>
		
	</nav>

<div class="container">

	<div class="row">
		<div class="col-lg-12">
		
		<div id="main-wrapper1"> 
		<center>
<h2>Welcome
<?php echo $_SESSION['username']?>
</h2>
<?php

if($_SESSION["imglink"]=="uploads/")
{
	 echo'<img class="avatar" src="uploads/img.png">';
}
else
{
	echo'<img class="avatar" src="'.$_SESSION["imglink"].'">';
	
}
?>
<br>
<input name="logout" type="submit" id="logout_btn" value="Logout"/>
</center>
</div>
		
		
			<div id="content" class="circle">
			<div id="cent">
			<center>		
			<h1><b>Online Portal</b></h1>
			<h3>Buying and selling Second hand Books</h3>
			<hr>
			<button class="btn btn-default btn-lg"><a href="#section2"><i class="fa fa-paw"></i> Get Started</a></button>
			</div>
			</center>
		</div>
		
	 </div>
</div>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


<div  id="section2">
  <h2>Section 2</h2>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>



<script src="https://code.jquery.com/jquery-2.1.4.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

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
	
</form>


<div class="mt-5 pt-5 pb-5 footer">
<div class="container">
  <div class="row">
    <div class="col-lg-5 col-xs-12 about-company">
      <h2 id="bk">Books Lake</h2>
      <p class="pr-5 text-white-50">One of the Leading Websites where u can buy and sell books with ease.</p>
	  <p>Follow us at</p>
      <p><a href="#"><i class="fa fa-facebook-square mr-1"></i></a> &emsp;<a href="#"><i class="fa fa-linkedin-square"></i></a>&emsp;<a href="#"><i class="fa fa-instagram icon-large" aria-hidden="true" ></a></i></p>
    </div>
    <div class="col-lg-3 col-xs-12 links">
      <h4 class="mt-lg-0 mt-sm-3">Quick Links</h4>
        <ul class="m-0 p-0">
          <li>- <a href="buy.php">Buy Books</a></li>
          <li>- <a href="sell.php">Sell Books</a></li>
          <li>- <a href="history.php">History</a></li>
          <li>- <a href="cart.php">Cart</a></li>
          <li>- <a href="#section2">Get Started</a></li>
        </ul>
    </div>
    <div class="col-lg-4 col-xs-12 location">
      <h4 class="mt-lg-0 mt-sm-4">Contact US</h4>
      <p class="mb-0"><i class="fa fa-phone mr-3"></i>&nbsp;&nbsp;212-23456</p>
      <p><i class="fa fa-envelope-o mr-3"></i>&nbsp;&nbsp;info@bookslake.com</p>
    </div>
  </div>
  <div class="row mt-5">
    <div class="col copyright">
      <p class=""><small class="text-white-50">&emsp;© 2020. All Rights Reserved.</small></p>
    </div>
  </div>
</div>
</div>

</div>

</body>
</html>