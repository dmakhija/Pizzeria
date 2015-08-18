<!DOCTYPE html>

<?php
	//include the data base file
	include("database.php");
	
	//save all posted data in php variables
	 $forename = trim($_POST["hiddenForename"]);
	 $surname = trim($_POST["hiddenSurname"]);
	 $city = trim($_POST["hiddenCity"]);
	 $province = trim($_POST["hiddenProvince"]);
	 $postalCode = trim($_POST["hiddenPostalCode"]);
	 $telephoneNumber = trim($_POST["hiddenTelephoneNumber"]);
	 $emailAddress = trim($_POST["hiddenEmailAddress"]);
	 $pizzaQuantity = trim($_POST["hiddenPizzaQuantity"]);
	 $pizzaSize = trim($_POST["hiddenPizzaSize"]);
	 $crustType = trim($_POST["hiddenCrustType"]);
	 $toppings = $_POST["hiddenToppings"];	
	 
	 /*
	 echo $forename."<br/>";
	 echo $surname."<br/>";
	  echo $city."<br/>";
	   echo $province."<br/>";
	    echo $postalCode."<br/>";
		 echo $telephoneNumber."<br/>";
		  echo $emailAddress."<br/>";
		   echo $pizzaQuantity."<br/>";
		    echo $crustType."<br/>";
			 echo $toppings."<br/>";
	*/
	
	$sqlInsert = "INSERT INTO `order`(`forename`, `surname`, `city`, `province`, `postalCode`, `telephoneNumber`, `emailAddress`, 
										`pizzaQuantity`, `pizzaSize`, `crustType`, `toppings`)
				VALUES ('$forename', '$surname', '$city', '$province', '$postalCode', '$telephoneNumber', '$emailAddress', 
										$pizzaQuantity,'$pizzaSize', '$crustType','$toppings')"; 
	
	mysql_query($sqlInsert);
	mysql_close();
	
	?>
		<h1>Thank you.Your order has been placed.</h1>
		<p>The pizza will arrive shortly.</p>
