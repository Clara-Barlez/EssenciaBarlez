<?php
  // Configuration
  $accessKey = '6801e57a-31ef-46c0-b64a-d263c31b00dd'; // Your API access key
  $emailTo = 'clarabarlez@gmail.com'; // Your email address
  $subject = 'Contact Form Submission'; // Email subject

  // Check if the access key is valid
  if ($_POST['accessKey'] !== $accessKey) {
    echo 'Invalid access key';
    exit;
  }

  // Get the form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  // Validate the form data
  if (empty($name) || empty($email) || empty($subject) || empty($message)) {
    echo 'Please fill in all fields';
    exit;
  }

  // Send the email
  $headers = 'From: ' . $email . "\r\n" .
             'Reply-To: ' . $email . "\r\n" .
             'MIME-Version: 1.0' . "\r\n" .
             'Content-Type: text/html; charset=UTF-8';
  $body = '<p>Name: ' . $name . '</p>' .
           '<p>Email: ' . $email . '</p>' .
           '<p>Subject: ' . $subject . '</p>' .
           '<p>Message: ' . $message . '</p>';
  if (mail($emailTo, $subject, $body, $headers)) {
    echo 'OK'; // Success message
  } else {
    echo 'Error sending email'; // Error message
  }
?>