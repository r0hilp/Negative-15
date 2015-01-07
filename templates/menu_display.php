<!--
* menu_display.php
* Displays the menu for chosen meal 
* Negative 15  
-->

<script type="text/javascript">
$.getJSON("http://api.cs50.net/food/3/menus?key=ab4e3103a97e94112ed3f1eefad008cd&output=json&meal=")+("#mealtime option:selected").val();, function (data){
    contentstring = '<div id="content">table style="width:100%"><tr>';

    // output menu as a table
    var temp[];

    // make a table header of the categories
    for(var i = 0; i < data.length; i++)
   	{
   		var data[]; 
   		if (temp != data[i].category)
   		{
   			contentstring += '<td>' + data[i].category + '</td>';
   		}
   		temp = data[i].category;
   		temp.push(data);
   	}
   	contentstring += '</tr>';
    contentstring += '</table></div>';
    print contentstring;
});
</script>
