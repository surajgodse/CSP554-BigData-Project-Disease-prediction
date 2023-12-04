<?php

$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$databaseName = 'medical_test';
$collectionName = 'questions';

// Update documents to store 'id' as a numeric data type (integer)
$bulk = new MongoDB\Driver\BulkWrite;
$updateOptions = ['multi' => false];

// Define a filter to select documents where 'id' is a string
$numericIdFilter = ['id' => ['$type' => 'string']];
$cursor = $manager->executeQuery("$databaseName.$collectionName", new MongoDB\Driver\Query($numericIdFilter));

foreach ($cursor as $document) {
    $newId = (int)$document->id; // Convert 'id' to an integer
    $bulk->update(['_id' => $document->_id], ['$set' => ['id' => $newId]], $updateOptions);
}

// Execute the bulk write operation
$manager->executeBulkWrite("$databaseName.$collectionName", $bulk);

echo "Updated 'id' fields to store numeric values.";



?>