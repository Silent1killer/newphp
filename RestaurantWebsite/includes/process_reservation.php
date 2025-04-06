<?php
// Only allow this file to be included, not directly accessed
if (!defined('BASEPATH')) {
    define('BASEPATH', dirname(dirname(__FILE__)));
}

if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    // If someone tries to access this file directly, redirect to the reservation page
    header('Location: ../reservation.php');
    exit;
}

// Process the reservation form
$name = isset($_POST['name']) ? htmlspecialchars(trim($_POST['name'])) : '';
$email = isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : '';
$phone = isset($_POST['phone']) ? htmlspecialchars(trim($_POST['phone'])) : '';
$date = isset($_POST['date']) ? htmlspecialchars(trim($_POST['date'])) : '';
$time = isset($_POST['time']) ? htmlspecialchars(trim($_POST['time'])) : '';
$guests = isset($_POST['guests']) ? intval($_POST['guests']) : 0;
$special_requests = isset($_POST['special_requests']) ? htmlspecialchars(trim($_POST['special_requests'])) : '';

// Additional validation
if (empty($name) || empty($email) || empty($phone) || empty($date) || empty($time) || $guests < 1) {
    return;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return;
}

// Check if the date is not in the past
$current_date = date('Y-m-d');
if ($date < $current_date) {
    return;
}

// Check if guests count is valid (1-10)
if ($guests < 1 || $guests > 10) {
    return;
}

// In a real application, you would check availability and send confirmation email
// For this example, we'll save to a JSON file for demonstration
$reservation_data = [
    'name' => $name,
    'email' => $email,
    'phone' => $phone,
    'date' => $date,
    'time' => $time,
    'guests' => $guests,
    'special_requests' => $special_requests,
    'reservation_date' => date('Y-m-d H:i:s'),
    'status' => 'pending', // pending, confirmed, cancelled
    'reservation_id' => uniqid('RES-')
];

// Create data directory if it doesn't exist
$data_dir = BASEPATH . '/data';
if (!is_dir($data_dir)) {
    mkdir($data_dir, 0755, true);
}

// Load existing reservations
$reservations_file = $data_dir . '/reservations.json';
$reservations = [];

if (file_exists($reservations_file)) {
    $json_data = file_get_contents($reservations_file);
    $reservations = json_decode($json_data, true) ?: [];
}

// Add new reservation
$reservations[] = $reservation_data;

// Save back to file
file_put_contents($reservations_file, json_encode($reservations, JSON_PRETTY_PRINT));

// Set success message
$success_message = "Thank you! Your reservation (ID: {$reservation_data['reservation_id']}) has been received. We'll confirm shortly via email.";

// Clear form fields after successful submission
$name = $email = $phone = $date = $time = $guests = $special_requests = "";
