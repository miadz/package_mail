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
            'required' => 'The :attribute '.trans('mail::mail_admin.required'),
        ];
    }

    public function isValidTitle($input) {

        $flag = TRUE;

        $min_lenght = config('mail_admin.name_min_length');
        $max_lenght = config('mail_admin.name_max_length');
        $subject_min_length = config('mail_admin.subject_min_length');
        $subject_max_length = config('mail_admin.subject_max_length');
        $attach_max_size = config('mail_admin.attach_max_size');

        $mail_name = @$input['mail_name'];
        $subject = @$input['mail_subject'];
        $file = @$input['fileToUpload'];
        $file_size = TRUE;

        if($file != null){
            if ($file->isValid()){
                if($file->getSize() > $file->getMaxFilesize())
                    $file_size = FALSE;
                // var_dump($file->getSize());
            }
            elseif ($file->getError()) {
                $file_size = FALSE;
            }
        }

        if (!filter_var($mail_name, FILTER_VALIDATE_EMAIL)) {
            $this->errors->add('mail_address_unvalid', trans('mail::mail_admin.mail_address_unvalid'));
            $flag = FALSE;

            // if ((strlen($mail_name) < $min_lenght)  
            //     || (strlen($mail_name) > $max_lenght)) {
            //     $this->errors->add('name_unvalid_length', trans('mail::mail_admin.name_unvalid_length', ['NAME_MIN_LENGTH' => $min_lenght, 'NAME_MAX_LENGTH' => $max_lenght]));
            //     $flag = FALSE;
            // }
        }
        if ((strlen($subject) < $subject_min_length)
            || (strlen($subject) > $subject_max_length)) {
            $this->errors->add('subject_unvalid_length', trans('mail::mail_admin.subject_unvalid_length', [
                    'SUBJECT_MIN_LENGTH' => $subject_min_length, 
                    'SUBJECT_MAX_LENGTH' => $subject_max_length
                ])
            );
            $flag = FALSE;
        }
        if(!$file_size){
            $this->errors->add('attach_unvalid', trans('mail::mail_admin.attach_unvalid')
            );
            $flag = FALSE;
        }

        return $flag;
    }
}