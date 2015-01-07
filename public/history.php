<?php
    /*
    * history.php
    * Controller that renders the makemeal.php
    * The first page in the Make Meal sequence
    * -Negative 15
    */

    // configuration
    require("../includes/config.php"); 
    $rows = query("SELECT * FROM mealhistory WHERE id = ?", $_SESSION["id"]);
            $temp = '<article class = "accordion">';
    $count = 1;
    foreach($rows as $row)
    {
        $meal_time = $row["mealtime"];
        $datetime = explode(' ', $row["date"]);
        $temp = $temp.'<section id="acc'.$count.'"><h2><a href = "#acc'.$count.'">'.$meal_time.' '.$datetime[0].'</a></h2>';
        $meal_json = json_decode($row["meal"], true);
        $nutrition_json = json_decode($row["nutrition"], true);
        foreach($meal_json as $food => $portion)
        {
            $temp = $temp.'<p>'.$portion.' portions of '.$food.'</p>';
        }
        $temp = $temp.'<p> Total calories: '.$nutrition_json["total-cal"].'</p>';
        $temp = $temp.'<p> Total protein: '.$nutrition_json["total-protein"].'</p>';
        $temp = $temp.'<p> Total fat: '.$nutrition_json["total-totfat"].'</p>';
        $temp = $temp.'<p> Total carbohydrates: '.$nutrition_json["total-carbs"].'</p>';
        $temp = $temp.'<p> Total sodium: '.$nutrition_json["total-sodium"].'</p>';
        $temp = $temp.'<p> Total saturated fat: '.$nutrition_json["total-satfat"].'</p>';
        $temp = $temp.'</section>';
        $count = $count+1;
    }
    
    render("history_form.php", ["temp" => $temp]);
?>
