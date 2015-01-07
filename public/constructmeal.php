<?php
	/*
	* constructmeal.php
	* Controller that renders meal_display.php
	* A meal-json gets posted to by constructmeal.php in templates
	* The third php file in the Make Meal sequence, the second controller
	* -Negative 15
	*/

	// config
	require("../includes/config.php"); 

	// don't allow people to get to this page by url
	if($_SERVER["REQUEST_METHOD"] != "POST")
	{
		redirect("index.php");
	}
	if($_POST["meal-json"] != '}')
	{
		render("meal_display.php",["meal" => $_POST["meal-json"], "time" => $_POST["meal-time"]]);
	}
	else
	{
		redirect("make.php");
	}
	// render meal_display passing the posted value as meal
?>