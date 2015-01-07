<!--
* nutrition.php
* Displays nutritional information in a table
* Negative 15  
-->

</div>
</div> <!-- End Smallcontainer and Middle Classes-->

<div class = "nutritioncontainer">

<script src = "/js/apicall.js"></script>
<script src="/js/jquery-1.11.1.min.js"></script>

	<div class = "box">
		<div class = "table-title"> <h3>Nutrition Info</h3> </div>
		<table class="table-fill">
			<thead >
				<tr>
					<th>Food</th>
					<th>Portion</th>
					<th>Nutrition Facts</th>
				</tr>
			</thead>
			<tbody>
		    <?php
		    	foreach($meal_data["foodlist"] as $val)
		    	{
		    		print("<tr>");
			    	$recipe = "<td class = 'data' value = 'recipe' id ='".$val["food"]."'>".$val["food"]."</td>";
			        print($recipe);
			        print("<td class = 'data' value = 'portion' id ='".$val["portion"]."'>".$val["portion"]."</td>");
			        print("<td class = 'data' value = 'nutrition' portion = '".$val["portion"]."'recipe ='".$val["recipe"]."'"."id = '".$val["recipe"]."n'"."></td>");
			        print("</tr>");
		    	}
		    ?>
			</tbody>
		</table>
		<div id = "mealtotal"></div>
 		<div class="form-group">
     		<button id = "go" class = "myButton">Confirm and show Nutrition!</button>
 			
 		</div>

		<div>
<form action = "meal_to_db.php" method = "post">
<?php
$count = 1;
foreach($meal_data["foodlist"] as $val)
{
	print('<input type = "text" style = "display:none" name = "recipe'.$count.'" value = "'.$val["food"].'"/>');
	print('<input type = "text" style = "display:none" name = "portion'.$count.'" value = "'.$val["portion"].'"/>');
	$count = $count+1;
}
?>
<input type= "text" style = "display:none"  name = "total-cal" id = "total-cal" value = "">
<input type = "text" style = "display:none"  name = "total-protein" id = "total-protein" value = "">
<input type = "text" style = "display:none"  name = "total-satfat" id = "total-satfat" value = "">
<input type = "text" style = "display:none"  name = "total-carbs" id = "total-carbs" value = "">
<input type = "text" style = "display:none"  name = "total-sodium" id = "total-sodium" value = "">
<input type = "text" style = "display:none"  name = "total-totfat" id = "total-totfat" value = "">
<input type = "text" style = "display:none"  name = "meal_time" id = "meal_time" value = "<?php print($time) ?>">
<button type = "submit" id = "save" class = "myButton">Save your Meal</button>
</form>
</div>
<div>
	<a href="logout.php">Log Out</a>
</div>

