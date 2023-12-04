<?php

    session_start();



    if(isset($_SESSION['username']))
    {
		if($_SESSION['user_type'] == "patient")
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

// Specify the database
$databaseName = 'medical_test';

// Define the collection name
$collectionName = 'feedback';

// Data to insert
$test_id = $_REQUEST['test_id'];
$doctor_name = $_REQUEST['doctor_name'];
$feedback = $_REQUEST['feedback'];
$given_by = $_REQUEST['given_by'];

// Create a document to insert into the collection
$document = [
    'doctor' => $doctor_name,
    'test' => $test_id,
    'feedback' => $feedback,
    'given_by' => $given_by,
];

// Create a BulkWrite instance and insert the document
$bulk = new MongoDB\Driver\BulkWrite;
$bulk->insert($document);

try {
    // Execute the BulkWrite operation
    $manager->executeBulkWrite("$databaseName.$collectionName", $bulk);

    // Redirect on success
    $test = "patient_dashboard.php";
    echo "<script>alert('Done successfully'); window.location.href='$test';</script>";
    die();
} catch (Exception $e) {
    // Handle errors
    echo "<script>alert('Something went wrong, contact administrator'); window.location.href='admin_dashboard.php';</script>";
    die();
}

?>
