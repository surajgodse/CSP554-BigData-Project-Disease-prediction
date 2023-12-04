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

// Specify the database
$databaseName = 'medical_test';

// Define the collection name
$collectionName = 'test_category';

// Data to insert
$name = $_REQUEST['name'];
$description = $_REQUEST['description'];

$lastIdFilter = [];
$lastIdQuery = new MongoDB\Driver\Query($lastIdFilter, ['sort' => ['test_id' => -1], 'limit' => 1]);
$lastIdCursor = $manager->executeQuery("$databaseName.$collectionName", $lastIdQuery);

$newTestId = 1; // Default value if no documents are found

foreach ($lastIdCursor as $document) {
    $newTestId = strval($document->test_id + 1); // Cast to string
}

$document = [
    'test_id' => $newTestId,
    'test_name' => $name,
    'questions_added' => 0, // Changed to integer
    'remedy_added' => 0, // Changed to integer
    'test_description' => $description,
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
