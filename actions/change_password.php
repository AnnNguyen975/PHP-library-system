<?php
session_start();
include('connect.php'); // Include your database connection

// Get form inputs
$currentPassword = $_POST['current_password'];
$newPassword = $_POST['new_password'];
$confirmPassword = $_POST['confirm_password'];
$username = $_SESSION['username'];

// Initialize an array to hold error/success messages
$messages = [];

// Check if new password matches confirmation
if ($newPassword !== $confirmPassword) {
    $messages[] = "New passwords do not match.";
}

// Fetch user's current password from the database
$stmt = $con->prepare("SELECT password FROM userdata WHERE username = ? ");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Verify current password
if ($user && $user['password'] === $currentPassword) {
    // Update with new password
    // Ensure you hash the new password before storing it

    $stmt = $con->prepare("UPDATE userdata SET password = ? WHERE username = ?");
    $stmt->bind_param("ss", $newPassword, $username);

    if ($stmt->execute()) {
        $messages[] = "Password changed successfully.";
    } else {
        $messages[] = "Password change failed.";
    }
} else {
    $messages[] = "Incorrect current password.";
}
$_SESSION['password_change_messages'] = $messages;



// Redirect back to the user dashboard or wherever you want
header("Location: ../index.php");
exit;
