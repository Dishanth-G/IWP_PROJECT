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
?>
<html>
<head>
	<title>Data Analysis</title> 
<link rel="stylesheet" href="css/style.css"> 
<link rel = "shortcut icon" type="image/png" href="imgs/logo3.png">

<link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
	<!-- <link rel="stylesheet" type="text/css" href="C:\Users\disha\OneDrive\Desktop\HTML EXE\bootstrap\css\bootstrap.css"> -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Genre', 'Count'],





          <?php

		  

				$sql="SELECT b.genre,COUNT(*) FROM orders o,book b WHERE o.bookbid = b.bookid and o.status1=1 group by b.genre";
				$result5=mysqli_query($con,$sql);

				while($result1=mysqli_fetch_assoc($result5) ){

					echo "['".$result1['genre']."',".$result1['COUNT(*)']."],";

				}



		  ?>
        ]);

        var options = {
          title: 'DIFFERENT GENRE BOUGHT BY CUSTOMERS'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>



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

#piechart{
	margin-left:150px;
	padding-top:0;
}

hr{
	border:2px solid black;
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
					<li><a href="deliver.php"><i class="fa fa-shopping-cart"></i>&nbsp;Deliver</a></li>
					<li ><a href="delivered.php"><i class="fa fa-check-square-o"></i>&nbsp;Delivered</a></li>
					<li class="active" ><a><i class="fa fa-pie-chart"></i>&nbsp;Stats</a></li>
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
<center>

<h3><b>Statistics</b></h3>

<hr>

<div id="piechart" style="width: 600px; height: 500px;"></div>

</center>
<br>

</div>
</div>

<script>


</script>


</body>
</html>


