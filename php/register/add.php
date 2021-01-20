<?php
	// PHP Script to add to cart.

	require_once("./db.php");
	$db = new DBDriver();

	$itemno = $_GET['itemno'];

	if(!$itemno){
		echo "Item No. Not Sent.";
		exit();
	}

	$quantity = (int)$_POST['itemquantity'];

	if(!$quantity || $quantity <= 0)
		$quantity = 1;

	// Now checking if the item is present in the database. (I.E : If it is valid or not)

	$checkQuery = "SELECT * FROM items WHERE item_no = '".$itemno."'";
	$fetchedItems = $db->query($checkQuery);
	$item = null;

	if($db->numRows($fetchedItems) !== 1){
		echo "Invalid item!";
		exit();
	}

	while($fetched = pg_fetch_assoc($fetchedItems))
		$item = $fetched;

	if(!$item) exit();	// Op. failed midway.

	// Now check if the item is already present in the cart.

	$checkQuery2 = "SELECT * FROM cart WHERE item_no = '".$itemno."'";
	$presentItem = $db->query($checkQuery2);

	if($db->numRows($presentItem) > 0){
		// Item present in cart. Add Quantity to previous quantity.
		$oldquantity = 0;

		while($prItem = pg_fetch_assoc($presentItem)){
			$oldquantity = $prItem['quantity'];			
		}

		$newquantity = $oldquantity + $quantity;

		$updateQuery = "UPDATE cart SET quantity = '".$newquantity."' WHERE item_no='".$itemno."'";

		if($db->query($updateQuery)){
			echo "Successfully updated quantity.";
			header("refresh:1.5;url=index.php");	// Redirect user back after 1.5 seconds.
		}
		else echo "Some error occurred. Kindly try again.";
	}
	else{
		// Item not present in cart. Add new field.
		$price = $item['itemprice'];

		$insertQuery = "INSERT INTO cart(item_no, quantity, price) VALUES('".$itemno."','".$quantity."','".$price."')";

		if($db->query($insertQuery)){
			echo "Successfully added to cart.";
			header("refresh:1.5;url=index.php");	// Redirect user back after 1.5 seconds.
		}
		else echo "Some error occurred. Kindly try again.";
	}
?>
