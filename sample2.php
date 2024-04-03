<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="sem.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Protor Book</title>
    <link rel="icon" href="download-6.webp">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="popup1">
        <div class="close" onclick="closee()">
            <i class="fa-solid fa-x" style="font-size: larger;"></i>
        </div>
        <a href="">Home</a>
        <a href="sem1.html">Semester 1</a>
        <a href="sem2.html">Semester 2</a>
        <a href="sem3.html">Semester 3</a>
        <a href="sem4.html">Semester 4</a>
        <a href="sem5.html">Semester 5</a>
        <a href="sem6.html">Semester 6</a>
        <a href="sem7.html">Semester 7</a>
        <a href="sem8.html">Semester 8</a>
    </div>
    <div class="semhead">
        <h1>SEMESTER 1</h1>
    </div>
    <div class="bars1" onclick="show()">
            <i class="fa-solid fa-bars"></i>
    </div>

    <div class="main">
        <div class="pro1name">
            <h1>Name of the proctor  : Ganesh</h1>
        </div>
    </div>
    
    <!-- Display database options -->
    <div>
        <form method="post" action="">
            <label for="jagadeesh">Select an option:</label>
            <select name="jagadeesh" id="jagadeesh">
                <?php
                // Replace 'your_table' with your actual table name
                $servername = "localhost";
                $username = "root";
                $password = "1234";
                $dbname = "moon";
                
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                
                // Fetch options from the database
                $sql = "SELECT id, option_name FROM your_table";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        $id = $row["id"];
                        $optionName = $row["option_name"];
                        // Check if this option is selected
                        $selected = ($optionName == 'jagadeesh') ? 'selected' : '';
    
                        echo "<option value='$id' $selected>$optionName</option>";
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>
            </select>
            <button type="submit">Submit</button>
        </form>
    </div>

    <div class="sem1table">
        <center>
            <form method="post" action="murn.php">
                <table border="2" class="sem1content">
                    <tr>
                        <th>Subject code<br>Name of subject</th>
                        <th colspan="2">Test 1</th>
                        <th colspan="2">Test 2</th>
                        <th>Internal marks</th>
                        <th>University Exam<br>(Results)</th>
                    </tr>
                    <tr>
                        <th>-</th>
                        <th>Mark<br>(%)</th>
                        <th>Attendance<br>(Hours)</th>
                        <th>Mark<br>(%)</th>
                        <th>Attendance<br>(Hours)</th>
                        <th>-</th>
                        <th>-</th>
                    </tr>
                    <!-- PHP code to insert selected data into the table will go here -->
                </table> 
                <button type="submit">Submit</button>
            </form>     
        </center>

    </div>
    <div class="foot">
        <form>
            <tr>
                <th>Subject Code</th>
                <td><input type="text" name="subject_code"></td>
                <!-- Add other input fields here -->
            </tr>
        </form>
        
            <tr>
                <td><h2>Number of standing arrears:</h2></td><br>
                <td><input type="text"></td>
            </tr>
            <br>
            <br>
            <br>
            <tr>
                <td><h2>Attendance percentage (overall):</h2></td><br>
                <td><input type="text">%</td>
            </tr>
            <br>
            <br>
            <br>
            <tr>
                <td><h2>GPA:</h2></td> <td><input type="text"></td><br>
            </tr>
            <br>
            <br>
            <br>
            <tr>
                <td><h2>CGPA:</h2></td>
                <td><input type="text"></td>
            </tr>
        </form>
    </div>
    <footer class="semfooter">
        <center>
            <h1>Jerusalem college of Engineering</h1>
        </center>
        <br>
        <h3>For more details visit:</h3>
        <br>
        <h1>
            <i class="fa-brands fa-whatsapp" style="margin-left:20px;"></i>
            <i class="fa-brands fa-instagram"style="margin-left: 20px;"></i></i>
            <i class="fa-brands fa-facebook"style="margin-left: 20px;"></i></i>
            <i class="fa-brands fa-linkedin"style="margin-left: 20px;"></i></i>
        </h1>
        <br>
        <br>
        <h3><i class="fa-solid fa-phone" style="margin-right: 15px;"></i> 75400 37999
        <i class="fa-solid fa-envelope"style="margin-right: 15px;"></i> admission@jerusalemengg.ac.in</h3>
        <center>
            All rights reseved
        </center>
    </footer>
    <script src="main.js"></script>
</body>
</html>
