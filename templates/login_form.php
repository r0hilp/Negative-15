<!--
* login_form.php
* Form that users use to login
* Negative 15  
-->

<form action="login.php" method="post">
    <!--<fieldset>-->
    <div class = "box">
        <h1>Login</h1>
        <input autofocus class="form-control" name="username" placeholder="Username" type="text"/>
        <input class="form-control" name="password" placeholder="Password" type="password"/>
        <button type="submit" class="btn btn-default">Log In</button>
        <p>Not a member? <span><a href = "register.php"> Sign Up</a></span></p>
    </div>
</form>
