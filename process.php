
<!DOCTYPE html>
<html lang="en"> 
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>COMP1006 - Week 4 - Let's Connect </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Piedra&family=Quicksand&display=swap" rel="stylesheet">
    <!-- Compiled and minified JavaScript -->
    <link href="main.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
    <header>
      <h1> TuneShare - Share Your Fave Tunes & Join The Community </h1>
    </header>
    <main>
        <?php

//create variables to store form data
$first_name = filter_input(INPUT_POST, 'fname');
$last_name = filter_input(INPUT_POST, 'lname');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$username = filter_input(INPUT_POST, "username");
$password = filter_input(INPUT_POST, "password");

//set up a flag variable

$ok = true;


//validate
// first name and last name not empty

if (empty($first_name) || empty($last_name)) {
    echo "<p class='error'>Please provide both first and last name! </p>";
    $ok = false;
}

//email not empty and proper format
if (empty($email) || $email === false) {
    echo "<p class='error'>Please include your email in the proper format!</p>";
    $ok = false;
}


//if form validates, try to connect to database and add info

if ($ok === true) {
    try {
      
        // add a comment to explain the line of code below
        require_once('connect.php'); // if the file's not included, include it again. in this case, it's the database object.

        // add a comment to explain the line of code below
        $sql = "INSERT INTO persons_new VALUES (2, :username, :password, :firstname, :lastname, :email)"; // INSERT statement into table persons. you will need to change the 1st parameter depending on if you've already inserted before.
        // add a comment to explain the line of code below
        $statement = $db->prepare($sql); // fill in the correct method
        // add a comment to explain the line of code below

        $temp = password_hash($password, PASSWORD_DEFAULT);

        $statement->bindParam(":username", $username);
        $statement->bindParam(":password", $temp);
        $statement->bindParam(':firstname', $first_name);
        $statement->bindParam(':lastname', $last_name);  // binds all the variables in the sql statement to our HTML input values
        $statement->bindParam(':email', $email);
      
        // add a comment to explain the line of code below
        $statement->execute(); // Exectutes the SQL statement to the PDO object (sql database)

        // show message
        echo "<p> Song added! Thanks for sharing! </p>";

        // add a comment to explain the line of code below
        $statement->closeCursor(); // fill in the correct method


    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        //show error message to user
        echo "<p> Sorry! We weren't able to process your submission at this time. We've alerted our admins and will let you know when things are fixed! </p> ";
        echo $error_message;
        //email app admin with error
        mail('brandonegallagher@gmail.com', 'App Error ', 'Error :'. $error_message);
    }
}
?>
    <a href="index.php" class="error-btn"> Back to Form </a>
    </main>
    <footer>
      <p> &copy; 2020 Lab Five </p>
    </footer>
   </div><!--end container-->
  </body>
</html>