<?php namespace Foostart\Mail\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use URL;
use Route,
    Redirect;
use Foostart\Mail\Models\Mails;
use Foostart\Mail\Models\MailsHistories;
use Mail;
use Illuminate\Support\Facades\Input;

class MailSendController extends Controller {
	public $data_view = array();

    private $obj_mail = NULL;
    private $obj_mail_history = NULL;
    private $obj_validator = NULL;

    public function __construct() {
        $this->obj_mail = new Mails();
        $this->obj_mail_history = new MailsHistories();
    }

    /**
     *
     * @return type
     */
    /*
        Wrong when send. Go to https://www.google.com/settings/security/lesssecureapps and active it.
    */
    public function mailSend(Request $request){
        $mail = NULL;
        $mail_history = NULL;
        $input = $request->all();
        $mail_id = (int) $request->get('id');
        $mail_address = (string) $request->get('mail_address');
        $count_mail = 0;
        
        $arr_mail = explode(',', $mail_address);
        $count_mail = count($arr_mail);

        $file = Input::file('fileToUpload');
        $file_path = null;

        if($file != null){
            $file_path = $this->attachFile($file);
        }

        $data = [
            'confirm' => 'confirm',
            'author' => 'ADMIN PACKAGE',
            'subject' => $input['mail_subject'],
            'contents' => $input['mail_content'],
            'file_path' => $file_path
            ];

        if($mail_address == null){
            if (!empty($mail_id) && (is_int($mail_id))) {
                $mail = $this->obj_mail->find($mail_id);
            }
            $data['address'] = $mail->mail_name;
            $this->sendding($data);

            $request->request->add([
                'mail_history_name' => $mail->mail_name,
                'mail_history_subject' => $input['mail_subject'],
                'mail_history_content' => $input['mail_content'],
                'mail_history_attach' => $file_path
            ]);
            $input = $request->all();
            $mail_history = $this->obj_mail_history->add_mail_history($input);
            
            //Message
            \Session::flash('message', trans('mail::mail_admin.message_send_mail_successfully'));
            return Redirect::route("admin_mail");
        }
        else {
            if($count_mail == 1){
                $data['address'] = $input['mail_address'];
                $this->sendding($data);
            }
            else{
                foreach ($arr_mail as $key => $value) {
                    $data['address'] = $value;
                    $this->sendding($data);
                    sleep(5);
                }
            }

            $request->request->add([
                'mail_history_name' => $input['mail_address'],
                'mail_history_subject' => $input['mail_subject'],
                'mail_history_content' => $input['mail_content'],
                'mail_history_attach' => $file_path
            ]);
            $input = $request->all();
            $mail_history = $this->obj_mail_history->add_mail_history($input);
            
            //Message
            \Session::flash('message', trans('mail::mail_admin.message_send_mail_successfully'));
            return Redirect::route("admin_mail");
        }
    }

    /**
     *
     * @return type
     */
    public function sendding($data){
        Mail::send(['view' => 'mail'], $data, function($message) use ($data){
            $message->to($data['address'])
                ->cc($data['address'])
                ->subject($data['subject'])
                ->setBody($data['contents']);
            if($data['file_path'] != null){
                $message->attach(public_path().'/'.$data['file_path']);
            }
            $message->from('rootpowercontrol@gmail.com', 'ADMIN');
        });
    }

    /**
     *
     * @return location file have been save
     */
    public function attachFile($file)
    {
        if ($file != null && $file->isValid()){
            $location_file = public_path();
            $file_name = null;
            $destinationPath = 'upload/';

            $extension = $file->getClientOriginalExtension();
            $file_name = rand(111,999).$file->getClientOriginalName();
            $file->move($destinationPath, $file_name);

            return $destinationPath.$file_name;
        }
    }
}