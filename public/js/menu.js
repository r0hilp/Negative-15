/**
 * CS50 final project
 * 
 * Negative 15 
 * menu.js
 *
 * Eric Li, Rohil Prasad, Steven Ban
 *
 * Generates HTML for a CSS dropdown menu with the meal's food items
 */

// script is run as part of menu.php, controller for menu_form.php

// runs script when document is loaded
$( document ).ready(function() {
	// event handler for when the go button is clicked
	$("#go").on('click', function(){
		// makes API call using the meal time
		var url = "http://api.cs50.net/food/3/menus?key=ab4e3103a97e94112ed3f1eefad008cd&output=json&meal="+$("#mealtime option:selected").val();
		$.getJSON(url, function (data){
			// initializes a string to hold the generated html
			var contentstring='';
			// keeps track of the food category as we iterate through the returned JSON
	        var category = data[0].category;
	        // counter for div id
	        var count = 1;
	        // first section of html
	        contentstring += '<article class = "accordion">';
	        contentstring += '<section id="acc1"><h2><a href = "#acc1">' + category + '</a></h2>'
	        var i = 0; 
	        while (i < data.length) {
	        	// ends a section and starts a new one if the category of the next food item is different
	        	if(data[i].category != category) 
	        	{
	        		contentstring += '</section>';
	        		count = count + 1;
	        		counter = count.toString();
	        		category = data[i].category;
	        		contentstring += '<section id="acc' + counter + '">';
	        		contentstring += '<h2>' + '<a href="#acc'+counter+'">'+category + '</a>' + '</h2>';
	        	} 
	        	// adds the food element to the section
				contentstring += '<p>' + data[i].name + '</p>';
        		i = i + 1; 
	        }
	        contentstring += '</section>';
	        // updates html
		    $("#cssmenu").html(contentstring);
		});
	});
});