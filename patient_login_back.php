<?php
session_start();

require 'vendor/autoload.php'; // Include Composer's autoloader

// Manager Class
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

// Specify the database
$databaseName = 'medical_test';

$user = $_POST['username'];
$pass = $_POST['password'];

// Define the collection name
$collectionName = 'patient';

// Find the user in the MongoDB collection
$filter = ['p_username' => $user];
$options = [];
$query = new MongoDB\Driver\Query($filter, $options);
$cursor = $manager->executeQuery("$databaseName.$collectionName", $query);

foreach ($cursor as $document) {
    $login = $document->p_password;

    if (password_verify($pass, $login)) {
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['user_type'] = "patient";

        echo "<script>window.location.href='patient_dashboard.php';</script>";

    } else {

    	echo "hi";
        echo "<script>alert('Incorrect Username or Password');</script>";
        echo "<script>window.location.href='index.html';</script>";
    }
}
?>
