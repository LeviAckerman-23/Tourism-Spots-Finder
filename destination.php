<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=divice-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/destination.css">
	<title>Destinations</title>
	<style type="text/css">
		.container .box .name-text input{
			position: relative;
			display: none;
			background: transparent;
			border: 1px solid #fff;
			top: -20px;
			color: #fff;
			text-decoration: none;
			transition: 0.6s ease;
			text-align: center;
		}
		.btn{
			padding: 5px 40px;
		}
		.btn1{
			margin: 0px -20px;
			padding: 5px 40px;
		}
		.btn2{
			padding: 5px 60px;
		}
		.btn3{
			padding: 5px 37px;
			margin: 0px -2px;
		}
		.btn4{
			padding: 5px 50px;
		}
		.btn5{
			padding: 5px 25px;
		}
		.container .box:hover .name-text input{
			display: block;
			top: -20px;
		}
		.container .box .name-text input:hover{
			background-color: #fff;
		    color: #000;
		}

            
.main-nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: linear-gradient(135deg, #1a2a6c, #b21f1f, #fdbb2d); /* Gradient Background */
  padding: 20px 50px;
  position: absolute;
  width: 100%;
  z-index: 10;
  box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3); /* Soft shadow */
  transition: background 0.5s ease-in-out; /* Smooth transition for hover */
}

.main-nav:hover {
  background: linear-gradient(135deg, #00c6ff, #0072ff, #fdbb2d); /* On hover, change the gradient */
}

.logo h1 {
  color: #fff;
  font-size: 2.5rem;
  font-weight: bold;
  margin: 0;
  letter-spacing: 3px; /* Spacing between letters for elegance */
  text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7); /* Glow effect */
  transition: transform 0.3s ease;
}

.logo h1:hover {
  transform: scale(1.1); /* Scale on hover */
}

.nav-links a {
  color: #fff;
  text-decoration: none;
  margin: 0 20px;
  font-weight: bold;
  font-size: 1.2rem;
  position: relative;
  transition: all 0.4s ease;
}

.nav-links a::before {
  content: "";
  position: absolute;
  width: 0;
  height: 3px;
  bottom: -5px;
  left: 0;
  background-color: aqua;
  transition: width 0.4s ease;
}

.nav-links a:hover::before {
  width: 100%; /* Expand underline on hover */
}

.nav-links a:hover {
  color: #ffb703; /* Change text color */
  letter-spacing: 1px; /* Slight letter spacing on hover */
  text-shadow: 0px 4px 10px rgba(255, 255, 255, 0.8); /* Glow effect on hover */
}

.nav-links a:active {
  transform: scale(0.95); /* Shrink on click for feedback */
} 


	</style>
