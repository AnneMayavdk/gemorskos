<?php

$dbHandler = null; //Create an empty variable that will contain the handler

$host = "mysql";
$dbname = "gemorskos";
$user = "root";
$pass = "qwerty";

try
{
    $dbHandler = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass); //Connect to the database with the provided connectstring
} 
catch(Exception $ex)
{ //If something goes wrong, catch the error and print it
    echo($ex);
}

if($_SERVER['REQUEST_METHOD'] === "POST")
{
    $name = filter_input(INPUT_POST, 'name');
    $password = filter_input(INPUT_POST, 'password');

    if($dbHandler)
        try{
            $stmt = $dbHandler->prepare("SELECT password FROM user WHERE NAME = :name");
            $stmt->bindParam('name', $name, PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() > 0) 
            {
                $stmt->bindColumn("password", $dbpassword);
            }
            else 
            {
                echo "Geen gebruiker gevonden.";
            }
            $stmt->closeCursor();
        } 
        catch (Exception $ex) 
        {
            echo $ex;
        }

    
    if($password === $dbpassword)
    {
        session_start();
        $_SESSION["user"] = $name;
        header("Location: welkom.php");
    }
} 

?>