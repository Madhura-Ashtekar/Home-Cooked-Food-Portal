<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../css/chef_cuisine.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

<div class="main">
	<div class="topnav">
		<a href="#home">Home</a>
		<a class="active" href="#news">Order Food</a>
		<a href="#contact">Chef Registration</a>
		<a href="#about">Register/SignIn</a>
	</div>
	<div class="menubar" id="menubar">
		<div style="padding-left:16px">
		  <h2>Home Chefs near you</h2>
		</div>
		<div class="location">
			<input id="location" placeholder="Location">  </input>
		</div>
		
		<div id="filters" class="filters">
		  <form action="/php/filter.php">
		  <select name="cost" id="cost">
			<option value="cost1">0-100</option>
			<option value="cost2">100-500</option>
			<option value="cost3">500-1000</option>
			<option value="cost4">1000+</option>
		  </select>
		  
		  <select name="cuisine" id="cuisine">
			<option value="nind">North Indian</option>
			<option value="sind">South Indian</option>
			<option value="ita">Italian</option>
			<option value="thai">Thai</option>
		  </select>
		  
		  <select name="rating" id="cost">
			<option value="rating1">1 star</option>
			<option value="rating2">2 star</option>
			<option value="rating3">3 star</option>
			<option value="rating4">4 star</option>
		  </select>
		  
		  <input type="submit" value="Submit">
		</form>
		</div>
	</div>
	<div class="container">
	<div>
		<?php
			 $hostname = "localhost";
			 $user = "root";
			 $pass = "";
			 $db = "foodportal";
			
			$mysqli = new mysqli($hostname,$user,$pass,$db);
			if ($mysqli -> connect_errno) {
				echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
			}
			$sql = 'SELECT * FROM chef;';
			 $result = mysqli_query($mysqli, $sql);
			 if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					echo '<br></br>';
					//echo json_encode($row);
					echo '<div class="chef_row" id="chef_row">';
					echo '<div class="profile">';
					echo '<img src="../photos/profile.jpg" class="profile-pic" width="60" height="60">';
					echo '</div>';
					echo '<div class="chef-details">';
					echo '<span> Name: '.$row['chef_name'].'</span>';
					echo '<span> Adrdress: '.$row['chef_address'].'</span>';
					echo '<span> Cuisine: '.$row['cuisine'].'</span>';
					//echo '<span> Veg/NonVeg: '.$row[veg/nonveg].'</span>';
					echo '</div>';
					echo '</div>';
				}
			 } else {
				echo "0 results";
			 }
			 mysqli_close($mysqli);
			//else{
				//printf("0 rows returned");
			//}
			?>
		</div>
	</div>
	
</div>

</div>


</body>
</html>