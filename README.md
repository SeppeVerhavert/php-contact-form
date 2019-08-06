# Php-contact-form
Learn to process a contact form in PHP.
![screenshot01](https://i.imgur.com/S8u5GXH.jpg)

## Objectives
Your client would like you to make him a website with a few pages. One of the pages should actually contain a contact form, so that people can send him messages. Create a fully-functioning [html contact form](https://htmldog.com/guides/html/beginner/forms/) which will be processed by a php script. That form has to be validated by the W3C and follow the basics of [Accessibility](https://htmldog.com/guides/html/advanced/forms/)... Because _[the web is for everyone](https://thatsthespir.it/quote/view/188)_.

1.  Backend: A basic but real-life **form processing**: sanitization > validation > execution > feedback
2.  Backend: **create a function** that displays all error messages above the form
3.  Git: useful **Readme** file
4.  Backend : deploy on **Heroku**
5.  (bonus) Backend: Use **third-party dependencies** (php classes)
6.  (bonus) backend : Use of an **external SMTP** server to send emails

## My solutions

### Validation & Sanitation of user input
```php
<?php
$errors  =  array();
$name  =  filter_var($_POST["name"],  FILTER_SANITIZE_STRING);
$email  =  filter_var($_POST["email"],  FILTER_SANITIZE_EMAIL);
$message  =  filter_var($_POST["message"],  FILTER_SANITIZE_STRING);

if  (empty($name))  {
$errors['0']  =  "Please fill in your full name. <br>";
}  

if  (empty($email))  {
$errors['1']  =  "Please fill in your email-adress. <br>";
}  else  if  (!filter_var($email,  FILTER_VALIDATE_EMAIL))  {
$errors['3']  =  "This email-address is invalid. <br>";
}

if  (empty($message))  {
$errors['2']  =  "Please fill in a message. <br>";
}
```

### Function displayErrorbox()
```javascript
function  displayErrorbox() {
	if  (count($GLOBALS['errors'])  >  0  &&  count($GLOBALS['errors'])  <  3)  
	{ displayErrors(); }  
	else  if  (count($GLOBALS['errors'])  >=  3)  
	{ echo  ""; }  
	else  
	{ sendMail();}
}
```

### Function  displayErrors()
```javascript
function  displayErrors() {
	for  ($x  =  0;  $x  <  4;  $x++)  {
		if  (!empty($GLOBALS['errors'][$x]))  {
			echo  "<li>";
			print_r($GLOBALS['errors'][$x]);
			echo  "</li>";
		}
	}
}
```

## Evaluation

The evaluation method chosen is a self-evaluation based on the following indicators:
- [x] When one submits the form, you receive an email with the form content to my email address
- [x] Most PHP code is above the html doctype line
- [x] All PHP variable names are explicit and consistently named
- [x] PHP contents as little comments as possible, but as much as necessary
- [x] DRY: repeated instructions are wrapped into custom PHP functions
- [x] If one forgets the email address or the message, the proper feedback message is displayed and no email is sent
- [ ] If one enters an incorrectly formatted email message, the proper feedback message is displayed and no email is sent
- [x] If there are more than one error, all error messages are displayed in one html (un)ordered list (above the first question in the form).
- [x] If one enters some javascript code in any input field, the javascript is removed
- [x] The HTML is valid html5, as per the [W3C Validator](https://validator.w3.org/)
- [ ]  The HTML is accessible, as per the [Web Accessiblity Checker](https://achecker.ca/checker/) online tool.
- [x] The Git Repository Readme file is useful (what / why / when / who / where)

## Live Version
Send me a message [here](https://frozen-beach-53064.herokuapp.com/).

## Dependencies & Credits
Image is taken from [Dustin Lee](https://unsplash.com/@dustinlee) on [Unsplash](https://unsplash.com/photos/jLwVAUtLOAQ)

This site was made with:

(Composer)[https://getcomposer.org/]

(PHPMailer)[https://github.com/PHPMailer/PHPMailer]
