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

// Function to sanitize input data
function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Insert data into the database
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'insert') {
    $test1_mark = sanitize_input($_POST["test1_mark"]);
    $test1_attend = sanitize_input($_POST["test1_attend"]);
    $test2_mark = sanitize_input($_POST["test2_mark"]);
    $test2_attend = sanitize_input($_POST["test2_attend"]);
    $internal_marks = sanitize_input($_POST["internal_marks"]);
    $university_exam_results = sanitize_input($_POST["university_exam_results"]);

    // Insert query
    $sql = "INSERT INTO sem1_results (test1_mark, test1_attend, test2_mark, test2_attend, internal_marks, university_exam_results) 
            VALUES ('$test1_mark', '$test1_attend', '$test2_mark', '$test2_attend', '$internal_marks', '$university_exam_results')";

    if ($conn->query($sql) === TRUE) {
        echo "New record inserted successfully";
    } else {
        echo "Error inserting record: " . $conn->error;
    }
}

// Fetch data for editing
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['edit_id'])) {
    $edit_id = $_GET['edit_id'];

    // Fetch data from the database based on the edit_id
    $sql = "SELECT * FROM sem1_results WHERE id = $edit_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Extract data from the row
        $test1_mark = $row["test1_mark"];
        $test1_attend = $row["test1_attend"];
        $test2_mark = $row["test2_mark"];
        $test2_attend = $row["test2_attend"];
        $internal_marks = $row["internal_marks"];
        $university_exam_results = $row["university_exam_results"];
    } else {
        echo "No record found";
        exit();
    }
}

// Update data in the database
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'update') {
    $edit_id = $_POST['edit_id'];
    $test1_mark = sanitize_input($_POST["test1_mark"]);
    $test1_attend = sanitize_input($_POST["test1_attend"]);
    $test2_mark = sanitize_input($_POST["test2_mark"]);
    $test2_attend = sanitize_input($_POST["test2_attend"]);
    $internal_marks = sanitize_input($_POST["internal_marks"]);
    $university_exam_results = sanitize_input($_POST["university_exam_results"]);

    // Update query
    $sql = "UPDATE sem1_results SET test1_mark='$test1_mark', test1_attend='$test1_attend', 
            test2_mark='$test2_mark', test2_attendance='$test2_attend', internal_marks='$internal_marks', 
            university_exam_results='$university_exam_results' WHERE id=$edit_id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

<!-- HTML form to display data for editing or inserting -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <input type="hidden" name="action" value="<?php echo isset($edit_id) ? 'update' : 'insert'; ?>">
    <?php if(isset($edit_id)) : ?>
        <input type="hidden" name="edit_id" value="<?php echo $edit_id; ?>">
    <?php endif; ?>
    Test 1 Mark: <input type="text" name="test1" value="<?php echo isset($test1_mark) ? $test1_mark : ''; ?>"><br>
    Test 1 Attendance: <input type="text" name="att1" value="<?php echo isset($test1_attend) ? $test1_attendance : ''; ?>"><br>
    Test 2 Mark: <input type="text" name="test2" value="<?php echo isset($test2_mark) ? $test2_mark : ''; ?>"><br>
    Test 2 Attendance: <input type="text" name="att2" value="<?php echo isset($test2_attend) ? $test2_attendance : ''; ?>"><br>
    Internal Marks: <input type="text" name="internal_marks" value="<?php echo isset($internal_marks) ? $internal_marks : ''; ?>"><br>
    University Exam Results: <input type="text" name="university_exam_results" value="<?php echo isset($university_exam_results) ? $university_exam_results : ''; ?>"><br>
    <input type="submit" value="<?php echo isset($edit_id) ? 'Update' : 'Insert'; ?>">
</form>
