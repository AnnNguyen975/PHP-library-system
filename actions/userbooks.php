<?php
header('Content-Type: application/json');
include('connect.php');

// Ensure there's no output before this point
if (!$con) {
    echo json_encode(['success' => false, 'error' => 'Database connection failed']);
    exit;
}

// Retrieve and validate POST data
$data = json_decode(file_get_contents("php://input"), true);
if (isset($data['name'], $data['description'], $data['download_link'])) {
    $name = $data['name'];
    $description = $data['description'];
    $download_link = $data['download_link'];

    // Insert book data into the database
    $stmt = $con->prepare("INSERT INTO userbooks (name, description, download_link) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $description, $download_link);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Failed to insert book into the database']);
    }
    $stmt->close();
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid data sent']);
}

mysqli_close($con);
