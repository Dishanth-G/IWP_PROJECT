<?php
session_start();
require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>

<title>Sell Book</title> 
<link rel="stylesheet" href="css/style.css"> 
<link href="https://fonts.googleapis.com/css?family=Cabin|Concert+One|Inconsolata|Nunito|Nunito+Sans|Oswald|Pacifico|Quicksand|Rubik|VT323&display=swap" rel="stylesheet">
<link rel = "shortcut icon" type="image/png" href="imgs/logo3.png">

<link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
	<!-- <link rel="stylesheet" type="text/css" href="C:\Users\disha\OneDrive\Desktop\HTML EXE\bootstrap\css\bootstrap.css"> -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
		h2{
			color:black;
			font-family: Lato;
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
			width:280px;
	        margin: 0 auto;
	        background:white;
	        padding:5px;
	        border-radius:10px;
	        border:1px solid black;
			display:none;
		}
		
				#content{
					margin-top:0px;
			width:55%;
	        margin: 0 auto;
			background:white;
	        padding:15px;
			padding-left:auto;
			padding-bottom:10px;
	        border-radius:10px;
	        border:1px solid black;
			
		}
		
		
		.avatar
		{
			padding-bottom:5px;
		}
		.inputvalue
		{
				width:400px;
				margin:0 auto;
				padding:5px;
				margin-bottom:10px;
				margin-left:80px;
				
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

hr{
	width:auto;
	border:2px solid black;
}

#sell_btn{
	margin-top:0px;
	background-color:white;
	padding:5px;
	color:#4CAF50;
	width:50%;
	text-align:center;
	font-size:18px;
	font-weight:bold;
	margin-bottom:10px;
	border-radius:10px;
	text-decoration: none;
	margin: 4px 2px;
	border: 2px solid #4CAF50;
		
}
#sell_btn:hover {
  background-color: #4CAF50;
  color: white;
}
#exsell_btn{
	margin-top:0px;
	background-color:#008CBA;
	padding:5px;
	color:white;
	border-radius:10px;
	width:50%;
	text-align:center;
	font-size:18px;
	font-weight:bold;
	margin-bottom:10px;
	text-decoration: none;
	margin: 4px 2px;
	
}
#sell_btn:hover {
  background-color: #4CAF50;
  color: white;
}
#reset_btn{
	background-color:#e67e22;
	padding:5px;
	color:white;
	width:30%;
	border-radius:10px;
	text-align:center;
	font-size:15px;
	font-weight:bold;
	margin-bottom:5px;
	margin-left:190px;
	text-decoration: none;
		
}
#sellingprice
{
	font-size:15px;
	color:red;
}

#success{
	display:none;
	text-align:center;
}
.increase{
	font-size:17px;
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
#nc{
	margin-left:25px;
}
#imglink{
	float:right;
	margin-right:250px;
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
					<li class="active"><a><i class="fa fa-money"></i>&nbsp;Sell Book</a></li>
					<li><a href="orders.php"><i class="fa fa-list-alt"></i>&nbsp;My Orders</a></li>
					<li><a href="history.php"><i class="fa fa-history"></i>&nbsp;History</a></li>
					
					
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
</form>
		<div id="content">	
			<div class="alert alert-success" id="success">
			<span class="increase"><strong>Success!</strong>Successfully Noted,Our agents will contact you shortly.</span>
			</div>
			<center><h3><b>Sell Your Book</b></h3></center><br><hr>
	<form class="form" action="sell.php" method="post" enctype="multipart/form-data" >
	<center>
	
	<img id="uploadPreview" src="imgs/book.png"class="avatar"/><br><br>
	</center>
	<label for="imglink" id="nc">Add an image of the book:</label>
	<input type="file" id="imglink" name="imglink" accept=".jpg,.jpeg,.png" onchange="loadFile(event)"/><br>
	
    
	
	<br>
	<b>&emsp;&emsp;Book name:&emsp;&emsp;&emsp;&nbsp;</b><input name="bookname" type="text" class="inputvalue" placeholder="Type Book Name" required/>
	<br><b>&emsp;&emsp;Author:&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
	<input name="author" type="text" class="inputvalue" placeholder="Type author name" required/>
	<br><b>&emsp;&emsp;Language:&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
	<input name="language" type="text" class="inputvalue" placeholder="Type Language" required/>
	<br>
	<b>&emsp;&emsp;Genre:&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;</b>
	<select name="genre" class="inputvalue"><option>Action</option><option>Adventure</option><option>Classic</option><option>Education</option><option>Drama</option><option>Comic</option><option>Fable</option><option>Crime</option></select>
	<br>
	<b>&emsp;&emsp;Condition of book:</b>
	<select id="condition" name="condition" class="inputvalue"><option value="2">very good</option><option value="3">good</option><option value="5">poor</option></select>
	<br><b>&emsp;&emsp;Original Price:&emsp;&emsp;</b>
	<input name="orgprice" id="orgprice" type="text" class="inputvalue" placeholder="Enter original Price" required/>
	<br>
	
	<b>&emsp;&emsp;Expected Selling Price:&emsp;&emsp;&emsp;</b>&emsp;&emsp;<label id="sellingprice"></label>
	<span id="nilo">NIL</span>
	<input type="hidden" name="sellprice" id="sell" value="NIL">
	
	<br><br>&emsp;&emsp;
	<b>View our Terms & Condition:</b>
	&emsp;&emsp;<button onclick="tandc()" type="button">T &amp; C</button>
	<br><br><br>
    
	<center><input class="btn btn-primary" name="sell_btn" type="button" id="exsell_btn" value="Calculate" onclick="calculate()"/></center>
	<center><input class="btn btn-primary" name="sell_btn" type="submit" id="sell_btn" value="Sell"/><br></center>
	&emsp;&emsp;<input  class="btn btn-primary" type="reset" id="reset_btn" name="reset" value="Reset"/>
	
	</form>
	
	
