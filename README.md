# package_mail
Package send mail for back-end.

## Step 1: Begin by installing this package through Composer. Run the following from the terminal:
`composer require source/mail`

## Step 2: Open file `composer.json`. Add line inside:
``` php
"autoload": {
	// ...
	"Source\\Mail\\": "vendor/source/mail/src/"
	// ...
}
```

## Step 3: Open file `app.php` at `config/app.php`. Add your new provider to the providers array of `config/app.php`:
``` php
'providers' => [
    // ...
	Source\Mail\MailServiceProvider::class,
	// ...
	],
```

## Step 4: Then run the install command: `php artisan authentication:install` Note: you need to setup your database configuration before running the command.

## Step 5: Open file `.env`. Change to:
```php
	MAIL_DRIVER=smtp
	MAIL_HOST=smtp.gmail.com
	MAIL_PORT=587
	MAIL_USERNAME=your_google_email
	MAIL_PASSWORD=your_google_email_password
	MAIL_ENCRYPTION=tls
```

## Step 6: Sign in google mail and go to url: `https://www.google.com/settings/security/lesssecureapps`. Then, active it.

## Step 7: Make sure this command was run: 
`php artisan vendor:publish --tag=public --force` and
`php artisan vendor:publish --tag=config --force`