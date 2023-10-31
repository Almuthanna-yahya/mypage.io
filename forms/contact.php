
<?php
  // Define the receiving email address
  $receiving_email_address = 'almuthana.yahya@gmail.com';

  // Collect form data
  $name = trim($_POST['name']);
  $email = trim($_POST['email']);
  $subject = trim($_POST['subject']);
  $message = trim($_POST['message']);

  // Validate form data
  if (empty($name) || empty($email) || empty($subject) || empty($message)) {
    echo 'All fields are required.';
    exit;
  }

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo 'Invalid email format.';
    exit;
  }

  // Prepare email
  $email_content = "Name: $name\n";
  $email_content .= "Email: $email\n\n";
  $email_content .= "Message:\n$message\n";

  $email_headers = "From: $name <$email>";

  // Send email
  if (mail($receiving_email_address, $subject, $email_content, $email_headers)) {
    echo 'Thank you for your message.';
  } else {
    echo 'Failed to send email.';
  }
?>
