<?php
require_once 'dbcon.php';

// Get a reference to the Database object
$db = new Database();

// Prepare and execute the SQL query
try {
    $sqlquery = $db->getPdo()->prepare("SELECT * FROM student_details ORDER BY student_id ASC");
    $sqlquery->execute();
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
</head>
<a href="../index.html">Home</a>
<body>
    <p>Registration was a success!</p>
    <br>
    <h1>Below are people in your class</h1>

    <table>
        <thead>
            <tr>  
                <th>#</th>
                <th>Student name</th>
                <th>Student email</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $sqlquery->fetch(PDO::FETCH_ASSOC)) {
                echo '<tr>
                    <td>' . $row['student_id'] . '</td>
                    <td>' . $row['student_name'] . '</td>
                    <td>' . $row['student_email'] . '</td>
                    </tr>';
            }
            ?>
        </tbody>
    </table>
</body>
</html>
