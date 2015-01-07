<!--
* apology.php
* Renders HTML form that apologizes 
* Almost the same as PSET7, with added divs
* -Negative 15
-->

<div class = "box">
	<p>
	    Sorry!
	</p>
	<p>
	    <?= htmlspecialchars($message) ?>
	</p>
	<a href="javascript:history.go(-1);"><button>Back</button></a>
</div>