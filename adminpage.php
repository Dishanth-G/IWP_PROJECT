<?php
if(isset($_POST['alogout']))
{
	session_destroy();
	header('location:index.php');
}
?>


<!-- Books table
	 0-admin verified(Can be bought)
1-initial (Customer gave details)
2-bought 
-->



<?php
	session_start();
	require 'dbconfig/config.php';
	$query="SELECT bookid,bookname,exeprice,name,contactno,address from book b,userdetails u where b.status=1 and b.user_name=u.username";
	$result=mysqli_query($con,$query);

	$query10="SELECT * from book where status=1";
	$result10=mysqli_query($con,$query10);
	$options = "";
	while($row10 = mysqli_fetch_array($result10))
	{
		$options = $options."<option>$row10[0]</option>";
	}
	
?>

<?php

if(isset($_POST['doneo']))
{
	$bookid1=$_POST['bid1'];
	$usellprice=$_POST['sellprice'];
	$condi=$_POST['condition'];
	$query="update book set cond='$condi',exeprice='$usellprice',status= 0 where bookid='$bookid1'";
	$query1="update book set bprice=exeprice+(exeprice*0.2) where bookid='$bookid1'";
	
	$query_run=mysqli_query($con,$query);
	$query_run=mysqli_query($con,$query1);
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
	
	
	$bookid2=$_POST['bid2'];
	$query="DELETE FROM `book` WHERE bookid='$bookid2'";
	$query_run=mysqli_query($con,$query);
	
	if(mysqli_affected_rows($con)>0)
	{
		
		echo '<script type="text/javascript"> alert("Deleted Successfully")</script>';
	}
	else
	{
		echo '<script type="text/javascript"> alert("Check book ID")</script>';
	}
	
	
}


?>
<?php

if(isset($_POST['done']))
{
	$bookid=$_POST['bid'];
	$eprice=mysqli_query($con,"select exeprice from book where bookid='$bookid'");
	
	$query="update book set status=0,bprice=exeprice+(exeprice*0.2) where bookid='$bookid'";
	
	$query_run=mysqli_query($con,$query);
	if(mysqli_affected_rows($con)>0)
	{
		
		echo '<script type="text/javascript"> alert("Updated Successfully")</script>';
		header("refresh:1");
	}
	else
	{
		echo '<script type="text/javascript"> alert("Check book ID")</script>';
	}
	
	
}

?>
<html>
<head>
	<title>Admin Page</title> 
<link rel="stylesheet" href="css/style.css"> 

<link rel = "shortcut icon" type="image/png" href="imgs/logo3.png">
<link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
	<!-- <link rel="stylesheet" type="text/css" href="C:\Users\disha\OneDrive\Desktop\HTML EXE\bootstrap\css\bootstrap.css"> -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
#logout_btn{
	margin-top:13px;
	margin-left:370px;
	border:none;
}

