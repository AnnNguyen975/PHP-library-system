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
    // Insert into the database without the photo field
    $sql = "INSERT INTO userdata (username, mobile, password, borrow, status, `group`) 
            VALUES ('$username', '$mobile', '$password', 0, 0, '$group')";
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