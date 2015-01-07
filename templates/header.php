<!DOCTYPE html>
<!--
* header.php
* Header of the HTML
* Almost the same as PSET7, added sidebar under <nav>
* Negative 15
-->
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="/css/styles.css" rel="stylesheet"/>
        <link href="css/simple-sidebar.css" rel="stylesheet">

        
        <?php if (isset($title)): ?>
            <title>Negative 15: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <a href="index.php"><title> Negative 15</title></a>
        <?php endif ?>
        <script src="/js/jquery-1.11.1.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
    </head>

<body>
    <div class="container">
            <div id="top">
                <!--
                    <a href="/"><img alt="Negative 15" src="/img/logo.png"/></a>
                -->
                <a href = "index.php"> <div id = "title"> NEGATIVE 15 </div></a>

                <nav>
                  <ul>
                    <li><a href="index.php">Home</a></li><li></li>
                    <li><a href="make.php">Make a Meal</a></li><li></li>
                    <li><a href="menu.php">Today's Menu</a></li><li></li>
                    <li><a href="history.php">Meal History</a></li><li></li>
                    <li><a href="instructions.php">Instructions</a></li><li></li>
                    <li><a href="logout.php">Log Out</a></li><li></li>
                  </ul>
                </nav>
                </div>
            </div>
        <div class = "smcontainer">
            <div id="middle">
                <!---->