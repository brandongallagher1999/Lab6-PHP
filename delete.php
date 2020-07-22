<?php

    require_once('connect.php'); 
    $ok = true;
    if (empty($email) || $email === false) {
        echo "<p class='error'>Please include your email in the proper format!</p>";
        $ok = false;
    }

    if ($ok === true)
    {
        try
        {
            $sql = "DELETE FROM persons WHERE email = :email"; 

            $statement = $db->prepare($sql);
            $statement->bindParam(':email', $email);
        
        
            $statement->execute(); 
        
            echo "<p> Record deleted! </p>";
        
            $statement->close();
        }
        catch (PDOException $e)
        {
            echo "<p> No record to delete or there was an internal error! </p>";
        }
        
    }

   

?>