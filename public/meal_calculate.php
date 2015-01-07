<?php
	/*
	* meal_calculate.php
	* Controller gets posted to by mealdisply.php
	* The 5th php file in Make Meal sequence, the third controller
	* Handles last-minute data transfers between php files
	* -Negative 15
	*/

	// config
	require("../includes/config.php"); 

	// don't let people get to this page via url
	if($_SERVER["REQUEST_METHOD"] != "POST")
	{
		redirect("meal.php");
	}

	// variable to hold post value
	$var = $_POST;

	// creates variable to hold recipe list, meal time, and portions
	$meal_data = [
		"foodlist" => []
	];

	$count = 0;

	// decode the posted json object as a string
	$meal_json = json_decode($_POST["meal_json"], true);
	
	// assign data to meal_json in meal_data
	$meal_data["meal_json"] = $_POST["meal_json"];

	// for all key/value pairs in the posted JSON
	foreach ($var as $key => $value) {
		if($key == "meal_json" || $key == "meal_time")
		{
			continue;
		}
		
		// assign food information to array elements in meal data
	    $foodtemp = [];
	    $foodtemp["recipe"] = $key;
	    $foodtemp["food"] = $meal_json[$key];
	    $foodtemp["portion"] = $value;
	    $meal_data["foodlist"][$count] = $foodtemp;
	    $count = $count + 1;
	}

	// render nutrition and pass meal data
	render("nutrition.php" , [ "meal_data" => $meal_data, "time" => $_POST["meal_time"]]);
?>
