# Mail (for Google Mail)
Package send mail for back-end. <br />

Features:
* CRUD mail (mail address, inbox, contact)
* Contact by customer (mail address add from Front-end)
* Add mail address in Back-end
* Compose mail (send single or multiple mail address)
* Reply & forward
* Send mail with attached file
* Mail inbox, sent mail (download attached file from sent mail)
* Validator when send mail (include check internet connection)

> You can download package from [pakagist.org](https://packagist.org/packages/source/mail)
[![License](https://github.com/HoanNguyenIM/package_mail/license-mit)](https://packagist.org/packages/source/mail)

## Installation
### Step 1: Begin by installing this package through Composer. Run the following from the terminal:
```bash
composer require source/mail
```

### Step 2: Open file `composer.json`. <br />
Add line inside:
``` php
"autoload": {
	// ...
	"Source\\Mail\\": "vendor/source/mail/src/"
	// ...
}
```

### Step 3: Open file `app.php` at `config/app.php`. <br />
Add your new provider to the providers array of `config/app.php`:
``` php
'providers' => [
    // ...
	Source\Mail\MailServiceProvider::class,
	// ...
	],
```

### Step 4: Then run the install command: 
```bash
php artisan authentication:install
```
Note: you need to setup your database configuration before running the command.

### Step 5: Open file `.env`. Change to:
```php
	MAIL_DRIVER=smtp
	MAIL_HOST=smtp.gmail.com
	MAIL_PORT=587
	MAIL_USERNAME=your_google_email
	MAIL_PASSWORD=your_google_email_password
	MAIL_ENCRYPTION=tls
```

### Step 6: Sign in google mail and go to url: `https://www.google.com/settings/security/lesssecureapps`. <br />
Then, active it.

### Step 7: Make sure this command was run: 
```bash
php artisan vendor:publish --tag=public --force
```
and
```bash
php artisan vendor:publish --tag=config --force
```

## Usage
Use
```php
Route::get('mail/contact', [
    'as' => 'mail.contact',
    'uses' => 'Foostart\Mail\Controllers\Front\MailFrontController@contact'
]);
```
to get `Add contact` in Front-end