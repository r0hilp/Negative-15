<!--
* makemeal.php
* The second page in the Make Meal sequence
* Posts to constructmeal a JSON holding foods the users ate
* Negative 15  
-->

<script src="/js/jquery-1.11.1.min.js"></script>
<script src ="/js/mealmenu.js"></script>
<script src ="/js/foodselect.js"></script>
<script src="/js/meal_construct.js"></script>

<div id = "box" class = "box"> 
 	<div class = "styled-select">
 		<div class="form-group">
 			Meal Time: <select id="mealtime" class="form-control" name="meal_time">
		     <option value="BREAKFAST">Breakfast</option>
		     <option value="LUNCH">Lunch</option>
		     <option value="DINNER">Dinner</option>
		     <option value="BRUNCH">Brunch</option>
		     </select>
 		</div>
 	</div>


	 <div class="form-group">
	     <button id = "go" class = "myButton">Go!</button>
	 </div>
</div> <!--END BOX-->

<div id='cssmenu'></div><!--USED FOR JSCRIPT-->
<div class = "smallvspace"></div>
<div class = "box">
	<h1>Current Meal<h1>
	<div>
	   <ol id="foodlist"></ol>
	</div>
	 <div class="form-group">
	     <button id = "goto" class = "myButton">Make a Meal!</button>
	 </div>
</div>

<!--Invisible forms to pass data between JScript and PHP-->
<div id = 'blank-form' style = 'display:none'>
	<form id = 'food-form' action = 'constructmeal.php' method = 'post'>
		<input type = 'text' id = 'food-form-input' name = 'meal-json' value = '{'/>
		<input type = 'text' id = 'food-form-time' name = 'meal-time' value = ''/>
	</form>
</div>
