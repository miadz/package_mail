```
## Installation
```

    ### Step 1: Install Laravel authentication and ACL admin panel package. `Important`

    [Laravel authentication and ACL](https://github.com/intrip/laravel-authentication-acl)

    ### Step 2: Begin by installing this package through Composer. Run the following from the terminal:
    ```bash
    composer require source/mail
    ```

    ### Step 3: Open file `composer.json`. <br />
    Add line inside:
    ``` php
    "autoload": {
    	// ...
    	"Source\\Mail\\": "vendor/source/mail/src/"
    	// ...
    }
    ```

    ### Step 4: Open file `app.php` at `config/app.php`. <br />
    Add your new provider to the providers array of `config/app.php`:
    ``` php
    'providers' => [
        // ...
    	Source\Mail\MailServiceProvider::class,
    	// ...
    	],
    ```

    ### Step 5: Then run the install command: 
    ```bash
    php artisan authentication:install
    ```
    Note: you need to setup your database configuration before running the command.

    ### Step 6: Open file `.env`. Change to:
    ```php
    	MAIL_DRIVER=smtp
    	MAIL_HOST=smtp.gmail.com
    	MAIL_PORT=587
    	MAIL_USERNAME=your_google_email
    	MAIL_PASSWORD=your_google_email_password
    	MAIL_ENCRYPTION=tls
    ```

    ### Step 7: Sign in google mail and go to url: `https://www.google.com/settings/security/lesssecureapps`. <br />
    Then, active it. <br />
    If you have problem like `Expected response code 250 but got code "535", with message "535-5.7.8 Username and Password not accepted.` when send mail, you need to go to this link: `https://accounts.google.com/b/0/DisplayUnlockCaptcha`

    ### Step 8: Make sure this command was run: 
    ```bash
    php artisan vendor:publish --tag=public --force
    ```
    and
    ```bash
    php artisan vendor:publish --tag=config --force
    ```





