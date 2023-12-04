<?php
require 'vendor/autoload.php'; // Include Composer's autoloader

// Manager Class
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

// Specify the database and collection names
$databaseName = 'medical_test';
$collectionName = 'patient';

// Data to insert (change this for each record)
$patientData1 = [
    'p_id' => 37,
    'p_name' => 'dipak',
    'p_email' => 'p1@gmail.com',
    'p_phone' => '21321321321321',
    'p_password' => '$2y$10$Um242H4GJQ2hap7OH2bNjOv2/2ADES6xqKZhJFP12BVa2tpyuAeRu',
    'p_address' => 'dewqrweqr',
    'p_username' => 'dipak',
];

$patientData2 = [
    'p_id' => 38,
    'p_name' => 'Dipak',
    'p_email' => 'test_patient@gmail.com',
    'p_phone' => '982191231',
    'p_password' => '$2y$10$FdB5kVlKMrOtl/8KANEM2.0Uezjg1QjonxwxwXeBkrrrJyOiwoiwG',
    'p_address' => 'test_patient@gmail.com',
    'p_username' => 'patient1',
];

$bulk = new MongoDB\Driver\BulkWrite;

// Insert the first patient data
$bulk->insert($patientData1);

// Insert the second patient data
$bulk->insert($patientData2);

try {
    $manager->executeBulkWrite("$databaseName.$collectionName", $bulk);
    echo "<script>alert('Data added successfully');</script>";
    // You can redirect to a success page here
} catch (Exception $e) {
    echo "<script>alert('Something went wrong, please contact the administrator.');</script>";
    // You can redirect to an error page here
}
?>
