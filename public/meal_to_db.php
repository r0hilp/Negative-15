<?php
	/*
	* meal_to_db.php
	* Controller that queries a made meal into the history table
	* -Negative 15
	*/
	
	// config
	require("../includes/config.php");

	// pack nutrition info into a json string
	$nutrition_json = '{"total-cal":"'.$_POST["total-cal"].'","total-protein":"'.$_POST["total-protein"].'","total-satfat":"'.$_POST["total-satfat"].'","total-carbs":"'.$_POST["total-carbs"].'","total-sodium":"'.$_POST["total-sodium"].'","total-totfat":"'.$_POST["total-totfat"].'"}';
	$count = 1;

	// begin a stringified food json
	$food_json = '{';

	while(array_key_exists("recipe".$count, $_POST))
	{
		// pack portion and recipe into stringified json
		$food = $_POST["recipe".$count];
		$portion = $_POST["portion".$count];
		$food_json_entry = '"'.$food.'":';
		$portion_json_entry = '"'.$portion.'",';
		$food_json = $food_json.$food_json_entry;
		$food_json = $food_json.$portion_json_entry;
		$count = $count+1;
	}

	// return portion of the string
	$food_json = substr($food_json, 0, -1);

	// end the stringified food json
	$food_json = $food_json.'}';

	// query stringified json into sql table
	query("INSERT into mealhistory (id, meal, nutrition, mealtime) VALUES(?, ?, ?, ?)", $_SESSION["id"], $food_json, $nutrition_json, $_POST["meal_time"]);
	
	// redirect to home page
	redirect("index.php");
?>