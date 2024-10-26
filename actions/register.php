<?php
include('connect.php');

$username = $_POST['username'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$group = $_POST['group'];

if ($password != $cpassword) {
    echo '<script>
    alert("Passwords do not match");
    window.location="../partials/registration.php";
    </script>';
} else {
    // Check for duplicate username
    $checkUsernameSql = "SELECT * FROM userdata WHERE username = '$username'";
    $checkResult = mysqli_query($con, $checkUsernameSql);

    if (mysqli_num_rows($checkResult) > 0) {
        // Username already exists
        echo '<script>
        alert("Username already exists. Please choose a different one.");
        window.location="../partials/registration.php";
        </script>';
    } else {
        // Insert into the database if no duplicate is found
        $sql = "INSERT INTO userdata (username, mobile, password, `groups`) 
                VALUES ('$username', '$mobile', '$password', '$group')";
        $result = mysqli_query($con, $sql);

        if ($result) {
            echo '<script>
            alert("Registration successful");
            window.location="../index.php";
            </script>';
        } else {
            // Capture the SQL error
            $error = mysqli_error($con);
            echo '<script>
            alert("Error in registration: ' . $error . '");
            window.location="../partials/registration.php";
            </script>';
        }
    }
}
?>