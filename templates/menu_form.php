<!--
* menu_form.php
* Form where users choose which menu for which meal to display
* Negative 15  
-->

<script src="/js/jquery-1.11.1.min.js"></script>
<script src="/js/menu.js"></script>

<div class = "box">
    <div class = "styled-select">
        <div class="form-group">
        <div class="smallvspace"></div>

            Meal Time: <label><select id="mealtime" class="form-control" name="meal_time">
                <option value="BREAKFAST">Breakfast</option>
                <option value="LUNCH">Lunch</option>
                <option value="DINNER">Dinner</option>
                <option value="BRUNCH">Brunch</option>
                </select></label>
        </div>
    </div>
    <div class="form-group">
        <button id = "go" class = "myButton">Go!</button>
    </div>
    <div class="vspace"></div>
    <div id = "cssmenu"></div>
</div>