hr{
	border: 1px solid black;

}
#status
{
	
		margin-top:17px;
	    
}

			
body{
	background-image: linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%); /* outerbackground*/
	font-family: Lato;
}
#mainwrapper{

	width:auto;
	margin: 0 auto;
	
	padding:5px;
	
	 /* last two border */
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
	width: 90%;
	/* 3 borders combined*/
	margin-left:80px;
	border-radius:10px;
	background:white;
	margin-bottom:20px;
	

}
#tablehead
{
	padding-left:37%;
	color: #e74c3c;
	font-size:20px;
	font-weight:bold;
	
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
					<li class="active"><a><i class="fa fa-home"></i>&nbsp;Home</a></li>
					<li><a href="sold.php"><i class="fa fa-cubes"></i>&nbsp;Stock</a></li>
					<li><a href="deliver.php"><i class="fa fa-shopping-cart"></i>&nbsp;Deliver</a></li>
					<li><a href="delivered.php"><i class="fa fa-check-square-o"></i>&nbsp;Delivered</a></li>
					<li><a href="dataa.php"><i class="fa fa-pie-chart"></i>&nbsp;Stats</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">

				<li id="status">Logged in as admin<li>
                      <li> <form class="form" action="adminpage.php" method="post"><button name="alogout" type="submit" id="logout_btn"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Logout</button></form></li>
				
				</ul>
			</div>
		</div>
	</nav>
<div class="container">
<div id="main">

<table class="table table-striped" id="data" align="center"  cellpadding="5">
<thead>
<tr>
<th colspan="6" id="tablehead">Pending collection of Books</th>
</tr>
<tr>
<th scope="col">Book ID</th>
<th scope="col">Book Name</th>
<th scope="col">Expected Price</th>
<th scope="col">Name</th>
<th scope="col">Contact no</th>
<th scope="col">Address</th>
</tr>
</thead>


<?php
while($rows=mysqli_fetch_assoc($result))
{
	?>
	<tr>
	<td><?php echo $rows['bookid'];?></td>
	<td><?php echo $rows['bookname'];?></td>
	<td><?php echo $rows['exeprice'];?></td>
	<td><?php echo $rows['name'];?></td>
	<td><?php echo $rows['contactno'];?></td>
	<td><?php echo $rows['address'];?></td>
	</tr>
<?php }?>
</table>



<br>
<hr>
<form action="adminpage.php" class="form" method="post">
<div id="mainwrapper">
<center>
<p id="head"><b>Confirm Status</b><p>
<!-- ENTER BOOK ID: &emsp;<input type="text" name="bid" id="bid" placeholder="Enter bookid"> -->
<label for="select">Select ID:&emsp;</label><select id="bid" name="bid"> <?php echo $options;?></select>
<input class="btn btn-primary" type="submit" name="done" id="done" value="Verified">
</center>
</div>
<br>
<hr>
<div id="mainwrapper">
<center>
<p id="head"><b>Re-calculate Selling price again</b><p>
Enter Condition:&emsp;&nbsp;<select name="condition" id="con"><option value="2">very good</option><option value="3">good</option><option value="5">poor</option></select><br><br>
Original Price: &emsp;&emsp;<input type="text" name="oprice" id="oprice" placeholder="Enter original price"><br>
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input class="btn btn-primary" type="button" name="calculate" id="calculate" value="Calculate" onclick="calc()">
<input type="hidden" name="sellprice" id="sell" value="">
<br>
<label>Calculated selling price:<label>&emsp;

<label id="sellingprice"></label>
<p>Customer Accepted ?</p>
<input type="radio" name="choice" id="choice" value="1" onclick="f1()">&emsp;<label>Yes</label>&emsp;&emsp;<input type="radio" name="choice" id="choice" value="0" onclick="f2()">&emsp;<label>No</label>
<div id="noo">
ENTER BOOK ID: &emsp;<input type="text" name="bid2" id="bid2" placeholder="Enter bookid">
<input class="btn btn-primary" type="submit" name="d" id="calculate" value="Rejected">
</div>
<div id="yeso">
ENTER BOOK ID: &emsp;<input type="text" name="bid1" id="bid" placeholder="Enter bookid">
<input class="btn btn-primary" type="submit" name="doneo" id="DoneYes" value="Verified">
</div>
</div>
</div>
</div>


</form>
</center>




		
<script>
	yeso.style.display="none";
	noo.style.display="none";

function calc(){
	

	
	if(!(document.getElementById('oprice').value==""))
	{
			var oprice=parseFloat(document.getElementById('oprice').value);
	var con=parseFloat(document.getElementById('con').value);
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

	document.getElementById('sellingprice').innerHTML=oprice;
	document.getElementById('sell').value=oprice;
	

	}
	else
	{
		alert('Enter original price');
	}

	
	
}
function f1()
{

	var x = document.getElementById("yeso");
	var y=document.getElementById("noo");
  if (x.style.display === "none") {
    x.style.display = "block";
	y.style.display="none";
  } 
  else
  {
	  y.style.display="none";
	 
  }
}
function f2()
{
  var x = document.getElementById("noo");
  var y = document.getElementById("yeso");
  if (x.style.display === "none") {
    x.style.display = "block";
	y.style.display="none";
  } else {
    y.style.display = "none";
	x.style.display = "none";
  }
	
}


</script>


</body>
</html>