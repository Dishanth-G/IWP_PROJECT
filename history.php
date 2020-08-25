<?php
	session_start();
	require 'dbconfig/config.php';
	$username=$_SESSION['username'];
	$query="SELECT bookid,bookname,exeprice,status,imglink from book where user_name='$username'";
	$result=mysqli_query($con,$query);
?>
<!DOCTYPE html>
<html>
<head>

<title>History</title> 
<link rel="stylesheet" href="css/style.css"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel = "shortcut icon" type="image/png" href="imgs/logo3.png">
<link href="https://fonts.googleapis.com/css?family=Cabin|Concert+One|Inconsolata|Nunito|Nunito+Sans|Oswald|Pacifico|Quicksand|Rubik|VT323&display=swap" rel="stylesheet">

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
			margin-bottom:20px;
		}
		h2{
			color:black;
			
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
	width:90px;
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
	margin-bottom:20px;
	background-color:white;
	padding-bottom:10px;
	padding-top:3px;
}
body{
	      background-color:#F3F3F3;
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
hr{
	width:auto;
	border:2px solid black;
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
					<li><a href="homepage.php"><i class="fa fa-home"></i>&nbsp;Home</a></li>
					<li><a href="buy.php"><i class="fa fa-shopping-bag"></i>&nbsp;Buy Books</a></li>
					<li><a href="sell.php"><i class="fa fa-money"></i>&nbsp;Sell Book</a></li>
					<li><a href="orders.php"><i class="fa fa-list-alt"></i>&nbsp;My Orders</a></li>
					<li class="active"><a href="history.php"><i class="fa fa-history"></i>&nbsp;History</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li ><a href="profile.php"><i class="fa fa-user"></i>&nbsp;Profile</a></li>
					<li><a href="cart.php"><i class="fa fa-cart-arrow-down"></i>&nbsp;Cart</a></li>
					<li> <form class="form" action="homepage.php" method="post"><button name="logout" type="submit" id="logout_btn"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Logout</button></form></li>
				</ul>
			</div>
		</div>
	</nav>


		
		<div id="main-wrapper1"> 
		<center>
<h2>Hi
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
<input name="profile" type="button" id="profile_btn" value="View Profile"/><br>
<input name="logout" type="submit" id="logout_btn" value="Logout"/>


</center>
</div>
<br>
		
		
			<div id="content">
					
			<center><h3><b>History</b></h3></center>
			<hr>
			<br>
			
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
			<label>Book id :&emsp;<?php echo $rows['bookid'];?></label>
			<br>
			<label>Book name:&emsp;<?php echo $rows['bookname'];?></label>
			<br>
			<label>Expected Price:&emsp;<?php echo $rows['exeprice'];?></label>
			<br>
			
			
			<?php
			    
				if($rows['status']=="0")
				{
					$status="Sold";
				}
				else if($rows['status']=="2")
				{
					$status="Sold";
				}
				else{
					$status="Selling under process";
				}
			
			   
			
			?>
			
			<label>Status:&emsp;<?php echo $status;?></label>
			</div>
			<br>
	<?php }?>
		
			
					
</div>

<script src="https://code.jquery.com/jquery-2.1.4.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

	
</form>

<?php
if(isset($_POST['logout']))
{
	session_destroy();
	header('location:index.php');
}
?>
<br>
</body>
</html>