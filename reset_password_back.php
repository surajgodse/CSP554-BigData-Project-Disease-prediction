<?php


$username =  $_REQUEST['username'];
$user_type =  $_REQUEST['user_type'];
$password1 =  $_REQUEST['password1'];
$password2 =  $_REQUEST['password2'];


if ($password1 != $password2) {
    echo "<script>
        window.location.href='javascript:history.go(-1)';
        alert('Password did not match');
    </script>";
    die();
} else {
    $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    $databaseName = 'medical_test';

    if ($user_type == 2) {
        $enpass = password_hash($password1, PASSWORD_DEFAULT);
        $filter = ['p_username' => $username];
        $update = ['$set' => ['p_password' => $enpass]];
        $options = ['upsert' => false];
        $bulk = new MongoDB\Driver\BulkWrite;
        $bulk->update($filter, $update, $options);
        $manager->executeBulkWrite("$databaseName.patient", $bulk);
    }

    if ($user_type == 1) {
        $enpass = password_hash($password1, PASSWORD_DEFAULT);
        $filter = ['username' => $username];
        $update = ['$set' => ['password' => $enpass]];
        $options = ['upsert' => false];
        $bulk = new MongoDB\Driver\BulkWrite;
        $bulk->update($filter, $update, $options);
        $manager->executeBulkWrite("$databaseName.admin", $bulk);
    }

    echo "<script>
        alert('Password updated successfully');
        window.location.href='index.html';
    </script>";
    die();
}
?>
