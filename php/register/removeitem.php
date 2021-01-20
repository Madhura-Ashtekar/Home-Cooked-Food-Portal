<?php
	// PHP Script to remove an item from the cart.

	require_once("./db.php");
	$db = new DBDriver();

	$itemno = $_GET['itemno'];

	if(!$itemno){
		echo "Item No Not Sent.";
		exit();
	}

	$checkQuery = "SELECT * FROM items WHERE item_no = '".$itemno."'";

	if($db->numRows($db->query($checkQuery)) !== 1){
		echo "Invalid item!";
		exit();
	}

	// Item exists, now check if it is in the cart.

	$checkQuery1 = "SELECT * FROM cart WHERE item_no = '".$itemno."'";

	if($db->numRows($db->query($checkQuery)) <= 0){
		echo "Item not present in cart.";
		exit();
	}

	// Item is present in the cart of the user. Remove it.

	$removalQuery = "DELETE FROM cart WHERE item_no = '".$itemno."'";

	if($db->query($removalQuery)){
		echo "Successfully removed item from cart.";
		header("refresh:1.5;url=index.php");
	}
	else{
		echo "Some error occurred. Try again.";
	}
?>
