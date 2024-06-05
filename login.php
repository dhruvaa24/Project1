<?php
    //starting the session
    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "pass";
    $dbname = "mydb";

    //create connection
    $conn = new mysqli($servername, $username, $password ,$dbname);

    //check connection
    if($conn->connect_error){
        die("Connection failed: " .$conn->connect_error);
    } 

    //check if the form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //importing values from html form and checking if they exist
        $uname = isset($_POST["username"]) ? trim($_POST["username"]) : '';
        $pass = isset($_POST["password"]) ? trim($_POST["password"]) : '';

        //checking if user exists
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        if($stmt == false){
            die("Prepare failed: " .$conn->error);
        }
        $stmt->bind_param("s",$uname);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0){
            //user exists
            $stmt1 = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
            if($stmt1 == false){
                die("Prepare failed: " .$conn->error);
            }
            $stmt1->bind_param("ss",$uname ,$pass);
            $stmt1->execute();
            $result = $stmt1->get_result();

            if($result->num_rows > 0){
                //correct password
                $_SESSION["username"] = $uname; //storing username in session
                header("Location: welcome.php");
                exit();
            } else {
                echo "The password you entered is incorrect. Please verify your password";
            }
            $stmt1->close();
        } else {
            echo "The username is invalid. Please register yourself";
        }
        $stmt->close();
    }
    $conn->close();
?>