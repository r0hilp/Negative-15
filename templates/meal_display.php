<!--
* meal_display.php
* Fourth php file, second rendered page in Make Meal sequence
* Gets passed a meal json, posts to meal.calculate
* Displays your desired meal before calculating nutrition costs
* Negative 15  
-->

</div>
</div> <!-- End Smallcontainer and Middle Classes-->

<div class = "nutritioncontainer">
<div class = "box">
	<form action = "meal_calculate.php" method = "post">
		<div class="table-title">
			<h3>Confirm Meal</h3>
		</div>
		<table class = "table-fill">
			<thead class>
				<th>Food</th>
				<th>Portion</th>
			</thead>
			<tbody class = "table-hover">
					<?php
						$count = 0;
						$meal_json = json_decode($meal);
						foreach($meal_json as $recipe => $food)
						{	
							print("<tr>");
							print("<td>".$food."</td>");
							print('<td><input type = "number" step = "any" min = "0" name = "'.$recipe.'" value = "portion'.$count.'">'.'</input>');
							print("</tr>");
							$count = $count+1;
						}
						print('<input type = "text" name = "meal_json" style = "display:none" value = \''.$meal.'\'>'.'</input>');
						print('<input type = "text" name = "meal_time" style = "display:none" value = \''.$time.'\'>'.'</input>');
					?>
			</tbody>
		</table>
		<div class = "smallvspace"></div>
		<div>
			<button type = "submit" class = "myButton">Calculate</button>
		</div>
	</form>
</div>
</div>