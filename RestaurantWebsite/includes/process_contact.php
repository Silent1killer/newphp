<?php
// Only allow this file to be included, not directly accessed
if (!defined('BASEPATH')) {
    define('BASEPATH', dirname(dirname(__FILE__)));
}

if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    // If someone tries to access this file directly, redirect to the contact page
    header('Location: ../contact.php');
    exit;
}

// Process the contact form
$name = isset($_POST['name']) ? htmlspecialchars(trim($_POST['name'])) : '';
$email = isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : '';
$subject = isset($_POST['subject']) ? htmlspecialchars(trim($_POST['subject'])) : 'New Contact Form Submission';
$message = isset($_POST['message']) ? htmlspecialchars(trim($_POST['message'])) : '';

// Additional validation
if (empty($name) || empty($email) || empty($message)) {
    return;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return;
}

// In a real application, you would send an email here
// For this example, we'll save to a JSON file for demonstration
$contact_data = [
    'name' => $name,
    'email' => $email,
    'subject' => $subject,
    'message' => $message,
    'date' => date('Y-m-d H:i:s'),
    'ip' => $_SERVER['REMOTE_ADDR']
];

// Create data directory if it doesn't exist
$data_dir = BASEPATH . '/data';
if (!is_dir($data_dir)) {
    mkdir($data_dir, 0755, true);
}

// Save to contacts.json
$contacts_file = $data_dir . '/contacts.json';
$contacts = [];

if (file_exists($contacts_file)) {
    $json_data = file_get_contents($contacts_file);
    $contacts = json_decode($json_data, true) ?: [];
}

$contacts[] = $contact_data;

// Save the updated contacts array back to the file
file_put_contents($contacts_file, json_encode($contacts, JSON_PRETTY_PRINT));

// Set success message
$success_message = "Thank you for your message! We'll get back to you soon.";

// Clear form fields after successful submission
$name = $email = $subject = $message = "";