</head>
<body>
	<h1 class="heading">Poupular Destinations</h1>
	
	<div class="main">
	<nav class="main-nav">
        <div class="logo">
            <h1>VOYAGE VISTA</h1>
        </div>
        <div class="nav-links">
            <a href="mainPage.php">Home</a>
            <!-- <a href="destination.php">Destinations</a> -->
             <a href="route2.php">Map</a>
            <!-- <a href="#">Your Reviews</a> -->
            <a href="feedback.php">Feedback</a>
            <!-- <a href="#">Blog</a> -->
            <a href="profile.php">Profile</a> 
        </div>
        <div class="nav-links">
             <a href="signin.html">Logout</a>
        </div> 
		<span></span>
    </nav>
	</div>
	<div class="container">
		<div class="box">
			<div class="imgBox">
				<img src="images//destination//goa1.jpg" alt="Goa Image" style="width: auto;height: 270px;">
			</div>
			<div class="name-text name-pading1 top1">
				<h1>Goa</h1>
				<form method="POST" action="placeUpdated.php">
					<input type="submit" name="goa" class="btn1" value="Visit">
				</form>
			</div>
		</div>
		<div class="box">
			<div class="imgBox">
				<img src="images//destination//kerala1.jpg" alt="Russia Image" style="width: auto;height: 270px;">
			</div>
			<div class="name-text name-pading2 top1">
				<h1>Kerala</h1>
				<form method="POST" action="placeUpdated.php">
					<input type="submit" name="kerala" class="btn" value="Visit">
				</form>
			</div>
		</div>
		<div class="box">
			<div class="imgBox">
				<img src="images//destination//mysore1.jpg" alt="Russia Image">
			</div>
			<div class="name-text name-pading3 top1">
				<h1>Mysore</h1>
				<form method="POST" action="placeUpdated.php">
					<input type="submit" name="mysore" class="btn" value="Visit">
				</form>
			</div>
		</div>
		<div class="box">
			<div class="imgBox">
				<img src="images//destination//ladakh1.jpg" alt="Russia Image">
			</div>
			<div class="name-text name-pading4 top1">
				<h1>Ladakh</h1>
				<form method="POST" action="placeUpdated.php">
					<input type="submit" name="ladakh" class="btn" value="Visit">
				</form>
			</div>
		</div>
		<div class="box">
			<div class="imgBox">
				<img src="images//destination//tajmahal1.jpg" alt="Russia Image">
			</div>
			<div class="name-text name-pading5 top2">
				<h1>Agra</h1>
				<form method="POST" action="placeUpdated.php">
					<input type="submit" name="agra" class="btn5" value="Visit">
				</form>
			</div>
		</div>
		<div class="box">
			<div class="imgBox">
				<img src="images//destination//india_gate1.jpg" alt="Russia Image">
			</div>
			<div class="name-text name-pading6 top2">
				<h1>India Gate</h1>
				<form method="POST" action="placeUpdated.php">
					<input type="submit" name="india_gate" class="btn2" value="Visit">
				</form>
			</div>
		</div>
		<div class="box">
			<div class="imgBox">
				<img src="images//destination//hampi1.jpg" alt="Russia Image">
			</div>
			<div class="name-text name-pading7 top2">
				<h1>Hampi</h1>
				<form method="POST" action="placeUpdated.php">
					<input type="submit" name="hampi" class="btn3" value="Visit">
				</form>
			</div>
		</div>
		<div class="box">
			<div class="imgBox">
				<img src="images//destination//rajasthan1.jpg" alt="Rajasthan Image">
			</div>
			<div class="name-text name-pading8 top2">
				<h1>Rajasthan</h1>
				<form method="POST" action="placeUpdated.php">
					<input type="submit" name="rajasthan" class="btn2" value="Visit">
				</form>
			</div>
		</div>
		<div class="box">
			<div class="imgBox">
				<img src="images//destination//manali1.jpg" alt="Manali Image">
			</div>
			<div class="name-text name-pading9 top3">
				<h1>Manali</h1>
				<form method="POST" action="placeUpdated.php">
					<input type="submit" name="manali" class="btn3" value="Visit">
				</form>
			</div>
		</div>
		<div class="box">
			<div class="imgBox">
				<img src="images//destination//srinagar1.jpg" alt="Srinagar Image">
			</div>
			<div class="name-text name-pading10 top3">
				<h1>Srinagar</h1>
				<form method="POST" action="placeUpdated.php">
					<input type="submit" name="srinagar" class="btn4" value="Visit">
				</form>
			</div>
		</div>
		<div class="box">
			<div class="imgBox">
				<img src="images//destination//amritsar1.jpg" alt="Amritsar Image">
			</div>
			<div class="name-text name-pading11 top3">
				<h1>Amritsar</h1>
				<form method="POST" action="placeUpdated.php">
					<input type="submit" name="amritsar" class="btn4" value="Visit">
				</form>
			</div>
		</div>
		<div class="box">
			<div class="imgBox">
				<img src="images//destination//jogfalls1.jpg" alt="Jog Falls Image">
			</div>
			<div class="name-text name-pading12 top3">
				<h1>Jog Falls</h1>
				<form method="POST" action="placeUpdated.php">
					<input type="submit" name="jogfalls" class="btn2" value="Visit">
				</form>
			</div>
		</div>
	</div>
</body>
</html>