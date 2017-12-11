<?php

/**********************************************************************
 * The following values must be changed to run this code:
 * 1) $mail->Username in the setAndSendMail function
 * 2) $mail->SetFrom in the setAndSendMail function (identical to above)
 * 3) $mail->AddAddress in the setAndSendMail function
 * 4) $url variable below the function
 * 5) $toFind variable below the function
 *********************************************************************/


// Require PHPMailer sending library
require ('PHPMailerAutoload.php');

// User types password of the gmail account from the console
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
$counter = 1; // Counter to show how many times checked URL

// Checks website's HTML code for a specified item. If detected, sends mail.
function checkSite($haystack, $needle, $url, $password, $counter) {
    if (strpos($haystack, $needle)) {
        echo "\nFound " . $needle . " on " . $url;
        setAndSendMail($needle, $url, $password);
        return True;
    } else {
        echo "\n(" . $counter . ")Could not locate " . $needle . " on " . $url;
        return False;
    }
}

$interval = 15; // Minutes to check for every interval

// Keep running until item is found, because checkSite() would return True if found
while (!checkSite($htmlContents, $toFind, $url, $password, $counter))
{
    $htmlContents = file_get_contents($url);
    
    $now = time();
    sleep($interval * 60 - (time() - $now)); // Pause for specified amount of time in $interval
    $counter++;
}

?>
