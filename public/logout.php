<?php
	/*
	* logout.php
	* Controller that handles logging out
	* Same as in PSET7
	* -Negative 15
	*/

    // configuration
    require("../includes/config.php"); 

    // log out current user, if any
    logout();

    // redirect user
    redirect("/");
?>
