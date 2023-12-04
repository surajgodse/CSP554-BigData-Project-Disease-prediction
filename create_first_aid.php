<?php

require 'vendor/autoload.php'; // Include Composer's autoloader

// Manager Class
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

// Specify the database and collection names
$databaseName = 'medical_test';
$collectionName = 'first_aid';

// Data to insert
$data = [
    ["id" => "1", "description" => "Clear any sources of stagnating water, indoors and outdoors, as they can act as mosquito breeding grounds. Since mosquitoes are night feeders, stay away from danger zones – particularly fields, forests and swamps – from dusk to dawn to avoid being bitten. Wear pants and long-sleeved clothing that are light-colored and comfortable as mosquitoes can bite through tight synthetic clothing and are attracted to dark colors.", "test_id" => "1"],
    ["id" => "2", "description" => "The World Health Organization (WHO) recommends artemisinin-based combination therapy (ACT) to treat uncomplicated malaria.", "test_id" => "1"],
    ["id" => "3", "description" => "There are a number of options that travelers can take to prevent malaria, including antimalarial medication, using anti-mosquito sprays or lotions, and sleeping under a permethrin-treated bed net.", "test_id" => "1"],
    ["id" => "4", "description" => "Drink plenty of liquids. Choose water, juice, and warm soups to prevent dehydration.", "test_id" => "1"],
    ["id" => "5", "description" => "Rest. Get more sleep to help your immune system fight infection.", "test_id" => "2"],
    ["id" => "6", "description" => "Consider pain relievers. Use an over-the-counter pain reliever, such as acetaminophen (Tylenol, others) or ibuprofen (Advil, Motrin IB, others), cautiously. Also, use caution when giving aspirin to children or teenagers.", "test_id" => "2"],
];

$bulk = new MongoDB\Driver\BulkWrite;

foreach ($data as $item) {
    $bulk->insert($item);
}

try {
    $manager->executeBulkWrite("$databaseName.$collectionName", $bulk);
    echo "Data inserted successfully.";
} catch (Exception $e) {
    echo "Error: Something went wrong, please contact the administrator.";
}

?>
