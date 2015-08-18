<!DOCTYPE html>

<?php
	//initialize all php variables which will later store posted data
	$forename = "";
	$surname = "";
	$city = "";
	$province = "";
	$postalCode = "";
	$telephoneNumber = "";
	$emailAddress = "";
	$pizzaQuantity = "";
	$pizzaSize = "";
	$crustType ="";
	$toppings=array();

	//save all the data that was posted to this page in php variables
	if(isset($_POST["forename"]))
		$forename = trim($_POST["forename"]);
	if(isset($_POST["surname"]))
		$surname = trim($_POST["surname"]);
	if(isset($_POST["city"]))
		$city = trim($_POST["city"]);
	if(isset($_POST["province"]))
		$province = trim($_POST["province"]);
	if(isset($_POST["postalCode"]))
		$postalCode = trim($_POST["postalCode"]);
	if(isset($_POST["telephoneNumber"]))
		$telephoneNumber = trim($_POST["telephoneNumber"]);
	if(isset($_POST["emailAddress"]))
		$emailAddress = trim($_POST["emailAddress"]);
	if(isset($_POST["pizzaQuantity"]))
		$pizzaQuantity = trim($_POST["pizzaQuantity"]);
	if(isset($_POST["pizzaSize"]))
		$pizzaSize = trim($_POST["pizzaSize"]);
	if(isset($_POST["crustType"]))	
		$crustType = trim($_POST["crustType"]);		
	if(isset($_POST["toppings"]))	
		$toppings = $_POST["toppings"];
		
		
	//regular expressions	
	$textOnlyRegex='/^[a-zA-Z\s]+$/'; //'/^[A-z]$/';
	$emailRegExp = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*\.(\w{2}|(com|net|edu|org|ca))$/';	
	$postalCodeRegex = '/^[ABCEGHJKLMNPRSTVXY]\d[ABCEGHJKLMNPRSTVWXYZ]( )?\d[ABCEGHJKLMNPRSTVWXYZ]\d$/i';
	$telephoneRegex='/^\(?(\d{3})\)?[\.\-\/\s]?(\d{3})[\.\-\/\s]?(\d{4})$/';
	
	//array to store validation errors
	$errors = array();

	if($forename == "" || !preg_match($textOnlyRegex, $forename)) 
		array_push($errors, "forename");
	if($surname == "" || !preg_match($textOnlyRegex, $surname)) 
		array_push($errors, "surname");
	if($city == "" || !preg_match($textOnlyRegex, $city)) 
		array_push($errors, "city");
	if($province == "" || $province=='0') 	
		array_push($errors, "province");		
	if($postalCode == "" || !preg_match($postalCodeRegex, $postalCode)) 
		array_push($errors, "postalCode");
	if($telephoneNumber == "" || !preg_match($telephoneRegex, $telephoneNumber)) 
		array_push($errors, "telephoneNumber");
	if(!preg_match($emailRegExp, $emailAddress)) 
		array_push($errors, "email");
	if($pizzaQuantity == "" || $pizzaQuantity=='0') 
		array_push($errors, "pizzaQuantity");
	if($pizzaSize == "") 
		array_push($errors, "pizzaSize");
	if($crustType == "") 
		array_push($errors, "crustType");
	if(empty($toppings)) 
		array_push($errors, "toppings");
		
?>

		<h1><?php echo count($errors) == 0 ? "Web Form Summary" : "Web Form Error"; ?></h1>
		
		<p>
			<?php
				echo count($errors) == 0 ?
					"Please confirm your Order." :
					"Please correct the following information before placing an Order.";
			?>
		</p>
		
		<?php
			if(count($errors) == 0)
			{
		?>
				<p>
					<b>Forename:</b> <?php echo $forename; ?><br />
					<b>Surname:</b> <?php echo $surname; ?><br />
					<b>City: </b><?php echo $city; ?><br />
					<b>Province: </b><?php echo $province; ?><br />
					<b>Postal Code: </b><?php echo $postalCode; ?><br />
					<b>Telephone Number: </b><?php echo $telephoneNumber; ?><br />
					<b>Email address:</b> <?php echo $emailAddress; ?><br />
					<b>Pizza Quantity: </b><?php echo $pizzaQuantity; ?><br />
					<b>Pizza Size: </b><?php echo $pizzaSize; ?><br />
					<b>Crust Type: </b><?php echo $crustType; ?><br />
					<b>Toppings: </b> <?php foreach($toppings as $selected)
								{
									echo "<br/>".$selected;
								}  
								?>					
				</p>
				
				<form method="post" action="dataPersistence.php">
					<input type="hidden" id="hiddenForename" name="hiddenForename" value="<?php echo $forename ?>"/>
					<input type="hidden" id="hiddenSurname" name="hiddenSurname" value="<?php echo $surname ?>"/>
					<input type="hidden" id="hiddenCity" name="hiddenCity" value="<?php echo $city ?>"/>
					<input type="hidden" id="hiddenProvince" name="hiddenProvince" value="<?php echo $province ?>"/>
					<input type="hidden" id="hiddenPostalCode" name="hiddenPostalCode" value="<?php echo $postalCode ?>"/>
					<input type="hidden" id="hiddenTelephoneNumber" name="hiddenTelephoneNumber" value="<?php echo $telephoneNumber ?>"/>
					<input type="hidden" id="hiddenEmailAddress" name="hiddenEmailAddress" value="<?php echo $emailAddress ?>"/>
					<input type="hidden" id="hiddenPizzaQuantity" name="hiddenPizzaQuantity" value="<?php echo $pizzaQuantity ?>"/>
					<input type="hidden" id="hiddenPizzaSize" name="hiddenPizzaSize" value="<?php echo $pizzaSize ?>"/>
					<input type="hidden" id="hiddenCrustType" name="hiddenCrustType" value="<?php echo $crustType ?>"/>
					<input type="hidden" id="hiddenToppings" name="hiddenToppings" value="<?php echo implode(', ', $toppings);?>"/>
					<input type="submit" name="order" value="Order" />
				</form>
				
		<?php } else { ?>
				<ul>
					<?php foreach($errors as $error) { ?>
						<li><?php echo $error; ?></li>
					<?php } ?>
				</ul>
		<?php } ?>