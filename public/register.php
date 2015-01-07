<?php   
    /*
    * register.php
    * Controller that handles registering new users
    * Same as PSET 7
    * Negative 15
    */

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
   
        // validate submission
        // case: empty username
        if (empty($_POST["username"]))
        {
            apologize("You must provide your username.");
        }
        
        // case: empty password
        else if (empty($_POST["password"]))
        {
            apologize("You must provide your password.");
        }
        
        // case: empty confirmation
        else if (empty($_POST["confirmation"]))
        {
            apologize("You must confirm your password.");
        }
        
        // case: passwords do not match
        else if ($_POST["password"] != $_POST["confirmation"])
        {
            apologize("Passwords do not match");
        }
        
        // register the user
        $result = query("INSERT INTO users (username, hash) VALUES(?, ?)", $_POST["username"], crypt($_POST["password"]));
        
        // if registration failed
        if ($result === false)
        {
            apologize("Registration failed. (Username already in use)");
        }
        
        // if registration succeeds
        else
        {
            // log them in
            $rows = query("SELECT LAST_INSERT_ID() AS id");
            $id = $rows[0]["id"];
            $_SESSION["id"]=$id;
            redirect("index.php");
        }
    }
?>
