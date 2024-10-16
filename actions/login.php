<?php
include('connect.php'); // Ensure your database connection is included

// Get data from the POST request
$username = $_POST['username'];
$mobile = $_POST['mobile'];
$password = $_POST['password']; // Keeping this variable for completeness, but it won't be used.
$group = $_POST['group']; // Make sure this input exists in your form

// Use prepared statements to prevent SQL injection (recommended)
$sql = "SELECT * FROM userdata WHERE username=? AND mobile=? AND `group`=?";
$stmt = $con->prepare($sql);

// Check if the statement was prepared correctly
if ($stmt === false) {
    die('Prepare failed: ' . htmlspecialchars($con->error));
}

// Bind the parameters
$stmt->bind_param("sss", $username, $mobile, $group); // Adjust the binding according to your query

// Execute the statement
$stmt->execute();
$result = $stmt->get_result();

// Check if any rows were returned
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc(); // Fetch user data

    // Check the user's group and redirect accordingly
    if ($user['group'] === 'Administrator') {
        echo '<script>
            alert("Login successful as Administrator");
            window.location = "../loginforad.php";
        </script>';
    } elseif ($user['group'] === 'User') {
        echo '<script>
            alert("Login successful as User");
            window.location = "../loginpageforuser.php";
        </script>';
    }
} else {
    echo '<script>
        alert("Invalid credentials");
        window.location="../index.php";
    </script>';
}

// Close the prepared statement and database connection
$stmt->close();
$con->close();
