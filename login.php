<!DOCTYPE html>

<html>

    <head>
        <title> Login Page </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    </head>

    <body>
    <?php
        require_once("session.php");
        if (isset($_SESSION["username"]) and isset($_SESSION["password"]))
        {
            echo "<p> Logged In! </p>";
        }
        else
        {
            echo "<form action='process_login.php' method='post'>";
            echo    "<label for='username'>Username</label>";
            echo    "<input type='text' name='username' class='form-control' id='username'>";
            echo    "<label for='password'>Password</label>";
            echo    "<input type='password' name='password' class='form-control' id='password'>";
            echo    "<input type='submit' name='submit' value='Login' class='btn btn-primary'>";
            echo "</form>";
        }

    ?>
    </body>
</html>