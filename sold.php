<?php
if(isset($_POST['alogout']))
{
	session_destroy();
	header('location:index.php');
}
?>


<?php
	session_start();
	require 'dbconfig/config.php';
	$query="SELECT bookid,bookname,exeprice,bprice from book where status=0";
	$result=mysqli_query($con,$query);
	
?>

<?php

if(isset($_POST['doneo']))
{
	$bookid1=$_POST['bid1'];
	$usellprice=$_POST['sellprice'];
	$query="update book set exeprice='$usellprice',status= 0 where bookid='$bookid1'";
	$query_run=mysqli_query($con,$query);
	if(mysqli_affected_rows($con)>0)
	{
		
		echo '<script type="text/javascript"> alert("Updated Successfully")</script>';
		header("refresh: 1"); 
	}
	else
	{
		echo '<script type="text/javascript"> alert("Check book ID")</script>';
	}
	
	
}

if(isset($_POST['d']))
{
	echo '<script type="text/javascript"> alert("Thank You Sir")</script>';
}


?>
<html>
<head>
	<title>Stock</title> 
<link rel="stylesheet" href="css/style.css"> 
<link rel = "shortcut icon" type="image/png" href="imgs/logo3.png">

<link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
	<!-- <link rel="stylesheet" type="text/css" href="C:\Users\disha\OneDrive\Desktop\HTML EXE\bootstrap\css\bootstrap.css"> -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
#logout_btn{
	margin-top:13px;
	border:none;
	margin-left:370px;
}
#status
{
	margin-top:17px;
	    
}
#data{
	width:80%;
}
			
#mainwrapper{

	width:500px;
	margin: 0 auto;
	background:white;
	padding:5px;
	border-radius:10px;
	border:2px solid #95a5a6;
			}
#done
	{
		width:100px;
		padding:3px;		
	}
#bid{
	padding:3px;
}
#head
{
	color: #e74c3c;
	font-size:20px;
	font-weight:bold;
}
#con{
	width:170px;
	margin-top:10px;
}
#calculate
{
	margin-top:10px;
	margin-bottom:10px;
}
#oprice{
	width:170px;
}
yeso,noo{
	display:hidden;
}
#main{
	border: 2px solid #3498db;
	padding:10px;
	width: 80%;
	margin-left:100px;
	border-radius:10px;
	background-color:white;

}
#tablehead
{
	padding-left:45%;
	color: #e74c3c;
	font-size:20px;
	font-weight:bold;
	background-color:white;
	
}
body{
	font-family: Lato;
	background-image: linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%); /* outerbackground*/
}

</style>
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-nav-demo" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
				<a href="adminpage.php" class="navbar-brand">Books Lake</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-nav-demo">
				<ul class="nav navbar-nav">
					<li><a href="adminpage.php"><i class="fa fa-home"></i>&nbsp;Home</a></li>
					<li class="active"><a><i class="fa fa-cubes"></i>&nbsp;Stock</a></li>
					<li><a href="deliver.php"><i class="fa fa-shopping-cart"></i>&nbsp;Deliver</a></li>
					<li><a href="delivered.php"><i class="fa fa-check-square-o"></i>&nbsp;Delivered</a></li>
					<li><a href="dataa.php"><i class="fa fa-pie-chart"></i>&nbsp;Stats</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
				<li id="status">Loged in as admin</li>
                      <li><form class="form" action="adminpage.php" method="post"><button name="alogout" type="submit" id="logout_btn"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Logout</button></form></li>
				</ul>
			</div>
		</div>
	</nav>
<div class="container">
<div id="main">

<table class="table table-striped" align="center"  cellpadding="5">
<tr>
<th colspan="4" id="tablehead">Stock</th>
</tr>
<tr>
<th>Book ID</th>
<th>Book Name</th>
<th>Selling Price</th>
<th>Buying Price</th>
</tr>

<?php
while($rows=mysqli_fetch_assoc($result))
{
	?>
	<tr>
	<td><?php echo $rows['bookid'];?></td>
	<td><?php echo $rows['bookname'];?></td>
	<td><?php echo $rows['exeprice'];?></td>
	<td><?php echo $rows['bprice'];?></td>
	</tr>
<?php }?>
</table>

<br>

</center>
</div>
</div>

<script>
</script>


</body>
</html>