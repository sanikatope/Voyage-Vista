<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_info_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user ID or username to fetch preferences (You can modify this as needed)
$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : '';

if ($user_id) {
    // Fetch user preferences
    $stmt = $conn->prepare("SELECT preferences FROM user_data WHERE username = ?");
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $preferences = $result->fetch_assoc();
        echo json_encode($preferences);
    } else {
        echo json_encode(["error" => "User not found."]);
    }

    $stmt->close();
} else {
    echo json_encode(["error" => "No user ID provided."]);
}

$conn->close();
?>
