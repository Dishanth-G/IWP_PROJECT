<?php
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link rel="stylesheet" href="css/style.css">
<link rel = "shortcut icon" type="image/png" href="imgs/logo3.png"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Cabin|Concert+One|Inconsolata|Nunito|Nunito+Sans|Oswald|Pacifico|Quicksand|Rubik|VT323&display=swap" rel="stylesheet">
<script type="text/javascript">

var loadFile = function(event) {
	var image = document.getElementById('uploadPreview');
	image.src = URL.createObjectURL(event.target.files[0]);
};

</script>
<style>
h2{
	font-family: 'Pacifico';
	font-size: 45px;
}
.inputvalues
{
	width:380px;
	margin:0 auto;
	padding:5px;
	margin-top:10px;
}
#address
{
	margin-left:17px;
}
#arrow
{
	margin-top:7px;
}
body{

	background:url("https://assets.website-files.com/5bfd1275cc56e15ce750b18e/5c289afb9a1575cb2f893a3b_15.%20Perfume.jpg");

}
.head{
	font-family: 'Courgette', cursive;
	font-size: 17px;
}
#main-wrapper{
	width:40%;
	margin: 0 auto;
	background:white;
	padding:1px;
	border-radius:10px;
	border:2px solid #95a5a6;
}
.ul
{
	margin:0px;
	width:410px;
	margin-bottom:5px;
}
#signup_btn{
	margin-top:10px;
	background-color:#3498db;
	padding:5px;
	color:white;
	width:90%;
	text-align:center;
	font-size:18px;
	font-weight:bold;
	margin-bottom:5px;
	margin-left:10px;
	border: none;
	border-radius:4px;
		
}
hr{
	border:2px solid black;
}
#back_btn{
	margin-top:5px;
	background-color:#e67e22;
	padding:5px;
	color:white;
	width:30%;
	text-align:center;
	font-size:15px;
	font-weight:bold;
	margin-bottom:10px;
	margin-left:10px;
	border: none;
	border-radius:4px;
	
		
}
#uploadPreview{
	border:1px solid black;
}

#sums{
	padding-right:32px;
}

body{
	
}
</style>


</head>
<body style="background-color:#bdc3c7">


<div id="main-wrapper">
	<center>
	<h2>Register for a new Profile</h2>
	</center>
	<hr>
	<br>
	<form class="myform" action="register.php" method="post" enctype="multipart/form-data" >
	<center>
	<img id="uploadPreview" src="imgs/register.png"class="avatar"/><br><br>
	<label class="head" id="sums" for="imglink"><u>Add Profile Picture:</u></label>
	<input type="file" id="imglink" name="imglink" accept=".jpg,.jpeg,.png" onchange="loadFile(event)"/><br><br>
	
    </center>
	
	
	
	<p class="head"><u>Login Details</u></p>
	
	<i class="fa fa-user" aria-hidden="true"></i>
	<input name="username" type="text" class="inputvalues" placeholder="Type Username" required/><br>
	<i class="fa fa-unlock-alt" aria-hidden="true"></i>
	<input name="password" type="password" class="inputvalues" placeholder="Type New Password" required/><br>
	<i class="fa fa-unlock-alt" aria-hidden="true"></i>
	<input name="cpassword" type="password" class="inputvalues" class="last" placeholder="Type Confirm Password" required/><br>
	
	<p class="head"><u>Personal Information</u></p>
	<i class="fa fa-user"></i>
	<input name="fullname" type="text" class="inputvalues" placeholder="Enter your Full name" required><br>
	<i class="fa fa-volume-control-phone" aria-hidden="true"></i>
	<input name="contactno" type="text" class="inputvalues" placeholder="Enter your Contact number" required><br>
	<i class="fa fa-map-marker" id="arrow"></i><br>
	<textarea name="address" id="address" rows="4" cols="67" placeholder="Enter Your Address" required></textarea>
	
	<input name="submit_btn" type="submit" id="signup_btn" value="Sign Up"/>
	<a href="index.php"><input type="button" id="back_btn" value="<< Back to Login"/></a>
    
	</form>
	<?php
		if(isset($_POST['submit_btn']))
		{
			//echo '<script type="text/javascript"> alert("Signup button clicked")</script>';
			$username=$_POST['username'];
			$password=$_POST['password'];
			$cpassword=$_POST['cpassword'];
			$name=$_POST['fullname'];
			$contactno=$_POST['contactno'];
			$address=$_POST['address'];
			
			$img_name=$_FILES['imglink']['name'];
			$img_size=$_FILES['imglink']['size'];
			$img_tmp=$_FILES['imglink']['tmp_name'];
			
			$directory='uploads/';
			$target_file=$directory.$img_name;
			
			
			
			if($password==$cpassword)
			{
				$query="select * from userdetails where username='$username'";
				$query_run=mysqli_query($con,$query);
				
				if(mysqli_num_rows($query_run)>0 || $username=="admin")
				{
					echo '<script type="text/javascript"> alert("User already exists...Try Another username") </script>';
				}
				
				else
				{
					move_uploaded_file($img_tmp,$target_file);
					$query="insert into userdetails values('$username','$password','$name','$contactno','$address','','$target_file')";
					$query_run= mysqli_query($con,$query);
					if($query_run)
					{
						$message = "Successfully Created... Now Login";
						echo "<script type='text/javascript'>alert('$message');</script>";
					}
					else
					{
						echo '<script type="text/javascript"> alert("Error!")</script>';
					}
					
				}
				
			}
			else
			{
				echo '<script type="text/javascript"> alert("Passwods didnot match...")</script>';
			}
		}
	?>
	
</div>
</body>





</html>