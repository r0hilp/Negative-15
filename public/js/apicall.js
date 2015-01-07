/**
 * CS50 final project
 * 
 * Negative 15 
 * apicall.js
 *
 * Eric Li, Rohil Prasad, Steven Ban
 *
 * queries the CS50 food API, given the user selected foods and portions
 */

 // runs as part of meal_calculate.php, controller for nutrition.php

//global JSON object
total = {
	"calories":0,
	"protein" : 0,
	"satfat":0,
	"carbs" : 0,
	"sodium" : 0,
	"totfat" :0,
};

// runs when document is loaded
$( document ).ready(function() {
	// variable to check if nutrition facts for foods have already been updated
	var nutrition = 0; 
	// event handler when user clicks on go, button "Confirm and show nutrition!"
	$("#go").click(function(){
		// if user has already clicked button, script doesn't run
		if(nutrition == 1)
		{
			return;
		}
		// logs button click
		nutrition = 1;

		// iterates through table data -- each td element has class "data"
		$('.data').each(function(index){
			// action depends on the type of column, stored in the "value" attribute of each td element.
			var columntype = $(this).attr("value");
			// keep a reference to $(this), the current element.
			var self = $(this);

			// only need to act on nutrition columns
			if(columntype == "nutrition")
			{
				// pull out data stored in td attributes
				var recipe = self.attr("recipe");
				var portion = self.attr("portion");

				// temporary object to hold information for a given food
				var fooditem = {};

				// make API call using .getJSON for the desired recipe
				var url = "http://api.cs50.net/food/3/facts?key=ab4e3103a97e94112ed3f1eefad008cd&output=json&recipe="+recipe;

				$.getJSON(url, function (data){

					// iterate through returned object. JSON includes nutrition breakdown for queried food
					// select desired nutrition facts, add them to fooditem object with associated key to keep track of values
					$.each(data, function(index, obj){
					    if(obj.fact == 'Calories'){
					          fooditem.calories = obj.amount*portion;
					          total.calories = total.calories + fooditem.calories;
							console.log(total.calories);
					    }
					    else if(obj.fact == 'Protein'){
				        	fooditem.protein = obj.amount*portion;
				        	total.protein = total.protein + fooditem.protein;
				       	}
				       	else if(obj.fact == 'Saturated Fat')
				       	{
				       		fooditem.satfat = obj.amount*portion;
				       		total.satfat = total.satfat + fooditem.satfat;
				       	}
				       	else if(obj.fact == 'Total Carbs')
				       	{
				       		fooditem.carbs = obj.amount*portion;
				       		total.carbs = total.carbs + fooditem.carbs;
				       	}
				       	else if(obj.fact == 'Sodium')
				       	{
				       		fooditem.sodium = obj.amount*portion;
				       		total.sodium = total.sodium + fooditem.sodium;
				       	}
				       	else if(obj.fact == 'Total Fat')
				       	{
				       		fooditem.totfat = obj.amount*portion;
				       		total.totfat = total.totfat + fooditem.totfat;
				       	}
				       	
				       	// generate HTML for meal total
						var totalcontent = '<table class = "table-fill"><tbody><tr><td>Meal Total</td><td><ul id = "otis" class = "nutrition">'+
						'<li>Meal Total</li>'+
						'<li>Calories: '+total.calories.toFixed(1)+'</li>'+
						'<li>Protein: '+total.protein.toFixed(1)+'g</li>'+
						'<li>Satfat: '+total.satfat.toFixed(1)+'g</li>'+
						'<li>Carbs: '+total.carbs.toFixed(1)+'g</li>'+
						'<li>Sodium: '+total.sodium.toFixed(1)+'mg</li>'+
						'<li>Total fat: '+total.totfat.toFixed(1)+'g</li>'
						+'</ul></td></tr></tbody></table>';

						// update each html field with new nutritional information
						$("#mealtotal").html(totalcontent);
						$("#total-cal").val(total.calories);
						$("#total-protein").val(total.protein);
						$("#total-satfat").val(total.satfat);
						$("#total-carbs").val(total.carbs);
						$("#total-sodium").val(total.sodium);
						$("#total-totfat").val(total.totfat);

						// generate html for the selected food item and update HTML With desired nutrition facts
				       	var contentstring = '<ul id = "otis" class = "nutrition">'+
				       	'<li>Calories: '+fooditem.calories+'</li>'+
				       	'<li>Protein: '+fooditem.protein+'g</li>'+
				       	'<li>Satfat: '+fooditem.satfat+'g</li>'+
				       	'<li>Carbs: '+fooditem.carbs+'g</li>'+
				       	'<li>Sodium: '+fooditem.sodium+'mg</li>'+
				       	'<li>Total fat: '+fooditem.totfat+'mg</li>'
				       	+'</ul>';
				       	self.html(contentstring);
			    	});
				});
			}
				// console.log($(this).attr("id"));
			
		});
	});
		//Do three of these things, have different classes for recipe, portion, and nutrition, do one api call for all of the things
		//Break up the json it returns and populate the forms using $(this).html()
});