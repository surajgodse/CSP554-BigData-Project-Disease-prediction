<?php

require 'vendor/autoload.php'; // Include Composer's autoloader

// Manager Class
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

// Specify the database
$databaseName = 'medical_test';
$collectionName = 'patient';

// Get the last used p_id or start with 1 if there are no documents
$lastIdFilter = [];
$lastIdQuery = new MongoDB\Driver\Query($lastIdFilter, ['sort' => ['p_id' => -1], 'limit' => 1]);
$lastIdCursor = $manager->executeQuery("$databaseName.$collectionName", $lastIdQuery);

$newPId = 1; // Default value if no documents are found

foreach ($lastIdCursor as $document) {
    $newPId = (int)$document->p_id + 1;
}

$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$address = $_REQUEST['address'];
$phone = $_REQUEST['phone'];
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];



require 'vendor/autoload.php'; // Include Composer's autoloader

// Manager Class
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

// Specify the database
$databaseName = 'medical_test';

// Define the collection name
$collectionName = 'patient';

// Username to check
$username = $_REQUEST['username'];

// Create a filter to find documents with the specified username
$filter = ['p_username' => $username];
$options = [];

// Create a query using the filter
$query = new MongoDB\Driver\Query($filter, $options);

// Execute the query
$cursor = $manager->executeQuery("$databaseName.$collectionName", $query);

// Check if any documents are found
if (iterator_count($cursor) > 0) {
    echo "<script>alert('Username Already exists'); window.location.href='student_registration.html';</script>";
    die();
}




$enpass = password_hash($password, PASSWORD_DEFAULT);

$document = [
    'p_id' => $newPId,
    'p_name' => $name,
    'p_email' => $email,
    'p_phone' => $phone,
    'p_password' => $enpass,
    'p_address' => $address,
    'p_username' => $username,
];

$bulk = new MongoDB\Driver\BulkWrite;
$bulk->insert($document);

try {
    $manager->executeBulkWrite("$databaseName.$collectionName", $bulk);
    echo "<script>
        alert('Done successfully');
        window.location.href='index.html';
    </script>";
    die();
} catch (Exception $e) {
    echo "<script>
        alert('Something went wrong, contact administrator');
        window.location.href='index.html';
    </script>";
    die();
}

?>