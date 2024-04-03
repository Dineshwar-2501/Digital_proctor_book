<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "moon";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data into the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $table_name = $_POST['table_name'];
    $test1_mark = $_POST["test1"];
    $test1_attendance = $_POST["att1"];
    $test2_mark = $_POST["test2"];
    $test2_attendance = $_POST["att2"];
    $internal_marks = $_POST["internal_marks"];
    $university_exam_results = $_POST["university_exam_results"];

    $sql = "INSERT INTO $table_name( test1_mark, test1_attend, test2_mark, test2_attend, internal_marks, university_exam_results)
    VALUES ('$test1_mark', '$test1_attendance', '$test2_mark', '$test2_attendance', '$internal_marks', '$university_exam_results')";
    $result=$conn->query($sql);
    if( $result== TRUE) {
        header("Location: sample1.php?table_name=$table_name");
        exit();
    }
     else
      {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
