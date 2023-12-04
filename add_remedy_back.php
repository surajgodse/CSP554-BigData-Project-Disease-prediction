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
$collectionName = 'first_aid';

// Data to insert
$description = $_REQUEST['description'];
$test_id = $_REQUEST['test_id'];

// Get the next auto-incremented ID
$lastIdFilter = [];
$lastIdQuery = new MongoDB\Driver\Query($lastIdFilter, ['sort' => ['id' => -1], 'limit' => 1]);
$lastIdCursor = $manager->executeQuery("$databaseName.$collectionName", $lastIdQuery);

$newTestId = 1; // Default value if no documents are found

foreach ($lastIdCursor as $document) {
    $newTestId = $document->id + 1;
}

// Insert the data
$document = [
    'id' => $newTestId,
    'description' => $description,
    'test_id' => $test_id,
];

$bulk = new MongoDB\Driver\BulkWrite;
$bulk->insert($document);

try {
    $manager->executeBulkWrite("$databaseName.$collectionName", $bulk);

    // Update the 'remedy_added' count in the test_category collection
    $testCategoryCollection = 'test_category';
    $testCategoryFilter = ['test_id' => $test_id];
    $testCategoryUpdate = ['$set' => ['remedy_added' => 1]];
    $testCategoryOptions = ['multi' => false];

    $testCategoryBulk = new MongoDB\Driver\BulkWrite;
    $testCategoryBulk->update($testCategoryFilter, $testCategoryUpdate, $testCategoryOptions);

    $manager->executeBulkWrite("$databaseName.$testCategoryCollection", $testCategoryBulk);

    echo "<script>alert('Data added')</script>";
    echo '<script>window.location.href = "admin_dashboard.php";</script>';
} catch (Exception $e) {
    echo "<script>alert('Something went wrong, contact administrator'); window.location.href='admin_dashboard.php';</script>";
}
?>


    
    
            
 ?>