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
		 
		 $test_id = $_REQUEST['test_id'];

?>

<?php

require 'vendor/autoload.php'; // Include Composer's autoloader

// Manager Class
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
// Specify the database
$databaseName = 'medical_test';

// Define the collection name
$collectionName = 'questions';

$filter = ['test_id' => $test_id];
$options = [];
$query = new MongoDB\Driver\Query($filter, $options);

$cursor = $manager->executeQuery("$databaseName.$collectionName", $query);

$count = 0;
$yes_count = 0;
$no_count = 0;

foreach ($cursor as $document) {
    $question = $document->question;
    $count = $count + 1;

    $answer = $_REQUEST[$count];

    if ($answer == "yes") {
        $yes_count++;
    }

    if ($answer == "No") {
        $no_count++;
    }
}

$test_result = $yes_count / $count;

if ($test_result > 0.6) {
    $test = "positive.php?test_id=" . $test_id;
    echo "<script>
            alert('Test Result is Positive');
            window.location.href='$test';
            </script>";
    die();
} else {
    $test = "patient_dashboard.php";
    echo "<script>
            alert('Test Result is Negative');
            window.location.href='$test';
            </script>";
    die();
}
?>
