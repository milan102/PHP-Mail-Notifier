# PHP-Mail-Notifier

This program sends emails/texts, using Google's SMTP server, to a receiving address when a specified item is located on a web page's HTML code. Great for being notified about a specific change on a page that regularly updates. Get instant updates through your phone by setting the receiving email address to your phone's SMS email.


## Instructions:
1) In the setAndSendMail() function, type in your gmail account, your name, receiver's email, and receiver's name.
2) Change the $url and $toFind variables to the page you want to look on and what to look for, respectively.
3) Change the $interval variable to the length (in minutes) you wish to check for. Default is 15 minutes.

A successful text message received:

![alt tag](https://github.com/milan102/PHP-Mail-Notifier/blob/master/sample.png)

## Notes:

*To use this program, you will need a gmail account.*

*You can receive text messages by identifying your carrier's SMS gateway, [full list here](https://mfitzp.io/list-of-email-to-sms-gateways/). For example, if you have Verizon Wireless, the receiving email would be [yourphonenumber]@vztext.com. This allows you to receive an instant text message on your phone from a sender originating from an email.*

## Donations
[![Donate](https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif)](https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=HL3P4UC2JKEAN&lc=US&item_name=Milan%27s%20Software&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted)
