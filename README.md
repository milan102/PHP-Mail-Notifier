# PHP-Mail-Notifier

Sends emails/texts using Google's SMTP server to a receiving email address, when a specified item is located on a web page's HTML code.

Notifies about a specific change on a page that regularly updates, useful for checking if a shopping item is back in stock.

Get instant updates through your phone by setting the receiving email address to your phone's SMS email.


## Instructions
1) In the setAndSendMail() function, type in your gmail account, your name, receiver's email, and receiver's name.
2) Change the $url and $toFind variables to the page you want to look on and what to look for, respectively.
3) Change the $interval variable to the length (in minutes) you wish to check for. Default is 15 minutes.

A successful text message received:

![alt tag](https://github.com/milan102/PHP-Mail-Notifier/blob/master/preview/sample.png)

## Notes

*To use this program, you will need a gmail account.*

*You can receive text messages by identifying your carrier's SMS gateway, [full list here](https://mfitzp.io/list-of-email-to-sms-gateways/).
For example, if you have Verizon Wireless, the receiving email would be [yourphonenumber]@vztext.com.
This allows you to receive an instant text message on your phone from a sender originating from an email.*
