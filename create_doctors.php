<?php

require 'vendor/autoload.php'; // Include Composer's autoloader

// Manager Class
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

// Specify the database and collection names
$databaseName = 'medical_test';
$collectionName = 'doctors';

// Data to insert
$data = [
    ["dr_id" => 1, "name" => "Dr. Sameer Rane", "Education" => "MBBS", "Speciality" => "Child specialist", "test_id" => 1, "address" => "133, 1st Floor, MIRC Building, Bombay Hospital, Near Metro Cinema, Marine Drive, Mumbai, Maharashtra 400020", "contact" => "213123"],
    ["dr_id" => 2, "name" => "Dr. Ajit Krishna Shetty", "Education" => "MBBS, MD - Medicine", "Speciality" => "General Physician", "test_id" => 1, "address" => "179/180, Road Number 2, Kamal Charan Building, Jawahar Nagar, Landmark: Near Vijaya Bank, Mumbai", "contact" => "12312345234"],
    ["dr_id" => 3, "name" => "Dr. Laxman G. Jonwal", "Education" => "MD - Medicine, BAMS", "Speciality" => "Consultant Physician, Ayurveda", "test_id" => 1, "address" => "Plot Number 30/221, Matoshree Bungalow, Charkop Sector 6, Landmark: Behind Ambe Mata Mandir & Near Chickuwadi Mhada Colony Bridge, Mumbai", "contact" => "9876767865"],
    ["dr_id" => 4, "name" => "Dr. B.R. Ramesh Rao", "Education" => "MBBS, MD - General Medicine, DNB - Nephrology", "Speciality" => "Nephrologist/Renal Specialist, General Physician", "test_id" => 1, "address" => "20, Nitya Priya Society, Landmark: Next To Sanjeevani Hospital, Near Andheri Station East, Mumbai", "contact" => "976567879656"],
    ["dr_id" => 5, "name" => "Dr. Yatin Gadgil", "Education" => "MBBS, MD - General Medicine", "Speciality" => "General Physician, Internal Medicine", "test_id" => 2, "address" => "3, new shreenath building, next to darshan sanitaryware, opp shobha hotel, L J road, mahim west, mumbai 16, Landmark: opp shobha hotel, Mumbai", "contact" => "8657456745"],
    ["dr_id" => 6, "name" => "Dr. Vilas Kulkarni", "Education" => "MD - Pediatrics, MBBS", "Speciality" => "Pediatrician", "test_id" => 2, "address" => "11/12/13/14, Link Garden Society, Tower Number 2, Landmark: Near Indra Darshan and Yamuna Nagar, Mumbai", "contact" => "967865775"]
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
