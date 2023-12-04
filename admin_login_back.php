<?php
session_start();
require 'vendor/autoload.php'; // Include Composer's autoloader

// Manager Class
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

// Specify the database
$databaseName = 'medical_test';


$user = $_POST['username'];
$pass = $_POST['password'];

$filter = ['username' => $user];
$options = [];
$query = new MongoDB\Driver\Query($filter, $options);

$cursor = $manager->executeQuery("$databaseName.admin", $query);

if ($cursor->isDead()) {
    // No results found in the query
    echo "<script>alert('Incorrect Username or Password');</script>";
    echo "<script>window.location.href='index.html';</script>";
} else {
    foreach ($cursor as $document) {
        // Assuming that 'password' is the field where the password hash is stored
        $passwordHash = $document->password;


         // verifyPassword($passwordHash, $pass)
        if(password_verify($pass,$passwordHash))
         {
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['user_type'] = "admin";
            echo "<script>window.location.href='admin_dashboard.php';</script>";
        } else {
            echo "<script>alert('Incorrect Username or Password');</script>";
            echo "<script>window.location.href='index.html';</script>";
        }
    }
}

?>
