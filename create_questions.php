<?php
require 'vendor/autoload.php'; // Include Composer's autoloader

// Manager Class
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

// Specify the database
$databaseName = 'medical_test';

// Define the collection name
$collectionName = 'questions';

// Data to insert
$data = [
    [
        'id' => '1',
        'question' => 'Do you have Abdominal pain?',
        'test_id' => '1',
    ],
    [
        'id' => '2',
        'question' => 'Are you suffering from Diarrhea, nausea and vomiting?',
        'test_id' => '2',
    ],
    [
        'id' => '3',
        'question' => 'Do you have High fever?',
        'test_id' => '1',
    ],
    [
        'id' => '4',
        'question' => 'Do you have a sensation of cold with shivering?',
        'test_id' => '1',
    ],
    [
        'id' => '5',
        'question' => 'Are you suffering from fever, headaches, and vomiting',
        'test_id' => '1',
    ],
    [
        'id' => '6',
        'question' => 'Do you have sweats, followed by a return to normal temperature, with tiredness?',
        'test_id' => '1',
    ],
    [
        'id' => '7',
        'question' => 'Do you have impaired consciousness?',
        'test_id' => '1',
    ],
    [
        'id' => '8',
        'question' => 'Do you have deep breathing and respiratory distress?',
        'test_id' => '1',
    ],
    [
        'id' => '9',
        'question' => 'Do you have Fatigue or tiredness, which can be extreme?',
        'test_id' => '2',
    ],
    [
        'id' => '10',
        'question' => 'Are you suffering from Runny or stuffy nose?',
        'test_id' => '2',
    ],
    [
        'id' => '11',
        'question' => 'Do you have Diarrhea and vomiting occasionally, but more commonly seen than with other strains of flu?',
        'test_id' => '2',
    ],
    [
        'id' => '12',
        'question' => 'Are you suffering from Fast breathing or difficulty breathing?',
        'test_id' => '2',
    ],
    [
        'id' => '13',
        'question' => 'Do you have Rash with a fever?',
        'test_id' => '2',
    ],
];

$bulk = new MongoDB\Driver\BulkWrite;

foreach ($data as $document) {
    $bulk->insert($document);
}

try {
    $manager->executeBulkWrite("$databaseName.$collectionName", $bulk);
    echo "Data added successfully!";
} catch (Exception $e) {
    echo "Error: Something went wrong, please contact the administrator.";
}
?>
