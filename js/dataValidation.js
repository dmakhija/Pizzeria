/* 
	 Group Members:
		Kostiantyn Vasylenko(6917736)
		Il Gon Kim(6658751)
		Durga Makhija(6857874)
		Yuan Xu(6834972)
	 Revision History: 2014.10.04: Created, validated elements
					   2014.10.09: Fixed format validation of telephone, postal code and email address
					   2014.10.10: Fixed Select box validation issue
*/

function isRegistrationFormValid()
			{
				var inputErrorMessage = "Please correctly provide the following information";
				

				var forename = document.getElementById("forename");
				var surname = document.getElementById("surname");
				var city = document.getElementById("city");
				var province = document.getElementById("province");
				var postalCode = document.getElementById("postalCode");
				var telephoneNumber = document.getElementById("telephoneNumber");
				var emailAddress = document.getElementById("emailAddress");
				var pizzaQuantity = document.getElementById("pizzaQuantity");
				var pizzaSize = document.getElementsByName("pizzaSize");
				var crustType = document.getElementsByName("crustType");
				var toppings = document.getElementsByName("toppings");
				var inputErrors = new Array();
				var firstError ;
				
				if(isEmpty(forename.value) == true)
				{
					firstError = checkFisrtError(firstError,forename);
					inputErrors.push("Forename");
				}
				if(isEmpty(surname.value) == true)
				{
					firstError = checkFisrtError(firstError,surname);
					inputErrors.push("Surname");
				}
				if(isEmpty(city.value) == true)
				{
					firstError = checkFisrtError(firstError,city);
					inputErrors.push("City");
				}
				if(isEmpty(province.value) == true || province.value == "0")
				{
					firstError = checkFisrtError(firstError,province);
					inputErrors.push("Province");
				}
				if(isPostalValid(postalCode) != true )
				{
					firstError = checkFisrtError(firstError,postalCode);
					inputErrors.push("Postal Code");
				}
				
				if(isTelephoneValid(telephoneNumber) != true)
				{
					firstError = checkFisrtError(firstError,telephoneNumber);
					inputErrors.push("Telephone Number");
				}
				if(isEmailValid(emailAddress.value) == false)
				{
					firstError = checkFisrtError(firstError,emailAddress);
					inputErrors.push("Email address");
				}
				if(isEmpty(pizzaQuantity.value) == true || pizzaQuantity.value == "0")
				{
					firstError = checkFisrtError(firstError,pizzaQuantity);
					inputErrors.push("Number of Pizzas");
				}
				if(!isChecked(pizzaSize ) )
				{
					firstError = checkFisrtError(firstError,pizzaSize.small);
					inputErrors.push("Pizza Size");
				}
				if(!isChecked(crustType ) )
				{
					firstError = checkFisrtError(firstError,crustType.handTossed);
					inputErrors.push("Crust Type");
				}
				if(isChecked(toppings) == false) 
				{	
					firstError = checkFisrtError(firstError,toppings.sausage);
					inputErrors.push("Toppings");
				}
				// continue with if statements to check remaining inputs

				if(inputErrors.length == 0)
				{
					alert("Your order has been submitted.");
					return true;
				}
				else
				{
					for(var i = 0; i < inputErrors.length; i++)
					{
						inputErrorMessage = inputErrorMessage + "\n- " + inputErrors[i];
					}

					alert(inputErrorMessage);
					firstError.focus();
				return false;
				}
}

function checkFisrtError(firstError,element)
{
	if(firstError == null)
	{
		firstError = element;
		return firstError;
	}
	else
		return firstError;
	
}


function isEmpty(string)
{
	/// <summary>Test if given string is empty. Considers untrimmed strings as not empty.</summary>
	/// <param name="string">String to test for emptiness</param>
	/// <returns type="Boolean">True if empty, false otherwise.</returns>
	if(string == null || string == "") 
	{
		
		return true;
	}
	else 
	{
		return false;
	}
}

function isChecked(inputCollection)
{
	for(var i  = 0; i < inputCollection.length; i++)
	{
		if(inputCollection[i].checked == true) 
		return true;
	}

	return false;
}

function isEmailValid(input){
	var regularExpression;
	//switch(inputType){
		/* case "telephoneNumber":
			regularExpression=/^\(?(\d{3})\)?[\.\-\/\s]?(\d{3})[\.\-\/\s]?(\d{4})$/;
			break; */
		//case "emailAddress":
	//regularExpression=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*\.(\w{2}|(com))$/;
	regularExpression=/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
			//break;
	//}

	if(regularExpression.test(input) == true) return true;
	else return false;
}

function isPostalValid(postal) {
    var regex = new RegExp(/^[ABCEGHJKLMNPRSTVXY]\d[ABCEGHJKLMNPRSTVWXYZ]( )?\d[ABCEGHJKLMNPRSTVWXYZ]\d$/i);
    if (regex.test(postal.value))
        return true;
    else return false;
}

function isTelephoneValid(telephone) {
    var regex = new RegExp(/^\(?(\d{3})\)?[\.\-\/\s]?(\d{3})[\.\-\/\s]?(\d{4})$/);
    if (regex.test(telephone.value))
        return true;
    else return false;
}
