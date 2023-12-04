<?php

    session_start();



    if(isset($_SESSION['username']))
     {
		if($_SESSION['user_type'] == "admin")
		{
			$username=$_SESSION['username'];    
			
		} else
         {
             echo "<script>
                alert('please login ');
                window.location.href='index.html';              
                </script>";
                die();
         }

		   
     } 
     else
         {
             echo "<script>
                alert('please login ');
                window.location.href='index.html';              
                </script>";
                die();
         }

?>
<?php
require 'vendor/autoload.php'; // Include Composer's autoloader

// Manager Class
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

// Specify the database and collection names
$databaseName = 'medical_test';
$collectionName = 'doctors';

// Data to insert
$name = $_REQUEST['name'];
$education = $_REQUEST['education'];
$speciality = $_REQUEST['speciality'];
$test_id = (int)$_REQUEST['test_id']; // Cast to integer
$address = $_REQUEST['address'];
$contact = $_REQUEST['contact'];

// Define the filter to get the last document
$lastIdFilter = [];
$lastIdQuery = new MongoDB\Driver\Query($lastIdFilter, ['sort' => ['dr_id' => -1], 'limit' => 1]);
$lastIdCursor = $manager->executeQuery("$databaseName.$collectionName", $lastIdQuery);

$newDrId = 1; // Default value if no documents are found

foreach ($lastIdCursor as $document) {
    $newDrId = (int)$document->dr_id + 1; // Cast to integer
}

// Create the document to insert
$document = [
    'dr_id' => $newDrId,
    'name' => $name,
    'Education' => $education,
    'Speciality' => $speciality,
    'test_id' => $test_id,
    'address' => $address,
    'contact' => $contact,
];

$bulk = new MongoDB\Driver\BulkWrite;
$bulk->insert($document);

try {
    $manager->executeBulkWrite("$databaseName.$collectionName", $bulk);
    echo "<script>alert('Data added')</script>";
    echo '<script>window.location.href = "admin_dashboard.php";</script>';
} catch (Exception $e) {
    echo "<script>alert('Something went wrong, contact administrator'); window.location.href='admin_dashboard.php';</script>";
}

?>
