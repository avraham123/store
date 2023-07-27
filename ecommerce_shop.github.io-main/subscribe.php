<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $email = $_POST["email"];

  // Validate the email (you can add additional validation here)
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(array("success" => false, "message" => "Invalid email address"));
    exit;
  }

  $to = $email;
  $subject = "Thanks For Subscribing to Avraham's Shop!";
  $message = "Great deals coming your way very soon!";

  // Set the email headers
  $headers = "From: YourName <yourname@example.com>" . "\r\n";
  $headers .= "Reply-To: YourName <yourname@example.com>" . "\r\n";
  $headers .= "Content-Type: text/plain; charset=UTF-8" . "\r\n";

  // Send the email
  if (mail($to, $subject, $message, $headers)) {
    echo json_encode(array("success" => true, "message" => "Email sent successfully"));
  } else {
    echo json_encode(array("success" => false, "message" => "Failed to send email"));
  }
}
?>