</div>
<br>

<script src="https://code.jquery.com/jquery-2.1.4.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

	


<?php
if(isset($_POST['logout']))
{
	session_destroy();
	header('location:index.php');
}
?>

<?php
		if(isset($_POST['sell_btn']))
		{
			//echo '<script type="text/javascript"> alert("Signup button clicked")</script>';
			$bookname=$_POST['bookname'];
			$author=$_POST['author'];
			$genre=$_POST['genre'];
			$language=$_POST['language'];
			$orgprice=$_POST['orgprice'];
			$condition=$_POST['condition'];
			$username=$_SESSION['username'];
			$price=$_POST['sellprice'];
			$img_name=$_FILES['imglink']['name'];
			$img_size=$_FILES['imglink']['size'];
			$img_tmp=$_FILES['imglink']['tmp_name'];
			
			$directory='bookuploads/';
			$target_file=$directory.$img_name;
			
					move_uploaded_file($img_tmp,$target_file);
					$query="insert into book values('','$bookname','$author','$genre','$language','$orgprice','$price','$condition','$username','1','$target_file','1','0')";
					$query_run= mysqli_query($con,$query);
					if($query_run)
					{
						$message = "Successfully Noted,Our agents will contact you shortly";
						//echo "<script type='text/javascript'>alert('$message');</script>";
						echo"<script>
						var x= document.getElementById('success');
						x.style.display='block';
						</script>";						
					}
					else
					{
						echo '<script type="text/javascript"> alert("Error!")</script>';
					}		
		}
	?>




<script>
document.getElementById('sell_btn').disabled=true;
var loadFile = function(event) {
	var image = document.getElementById('uploadPreview');
	image.src = URL.createObjectURL(event.target.files[0]);
};

function calculate(){
	
	
	if(!(document.getElementById('orgprice').value==""))
	{
			var oprice=parseFloat(document.getElementById('orgprice').value);
	var con=parseFloat(document.getElementById('condition').value);
	var price=0;
	if(con==2)
	{
		oprice=(oprice-(0.25)*oprice);
	}
	else if(con==3)
	{
		oprice=(oprice-(0.45)*oprice);
	}
	else
	{
		oprice=(oprice-(0.7)*oprice);
	}
	
	
	document.getElementById('sell_btn').disabled=false;
	
	document.getElementById('nilo').style.display='none';
	document.getElementById('sellingprice').innerHTML=oprice;
	document.getElementById('sell').value=oprice;
	

	}
	else
	{
		alert('Enter original price');
	}

	
	
}

function tandc(){
	var msg="Terms and conditions\n1.As soon as you sell this book our agent will contact you.\n2.After contacting our agent will come to your home address mentioned in profile.\n3.After validating the price again and condition of book you may sell it or refuse as per your wish.";
	alert(msg);
}



</script>
<br>

</body>
</html>