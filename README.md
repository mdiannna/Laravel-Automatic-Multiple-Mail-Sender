# Laravel Automatic Multiple Mail Sender
A tool to send emails separately to multiple addresses automatized with Laravel.

*This is an Open Source project. Feel free to contribute!*

# Setup
### 1. Download/Clone the project
### 2. Composer install
Run ```composer install``` in the terminal
### 3.Configure the .env file.
You can use the .env.example file and then change the following lines:
```
MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=[your_mail_username]
MAIL_PASSWORD=[your_mail_password]
MAIL_ENCRYPTION=tls


MAIL_DEFAULT_SUBJECT = [default_subject]
MAIL_DEFAULT_SENDER = [sender_email]
```

to your real data.

### 4. Gmail settings
If you are using gmail, go to https://myaccount.google.com/security#connectedapps

Check the option **Sign-in & security -> Connected apps & sites -> Allow less secure apps settings.**
Turn the option **"Allow less secure apps" ON**.

![Sign-in & security screenshot](https://learninglaravel.net/img/book/chap3-pic18.png)
### 5. Create template
You can use and change the default template located in ```resources/view/templates``` or create a new one in ```resources/views```.

If you created a custom template, modify the name in the ```app/Mail/TemplateMail.php```.
In the function ```build()```, replace the line


```return $this->subject($subject)->from($senderEmail)->view('mail.template');``` 


with ```return $this->subject($subject)->from($senderEmail)->view('mail.your-custom-template-name');```


### 6. Setup your email addresses

Find the file ```app/Https/SendController.php``` and the function ```sendTemplateMail()```.

Replace the 
``` 
$mails = [ 
            "testemail@test.test",
        ];
```


with your actual email adresses.

### 7. You can use the mail sender!
Go to the route ```/view-template``` in your app to see how the mail template will look.


# Warnings and limitations
1. Be aware of the fact that the emails are sent one by one, **separately** to each email address. So if you have a lot of addresses, it may take you a **lot of time**. **Be patient**, even after the page is no more loading, the **mails might still be sent**!

2. If you want to use multiple templates and multiple emails, you will have to specify the sender and subject for each of them, not use the defaults in the .env file


# FAQ
#### Q: What addresses will see the receiver?
A: The receiver will se **only his address**, if you don't modify the code.
If you wish the mail to be sent to **multiple addresses, and everyone to see all the addresses**, **comment** the following lines:


```foreach ($mails as $mail) { ``` 

and the corresponding closing bracket.

Also, replace the line

```Mail::to($mail)->send(new TemplateMail()); ```

with ```Mail::to($mails)->send(new TemplateMail());```


(The variable $mails is an array containing multiple addresses)


#### Q: What happens if an email address is not correct? Will the mail be send to other addresses?
A: If some of the addresses are not correct, the mail will still be sent to other addresses, but you will see in your logs file the addresses that failed.




# Contributors
[Diana Marusic](https://github.com/mdiannna)

# Other resources
For more information, I would recommend you to read the following articles:
- https://laravel.com/docs/5.6/mail 
- https://learninglaravel.net/learn-to-send-emails-using-gmail-and-sendgrid-in-laravel-5
- https://medium.com/@Oriechinedu/an-escape-route-to-problems-sending-email-using-gmail-smtp-in-php-laravel-4dd4c5e0533
- https://ourcodeworld.com/articles/read/247/how-to-send-an-email-gmail-outlook-and-zoho-in-laravel


