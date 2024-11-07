<?php
session_start();
include('connect.php'); // Ensure your database connection is included

// Get data from the POST request
$username = $_POST['username'];
$password = $_POST['password']; // User's entered password

// Use prepared statements to prevent SQL injection
$sql = "SELECT * FROM userdata WHERE username=?";
$stmt = $con->prepare($sql);

// Check if the statement was prepared correctly
if ($stmt === false) {
    die('Prepare failed: ' . htmlspecialchars($con->error));
}

// Bind the parameters
$stmt->bind_param("s", $username);

// Execute the statement
$stmt->execute();
$result = $stmt->get_result();

// Check if any rows were returned
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc(); // Fetch user data

    // Verify if the password matches the one stored in the database
    if ($password === $user['password']) {
        // Password is correct; set session variables based on user group
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['mobile'] = $user['mobile'];
        $_SESSION['group'] = $user['group'];

        if ($user['groups'] === 'Administrator') {
            header("Location: ../loginforad.php");
            echo '<script>alert("Login successful as Administrator");</script>';
        } elseif ($user['groups'] === 'User') {
            header("Location: ../loginpageforuser.php");
            echo '<script>alert("Login successful as User");</script>';
        }
    } else {
        // Password is incorrect
        echo '<script>
            alert("Invalid credentials");
            window.location="../index.php";
        </script>';
    }
} else {
    // No user found with that username
    echo '<script>
        alert("Invalid credentials");
        window.location="../index.php";
    </script>';
}

// Close the prepared statement and database connection
$stmt->close();
$con->close();
?>