<?php
// Include database connection
include('connect.php');

// Set the correct Content-Type header
header('Content-Type: application/json');

// Check the database connection
if (!$con) {
    echo json_encode(['error' => 'Database connection failed']);
    exit;
}

// Fetch data from the database
$sql = "SELECT id, name, description, download_link FROM books";
$result = mysqli_query($con, $sql);

if ($result) {
    $books = mysqli_fetch_all($result, MYSQLI_ASSOC); // Fetch all records
    echo json_encode($books); // Encode the result as JSON
} else {
    echo json_encode(['error' => 'Failed to fetch books']);
}

mysqli_close($con);

