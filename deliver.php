<?php
	session_start();
	require 'dbconfig/config.php';
	$query="SELECT o.order_id,o.bookbid,u.name,o.contactno,o.shipping_address,o.paymode,o.order_total from orders o,userdetails u where o.status1=0 and u.username=o.user_name";
	$result=mysqli_query($con,$query);
	
	$query1="SELECT * from orders where status1=0";
	$result1=mysqli_query($con,$query);
	$options = "";
	while($row2 = mysqli_fetch_array($result1))
	{
		$options = $options."<option>$row2[0]</option>";
	}
	
	if(isset($_POST['alogout']))
	{
	session_destroy();
	header('location:index.php');
	}
	
	
	if(isset($_POST['deliver']))
	{
	$orderid=$_POST['bid1'];
	$query="update orders set status1= 1 where order_id='$orderid'";
	$query_run=mysqli_query($con,$query);
	if($query_run)
	{
		echo '<script type="text/javascript"> alert("Updated Successfully")</script>';
		header("refresh: 1"); 
	}
	else
	{
		echo '<script type="text/javascript"> alert("Check book ID")</script>';
	}
	}
	

	if(isset($_POST['ndeliver']))
	{
	$oid=$_POST['bid1'];
	$query="update book set status= 0 where bookid=(select bookbid from orders where order_id='$oid')";
	$query1="update orders set status1=3 where order_id='$oid'";
	$query_run=mysqli_query($con,$query);
	$query_run1=mysqli_query($con,$query1);
	if($query_run and $query_run1)
	{
		echo '<script type="text/javascript"> alert("Updated Successfully")</script>';
		header("refresh: 1"); 
	}
	else
	{
		echo '<script type="text/javascript"> alert("Check book ID")</script>';
	}
	
	}
	
	
?>
<html>
<head>
	<title>Deliver Books</title> 
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
	padding-left:39%;
	color: #e74c3c;
	font-size:20px;
	font-weight:bold;
	background-color:white;
	
}
body{
	font-family: Lato;
	background-image: linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%); /* outerbackground*/
}
#mohan{
	margin-left:43%;
}
#deliver{
	margin-left:40%;
	margin-top:10px;
}
#ndeliver{
	margin-top:10px;
	margin-left:1%;
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
					<li><a href="sold.php"><i class="fa fa-cubes"></i>&nbsp;Stock</a></li>
					<li class="active"><a><i class="fa fa-shopping-cart"></i>&nbsp;Deliver</a></li>
					<li><a href="delivered.php"><i class="fa fa-check-square-o"></i>&nbsp;Delivered</a></li>
					<li><a href="dataa.php">&nbsp;Stats</a></li>
				
				</ul>
				<ul class="nav navbar-nav navbar-right">
				<li id="status">Logged in as admin</li>
                      <li><form class="form" action="adminpage.php" method="post"><button name="alogout" type="submit" id="logout_btn"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Logout</button></form></li>
				</ul>
			</div>
		</div>
	</nav>
<div class="container">
<div id="main">

<table class="table table-striped" align="center"  cellpadding="5">
<tr>
<th colspan="7" id="tablehead">Deliver Books</th>
</tr>
<tr>
<th>Order ID</th>
<th>Book ID</th>
<th>Name</th>
<th>Contact No</th>
<th>Address</th>
<th>Payment Mode</th>
<th>Total</th>
</tr>

<?php
while($rows=mysqli_fetch_assoc($result))
{
	?>
	<tr>
	<td><?php echo $rows['order_id'];?></td>
	<td><?php echo $rows['bookbid'];?></td>
	<td><?php echo $rows['name'];?></td>
	<td><?php echo $rows['contactno'];?></td>
	<td><?php echo $rows['shipping_address'];?></td>
	<td><?php echo $rows['paymode'];?></td>
	<td><?php echo $rows['order_total'];?></td>
	</tr>
<?php }?>
</table>

<br>
<form action="deliver.php" method="post">
<span id="mohan">
<label for="select">Select ID:&emsp;</label><select id="bid" name="bid1"> <?php echo $options;?></select>
<br><button class="btn btn-primary" type="submit" name="deliver" id="deliver">Delivered</button>
<button class="btn btn-warning" type="submit" name="ndeliver" id="ndeliver">Not Delivered</button>
</form>
</span>

</center>

</div>
</div>

<script>
</script>


</body>
</html>