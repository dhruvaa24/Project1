<?php 
    $servername = "localhost";
    $username = "root";
    $password = "pass";
    $dbname = "mydb";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Importing values from the HTML form and checking if they exist
        $fname = isset($_POST["firstname"]) ? trim($_POST["firstname"]) : '';
        $lname = isset($_POST["lastname"]) ? trim($_POST["lastname"]) : '';
        $gender = isset($_POST["gender"]) ? trim($_POST["gender"]) : '';
        $email = isset($_POST["email"]) ? trim($_POST["email"]) : '';
        $phone = isset($_POST["phone"]) ? trim($_POST["phone"]) : '';
        $uname = isset($_POST["username"]) ? trim($_POST["username"]) : '';
        $pass = isset($_POST["password"]) ? trim($_POST["password"]) : '';

        //checking is user with a phone or username already exists
        $stmt = $conn->prepare("SELECT * FROM users WHERE phone = ? OR username = ?");
        if($stmt === false) {
            die("Prepare failed: " .$conn->error);
        }
        $stmt->bind_param("ss",$phone, $uname);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0){
            //user exists
            echo "Phone or Username already exists. Please choose another one OR login from this username.";
        } else {
            // Prepare an SQL statement for execution
            $stmt = $conn->prepare("INSERT INTO users (firstname, lastname, gender, email, phone, username, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
            
            if ($stmt === false) {
                die("Prepare failed: " . $conn->error);
            }

            // Bind variables to the parameter markers of the prepared statement
            $stmt->bind_param("sssssss", $fname, $lname, $gender, $email, $phone, $uname, $pass);

            // Execute the prepared statement
            if ($stmt->execute()) {
                echo "You are now registered";
            } else {
                echo "Error: " . $stmt->error;
            }
        }

        // Close the statement and the connection
        $stmt->close();
    } 
    $conn->close();
?>
