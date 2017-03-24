# package_mail
Package send mail for back-end.

## Step 1: Begin by installing this package through Composer. Run the following from the terminal:
`composer require source/mail`

## Step 2: Open file composer.json. Add line inside:
``` php
"autoload": {
	// ...
	"Source\\Mail\\": "vendor/source/mail/src/"
	// ...
}
```

## Step 3: Open file app.php at config/app.php. Add your new provider to the providers array of config/app.php:
``` php
'providers' => [
    // ...
	Source\Mail\MailServiceProvider::class,
	// ...
	],
```

## Step 4: Make sure this command was run: 
`php artisan vendor:publish --tag=public --force`