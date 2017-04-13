<?php

// Require PHPMailer sending library
require ('PHPMailerAutoload.php');

// Get password of the gmail account you're sending from
echo "Enter the password for the sending email account: ";
$handle = fopen ("php://stdin","r");
$password = fgets($handle);
// Sets server settings and sends mail
function setAndSendMail($toFind, $url, $password) {
    $mail = new PHPMailer();

    $mail->IsSMTP();  // Telling the class to use SMTP
    $mail->SMTPAuth   = true; // SMTP authentication
    $mail->SMTPSecure = "tls"; // Using tls, could use SSL but it's deprecated
    $mail->Host       = "smtp.gmail.com"; // SMTP server
    $mail->Port       = 587; // SMTP Port
    $mail->Username   = "YOUR_EMAIL@gmail.com"; // SMTP account username
    $mail->Password   = $password;        // SMTP account password

    $mail->SetFrom("YOUR_EMAIL@gmail.com", "YOUR_NAME"); // FROM, sender email
    $mail->AddAddress("RECEIVERS_EMAIL@whatever.com", "RECEIVERS_NAME"); // TO, recipient email
    $mail->Subject    = $toFind . " Available"; // Email subject
    $mail->Body       = "\n\n" . $toFind . " detected at " . $url; // Email body

    // Prints errors if sending procedure didn't work
    if (!$mail->send()) {
        echo "\nMailer Error: " . $mail->ErrorInfo;
    } else {
        echo "\nMessage sent!";
    }

    unset($mail); // Destroys variable
}

$url = "https://slickdeals.net/"; // URL to check
$htmlContents = file_get_contents($url); // Store site's HTML contents in a string
$toFind = "Dell Laptop"; // Item to locate

// Checks website's HTML code for a specified item. If detected, sends mail.
function checkSite($haystack, $needle, $url, $password) {
    if (strpos($haystack, $needle) !== false) {
        echo "\nFound " . $needle . " on " . $url;
        setAndSendMail($needle, $url, $password);
        return True;
    } else {
        echo "\nCould not locate " . $needle . " on " . $url;
        return False;
    }
}

$interval = 15; // Minutes to check for every interval

// Keep running until item is found, because checkSite() would return True if found
while (!checkSite($htmlContents, $toFind, $url, $password))
{
    $now = time();
    sleep($interval * 60 - (time() - $now)); // Pause for specified amount of time in $interval
}

?>