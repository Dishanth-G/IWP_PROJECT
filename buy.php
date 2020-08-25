<?php
	session_start();
	require 'dbconfig/config.php';
	$query="SELECT bookid,bookname,bprice,author,imglink,cond from book where status=0";
	$result=mysqli_query($con,$query);
?>



<?php

 require 'dbconfig/config.php';
 
 $output='';
 if(isset($_POST['search_btn']))
 {
	 $searchq=$_POST['searchtxt'];
	 $searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
	 
	 $quer=mysqli_query($con,"SELECT * FROM book where status=0 and bookname LIKE '%$searchq%' or author like '%$searchq%'") or die("Could not search");
	 $count=mysqli_num_rows($quer);
	 if($count==0)
	 {
		 $output='<div id="nosearch"><p class="msg">Sorry We couldnot able to find :(</p><p class="msg">Try Some keywords like booknames.. etc </div>';
	 }
	 else
	 {
		while($ro=mysqli_fetch_array($quer))
		{
			
			    if($ro['cond']=="2")
				{
					$co="Very Good";
				}
				else if($ro['cond']=="3")
				{
					$co="Good";
				}
				else
				{
					$co="Poor";
				}
			
			
		
			if($ro['imglink']=="bookuploads/")
			{
				$image='<img class="img1" src="bookuploads\book.png">';
				
			}
			else
			{
				$image='<img class="img1" src="'.$ro['imglink'].'">';
			}
			
	
			
			
			$bokname=$ro['bookname'];
			$author=$ro['author'];
		    $id=$ro['bookid'];
			$price=$ro['bprice'];
			
			$output .='<div id="printing">
						
			'.$image.'<br>
			
			Book id:&nbsp;&nbsp; '.$id.'<br>
			Book name:&nbsp;&nbsp; '.$bokname.'<br>
			
			Author:&nbsp;&nbsp;'.$author.'<br>
			
			Condition:&nbsp;&nbsp;'.$co.'<br>
			
			Price:&nbsp;&nbsp;'.$price.'<br>
			</div>';
		}			
	 }
 }

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

<title>Buy Book</title> 
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
			font-family:Lato;
		}
		h2{
			color:black;
			font-family: Lato;
		}
		#content{
			text-align: center;
		}
		body{
			font-family: Lato;
			background:url("https://assets.website-files.com/5bfd1275cc56e15ce750b18e/5c289afb9a1575cb2f893a3b_15.%20Perfume.jpg");
		}
		h1{
			font-size: 10em;
		}

		html{
			height: 100%;
			scroll-behavior: smooth;
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
.img
{
	padding-top:10px;
	width:250px;
	height:300px;
}

.copw{
	
	width:300px;
	border:1px solid black;
	margin:35px;
	float:left;
	
}
#search{
	padding:5px;
	width:50%;
}
#search_btn
{
	padding:5px;
}
#back1_btn
{
	padding:5px;
}
#printing{
	
    width:300px;
	border:1px solid black;
    margin:20px;
	float:left;
	padding:5px;
	font-weight:bold;
	text-align:center;
}
.img1
{
	padding:10px;
	width:250px;
	height:300px;
}
#nosearch
{
	font-weight:bold;
	text-align:center;
}
h1{
	color:black;
	font-size:30px;
	font-family:Lato;
	font-weight:bold;
}
.msg{
	
	font-family:Lato;
	font-weight:bold;
}
#addtocart{
	width:100px;
	padding:4px;
	margin-bottom:5px;
	font-weight:bold;
	background-color:#00a8ff;
	color:white;
}
h1{
	
	font-family:Pacifico;
	
	
	
}
hr{
	width:auto;
	border:2px solid black;
}
.backs{
	margin-top:0px;
			width:75%;
	        margin: 0 auto;
			background:white;
	        padding:15px;
			padding-bottom:10px;
	        border-radius:10px;
	        border:1px solid black;
			background-repeat: no-repeat;
			
}
#addedtocart{
	display:none;
}
#already{
	display:none;
}
.increase
{
	font-size:20px;
}
#content{
	margin-top:0px;
			width:100%;
	        margin: 0 auto;
			background:white;
	        padding:15px;
			padding-bottom:10px;
	        border-radius:10px;
	        border:1px solid black;
			background-repeat: no-repeat;
			
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

