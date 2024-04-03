<?php

// Step 1: Connect to the database
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "moon";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Handle form submission and update data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Loop through the submitted data arrays
    $table_name = $_POST['table_name'];
    foreach ($_POST['test1_mark'] as $index => $test1_mark) {
        $test1_mark = $_POST['test1_mark'][$index];
        $test1_attend = $_POST['test1_attend'][$index];
        $test2_mark = $_POST['test2_mark'][$index];
        $test2_attend = $_POST['test2_attend'][$index];
        $internal_marks = $_POST['internal_marks'][$index];
        $university_exam_results = $_POST['university_exam_results'][$index];
        
        // Prepare SQL statement to update each row
        $sql = "UPDATE jagadeesh SET test1_mark='$test1_mark', test1_attend='$test1_attend', test2_mark='$test2_mark', test2_attend='$test2_attend', internal_marks='$internal_marks', university_exam_results='$university_exam_results' WHERE id='$index'";
        
        // Execute SQL statement
        if ($conn->query($sql) !== TRUE) {
            echo "Error updating record: " . $conn->error;
        }
    }
    
    echo "Records updated successfully";
}

// Step 3: Close the database connection
$conn->close();
?>