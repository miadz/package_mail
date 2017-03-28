<?php
namespace Foostart\Mail\Validators;

use Event;
use \LaravelAcl\Library\Validators\AbstractValidator;

use Illuminate\Support\MessageBag as MessageBag;

class MailAdminValidator extends AbstractValidator
{
    protected static $rules = array(
        'mail_name' => 'required',
    );

    protected static $messages = [];

    public function __construct()
    {
        Event::listen('validating', function($input)
        {
        });
        $this->messages();
    }

    public function validate($input) {

        $flag = parent::validate($input);

        $this->errors = $this->errors?$this->errors:new MessageBag();

        $flag = $this->isValidTitle($input)?$flag:FALSE;

        return $flag;
    }

    public function messages() {
        self::$messages = [
            'required' => ':attribute '.trans('mail::mail_admin.required'),
        ];
    }

    public function isValidTitle($input) {

        $flag = TRUE;

        $min_lenght = config('mail_admin.name_min_length');
        $max_lenght = config('mail_admin.name_max_length');

        $mail_name = @$input['mail_name'];

        if (!filter_var($mail_name, FILTER_VALIDATE_EMAIL)) {
            $this->errors->add('name_unvalid_length', trans('mail::mail_admin.mail_address_unvalid'));
            $flag = FALSE;

            // if ((strlen($mail_name) < $min_lenght)  
            //     || (strlen($mail_name) > $max_lenght)) {
            //     $this->errors->add('name_unvalid_length', trans('mail::mail_admin.name_unvalid_length', ['NAME_MIN_LENGTH' => $min_lenght, 'NAME_MAX_LENGTH' => $max_lenght]));
            //     $flag = FALSE;
            // }
        }

        return $flag;
    }
}