<!--
* register.php
* Form that users use to register as a new user (same as PSET7)
* Negative 15  
-->

<div class = "box">  
    <h3>Register User</h3>
    <form action="register.php" method="post">
        <input autofocus class="form-control" name="username" placeholder="Username" type="text"/>
        <input class="form-control" name="password" placeholder="Password" type="password"/>
        <input class="form-control" name="confirmation" placeholder="Confirm Password" type="password"/>
        <button type="submit" class="btn btn-default">Register</button>
    </form>
    <div>
        or <a href="login.php">log in</a>
    </div>
</div>
