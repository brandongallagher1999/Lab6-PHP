

<?php
    require_once("session.php");
    require_once('connect.php'); // $db


    $username = filter_input(INPUT_POST, "username");
    $password = filter_input(INPUT_POST, "password");

    $sql = "SELECT * FROM persons_new WHERE username = :username AND password = :password";
    $statement = $db->prepare($sql);

    $temp = password_hash($password, PASSWORD_DEFAULT);
    
    $statement->bindParam(":username", $username);
    $statement->bindParam(":password", $temp);

    $statement->execute();

    if ($statement->rowCount() == 0)
    {
        echo "<p> User doesn't exist! </p>";
    }
    else
    {
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;
        header("Location: login.php");

    }

?>