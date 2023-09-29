<?php
require_once('dbcon.php');
require_once('studentRegistration.php');

try {
    $db = new Database();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $studentRegistration = new studentRegistration($db);

        $name = $_POST['name'];
        $email = $_POST['email'];

        // Register the student
        $studentRegistration->registerStudent($name, $email);

        // Redirect to a success page and view registered
        header("Location: success.php");
    }
} catch (PDOException $e) {
    die("Database Error: " . $e->getMessage());
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
?>