#titol{
	font-size:44px;
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
				<a href="homepage.php" class="navbar-brand">Books Lake</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-nav-demo">
                    <ul class="nav navbar-nav">
					<li><a href="homepage.php"><i class="fa fa-home"></i>&nbsp;Home</a></li>
					<li class="active"><a><i class="fa fa-shopping-bag"></i>&nbsp;Buy Books</a></li>
					<li><a href="sell.php"><i class="fa fa-money"></i>&nbsp;Sell Book</a></li>
					<li><a href="orders.php"><i class="fa fa-list-alt"></i>&nbsp;My Orders</a></li>
					<li><a href="history.php"><i class="fa fa-history"></i>&nbsp;History</a></li>
				
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="profile.php"><i class="fa fa-user"></i>&nbsp;Profile</a></li>
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
		<div class="container">
		
			<div id="content">
			
			
			<div class="alert alert-success" id="addedtocart">
			<span class="increase"><strong>Success!</strong> Added into cart. <a href="cart.php">Click here to view Cart </a></span>
			</div>
			<div class="alert alert-info" id="already">
			<span class="increase"><strong>Info!</strong> Already in cart. <a href="cart.php">Click here to view Cart </a></span>
			</div>
			<h1 id="titol">Buy Books</h1>

		<hr><br>
			<form class="log" action="buy.php" method="post">
			<label for="search" >Search for a book:</label>	
			
			<input type="text" name="searchtxt" id="search" placeholder="Enter book name,author etc..">
			<button type="submit" id="search_btn"  name="search_btn"><i class="fa fa-search" aria-hidden="true"></i>&nbsp;Search</button>
			<a name="top" href="#cont"><button type="button" id="back1_btn" name="back_btn" ><i class="fa fa-refresh" aria-hidden="true"></i>&nbsp;Go to Search Results</button></a>
			
			
			<div class="row">
			
			
		<?php
         while($rows=mysqli_fetch_assoc($result))
		{
	    ?>
			
             <div class="copw">
			  
			  
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
			<label>Book id :&emsp;<span id="bida"><?php echo $rows['bookid'];?></span></label>
			<br>
			
			<label>Book name:&emsp;<?php echo $rows['bookname'];?></label>
			
			<br>
			<label>Author:&emsp;<?php echo $rows['author'];?></label>
			<br>
			<label>Price:&emsp;<?php echo $rows['bprice'];?></label>
			<br>
			
			

			<?php
			    
				if($rows['cond']=="2")
				{
					$condition="Very Good";
				}
				else if($rows['cond']=="3")
				{
					$condition="Good";
				}
				else
				{
					$condition="Poor";
				}
				
			
			   
			
			?>
			
			<label>Condition:&emsp;<?php echo $condition;?></label><br>
			
			
			
			<input type="submit" class="btn btn-primary" value="+ Add to cart" name="add_to_cart" id="addtocart">
	
			  
			 </div>
			 
			 <?php }?>
			 
			 
            </div>	
			<input type="hidden" id="hidden_id" name="hidden_id1">
			</form>
			
			
			
            </div>
			</div>
			
	<br><br>
		

<div class="container backs" id="cont">
<center><h1>Search Results</h1></center>
<hr>
<?php print("$output");?>
</div>


<script src="https://code.jquery.com/jquery-2.1.4.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script>

function hiding()
{
	document.getElementsByClassName('row')[0].style.display='none';
}


function showr()
{
	document.getElementsByClassName('row')[0].style.display='block';
}

</script>

	





<script>

function setval(bookid1){
	
	document.getElementById('hidden_id').value=bookid1;
    	
	
}

var addtocart= document.getElementsByName('add_to_cart');
	for(var i=0;i<addtocart.length;i++)
	{
		//alert("Hi");
		var button=addtocart[i];
		button.addEventListener('click',function(event)
		{
			var buttonclicked=event.target;
			var row1=buttonclicked.parentElement;
			var x=row1.querySelectorAll("#bida");
			var bookid1=x[0].innerText;
			setval(bookid1); 
			
			
			
			
		}
		)
	};
	
	
	
	
	
	

</script>



<?php
if(isset($_POST['add_to_cart']))
 {
	 $username2=$_SESSION['username'];
	 $bids=$_POST['hidden_id1'];
	 $query3="SELECT * from cart where bid='$bids' and username='$username2'";
	 $result3=mysqli_query($con,$query3);
	 
	 $count=0;
	 
	 $count=mysqli_affected_rows($con);
	 
	 //echo "<script type='text/javascript'>alert('$count');</script>";
	 
	 if($count==0)
	 {
					
	 
					$query2="insert into cart values('$bids','$username2')";
					$query_run= mysqli_query($con,$query2);
					if($query_run)
					{
						//$message = "Successfully added to cart";
						//echo "<script type='text/javascript'>alert('$message');</script>";
						echo "<script>
						var x= document.getElementById('addedtocart');
						x.style.display='block';
						</script>";
					}
					else
					{
						echo '<script type="text/javascript"> alert("Error!")</script>';
					}
	 }
	 else
	 {
		 echo"<script>
						var x= document.getElementById('already');
						x.style.display='block';
						</script>";
	 }
	 
	 

 }




?>
<br>
</body>
</html>