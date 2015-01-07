/**
 * CS50 final project
 * 
 * Negative 15 
 * mealmenu.js
 *
 * Eric Li, Rohil Prasad, Steven Ban
 *
 * Generates HTML for a CSS dropdown menu with clickable buttons for the meal's food items
 */

// runs as part of make.php, controller for makemeal.php

// global objects
meal_data = {
	foodlist: []
};
var count = 0;

// runs the script when the document is loaded
$( document ).ready(function() {

	// event handler for when the user clicks the go button
	$("#go").click(function(){

		// makes an API call for foods for a given meal time
		var url = "http://api.cs50.net/food/3/menus?key=ab4e3103a97e94112ed3f1eefad008cd&output=json&meal="+$("#mealtime option:selected").val();
		$.getJSON(url, function (data){

			// puts selected meal time as value for food-form-time element
			$("#food-form-time").val($("#mealtime option:selected").val());

			// declare string that holds generated html
			var contentstring='';

			// keep track of food category and index
	        var category = data[0].category;
	        var count = 1;

	        // first section of new html
	        contentstring += '<article class = "accordion">';
	        contentstring += '<section id="acc1"><h2><a href = "#acc1">' + category + '</a></h2>'
	        var i = 0; 

	        // iterate through returned data json
	        while (i < data.length) {

	        	// if the next food's category is different, end the current section element and begin a new section element
	        	if(data[i].category != category) 
	        	{
	        		contentstring += '</section>';
	        		count = count + 1;
	        		counter = count.toString();
	        		category = data[i].category;
	        		contentstring += '<section id="acc' + counter + '">';
	        		contentstring += '<h2>' + '<a href="#acc'+counter+'">'+category + '</a>' + '</h2>';
	        	} 

	        	// add a food to a given category section
				contentstring += '<button class="button2" value="' + data[i].recipe + '">' + data[i].name + '</button>';
        		i = i + 1; 
	        }
	        contentstring += '</section>';

	        // update html
		    $("#cssmenu").html(contentstring);

		    // Event handler when the user clicks the goto button to make a meal
		    $("#goto").click(function(){

		    	// updates food-form-input, an invisible form to pass data
				$("#food-form-input").val($("#food-form-input").val().substring(0, $("#food-form-input").val().length-1));
				$("#food-form-input").val($("#food-form-input").val()+'}');

				//submits food-form content to constructmeal.php
				$("#food-form").submit();
			});

			// event handler for clicking button2, a food item button
			$(".button2").click(function(){

				// gets recipe information for the specific button the user clicked on
				var recipe = $(event.target).val();

				// makes API call using the given recipe
				var url = "http://api.cs50.net/food/3/recipes?key=ab4e3103a97e94112ed3f1eefad008cd&output=json&id="+recipe;
				var food='';

				// generates HTML to put the clicked food items into a form, which holds a list. Data attributes hold associated information
				$.getJSON(url, function (data){
					food = data[0].name;
					var temp = '<form action = "meal_calculate.php" method = "post>'
					temp += '<li data-select = "foods" data-name="' + food + '" data-recipe="'+recipe+'">'+ food + '</li>';
					// append temp string to existing HTML in foodlist element, an ol that stores the clicked foods
					var contentstring = $("#foodlist").html() + temp;
					$("#foodlist").html(contentstring);
					var food_item = {};
					food_item["name"] = food;
					food_item["recipe"] = recipe;
					var food_string = '"'+recipe+'":"'+food+'",';
					$("#food-form-input").val($("#food-form-input").val()+food_string);

					// adds food item to foodlist array inside meal_data object;
					meal_data.foodlist.push(food_item);
					count = count + 1;
				});
			});
		});
	});
});