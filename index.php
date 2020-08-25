<?php
	session_start();
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>

<title>Login</title>
<link rel="stylesheet" href="css/style.css"> 
<link rel = "shortcut icon" type="image/png" href="imgs/logo3.png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Cabin|Concert+One|Inconsolata|Nunito|Nunito+Sans|Oswald|Pacifico|Quicksand|Rubik|VT323&display=swap" rel="stylesheet">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
<style>
.inputvalues
{
	width:418px;
	margin:0 auto;
	padding:5px;
	margin-bottom:10px;
}
#main-wrapper{
	width:570px;
	margin: 0 auto;
	
	padding:5px;
	border-radius:10px;
	border:2px solid #95a5a6;
}
#login_btn{
	margin-top:0px;
	background-color:#27ae60;
	padding:5px;
	color:white;
	width:430px;
	text-align:center;
	font-size:18px;
	font-weight:bold;
    margin-left:15px;
  text-decoration: none;
  display: inline-block;
  border-radius:4px;
  border:none;

}
#register_btn{
	margin-top:10px;
	background-color:#3498db;
	padding:5px;
	color:white;
	width:430px;
	text-align:center;
	font-size:18px;
	font-weight:bold;
	margin-bottom:20px;
	margin-left:15px;
	border-radius:4px;
	border:none;
}

h2{
	margin:auto;
	font-family: 'Pacifico';
	font-size: 45px;
}

body{
	font-family: Lato;
	background:url("https://assets.website-files.com/5bfd1275cc56e15ce750b18e/5c289afb9a1575cb2f893a3b_15.%20Perfume.jpg");
}
.avatar{
	width:200px;
	height:120px;
	text-align:center;
}
#invalid{
	display:none;
}
hr{
	border:2px solid black;
}
h3{
	font-family: 'PT Sans';
	font-size: 30px;
	font-weight:normal;
}
.ml{
	margin-left:63px;
	margin-bottom:20px;
}
#rest{
	width:87%;
}
</style>


</head>
<body >
<div class="container">
<div id="main-wrapper">
	
	<center>
	<div class="alert alert-info" id="invalid">
			<span class="increase"><strong>Info!</strong> Invalid Credentials.</span>
	</div>
	<img src="imgs/logo3.png"class="avatar"/>
	<h2>Welcome To Books Lake</h2>
	<hr id="rest">

	</center>

	<h3 class="ml">Login</h3>

	<form class="myform" action="index.php" method="post">
	<i class="fa fa-user" aria-hidden="true"></i>
	<input name= "username" type="text" class="inputvalues" placeholder="Type Username" required/><br>
	<i class="fa fa-unlock-alt" aria-hidden="true"></i>
	<input name="password" type="password" class="inputvalues" placeholder="Type Password" required/><br>
	<input class="btn btn-primary" name="login" type="submit"  id="login_btn" value="Login"/><br>
	<br>
	<hr>
	<h3>New User?Create your Account by clicking Register</h3>
	<a href="register.php"><input class="btn btn-primary" type="button" id="register_btn" value="Register"/></a>
	</form>
	<?php
		if(isset($_POST['login']))
		{
			$username=$_POST['username'];
			$password=$_POST['password'];
		 
			$query="select * from userdetails WHERE username='$username' AND password='$password'";
			$query_run=mysqli_query($con,$query);
			if(mysqli_num_rows($query_run)>0)
			{
				//valid
				$row=mysqli_fetch_assoc($query_run);
				$_SESSION['username']=$row['username'];
				$_SESSION['imglink']=$row['imglink'];
				header('location:homepage.php');
			}
			else if($username == "admin" && $password== "admin")
			{
				header('location:adminpage.php');
			
			}
			else
			{
				//invalid
				echo '<script type="text/javascript"> alert("Invalid Credentials...Try again")</script>';
			}

		}
	
	
	?>
</div>
</div>
</body>
</html>