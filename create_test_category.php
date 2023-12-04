<?php
require 'vendor/autoload.php'; // Include Composer's autoloader

// Manager Class
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

// Specify the database
$databaseName = 'medical_test';

// Data to insert
$dataToInsert = [
    ['test_id' => '1', 'test_name' => 'Maleria', 'questions_added' => '1', 'remedy_added' => '1', 'test_description' => 'Testing test Description for Maleria'],
    ['test_id' => '2', 'test_name' => 'H1N1', 'questions_added' => '1', 'remedy_added' => '1', 'test_description' => 'Testing test Description for H1N1'],
    ['test_id' => '3', 'test_name' => 'Typhoid', 'questions_added' => '0', 'remedy_added' => '0', 'test_description' => 'Typhoid is caused by Salmonella typhi, a bacterium from the same genus that causes salmonella.'],
    ['test_id' => '4', 'test_name' => 'Jaundice', 'questions_added' => '0', 'remedy_added' => '0', 'test_description' => 'Jaundice is a condition in which the skin, whites of the eyes and mucous membranes turn yellow because of a high level of bilirubin, a yellow-orange bile pigment.']
];

$bulk = new MongoDB\Driver\BulkWrite;

foreach ($dataToInsert as $document) {
    $bulk->insert($document);
}

try {
    $manager->executeBulkWrite("$databaseName.test_category", $bulk);
    echo "Data inserted successfully.\n";
} catch (Exception $e) {
    echo "Failed to insert the data: " . $e->getMessage() . "\n";
}
?>
