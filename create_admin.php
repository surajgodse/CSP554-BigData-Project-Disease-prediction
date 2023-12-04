<?php
require 'vendor/autoload.php'; // Include Composer's autoloader

// Manager Class
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

// Specify the database
$databaseName = 'medical_test';

// Data to insert
$dataToInsert = [
    'admin_id' => '1',
    'name' => 'admin',
    'username' => 'admin',
    'password' => '$2y$10$kWYCFlZtq4Ois/OyYN17IeRaGXk4K.HuRapXASdxoOEFLc5Vb9H2.',
    'email_id' => 'admin@gmail.com',
    'phone' => '',
];

// Specify the collection
$collection = 'admin';

// Insert the data
$bulk = new MongoDB\Driver\BulkWrite;
$bulk->insert($dataToInsert);

try {
    $manager->executeBulkWrite("$databaseName.$collection", $bulk);
    echo "Document added successfully with admin_id: " . $dataToInsert['admin_id'] . "\n";
} catch (Exception $e) {
    echo "Failed to insert the document: " . $e->getMessage() . "\n";
}
?>
