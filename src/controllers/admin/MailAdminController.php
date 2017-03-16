<?php namespace Foostart\Mail\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use URL;
use Route,
    Redirect;
use Foostart\Mail\Models\Mails;
use Mail;
use Illuminate\Support\Facades\Input;
use Swift_Attachment;
/**
 * Validators
 */
use Foostart\Mail\Validators\MailAdminValidator;

class MailAdminController extends Controller {

    public $data_view = array();

    private $obj_mail = NULL;
    private $obj_validator = NULL;

    public function __construct() {
        $this->obj_mail = new Mails();
    }

    /**
     *
     * @return type
     */
    public function index(Request $request) {

        $params = $request->all();

        $list_mail = $this->obj_mail->get_mails($params);

        $this->data_view = array_merge($this->data_view, array(
            'mails' => $list_mail,
            'request' => $request,
            'params' => $params
        ));
        return view('mail::mail.admin.mail_list', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function edit(Request $request) {

        $mail = NULL;
        $mail_id = (int) $request->get('id');

        if (!empty($mail_id) && (is_int($mail_id))) {
            $mail = $this->obj_mail->find($mail_id);
        }

        $this->data_view = array_merge($this->data_view, array(
            'mail' => $mail,
            'request' => $request
        ));
        return view('mail::mail.admin.mail_edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function post(Request $request) {
        $this->obj_validator = new MailAdminValidator();

        $input = $request->all();

        $mail_id = (int) $request->get('id');
        $mail = NULL;

        $data = array();

        if (!$this->obj_validator->validate($input)) {

            $data['errors'] = $this->obj_validator->getErrors();

            if (!empty($mail_id) && is_int($mail_id)) {

                $mail = $this->obj_mail->find($mail_id);
            }

        } else {
            if (!empty($mail_id) && is_int($mail_id)) {

                $mail = $this->obj_mail->find($mail_id);

                if (!empty($mail)) {

                    $input['mail_id'] = $mail_id;
                    $mail = $this->obj_mail->update_mail($input);

                    //Message
                    \Session::flash('message', trans('mail::mail_admin.message_update_successfully'));
                    return Redirect::route("admin_mail.edit", ["id" => $mail->mail_id]);
                } else {

                    //Message
                    \Session::flash('message', trans('mail::mail_admin.message_update_unsuccessfully'));
                }
            } else {

                $mail = $this->obj_mail->add_mail($input);

                if (!empty($mail)) {

                    //Message
                    \Session::flash('message', trans('mail::mail_admin.message_add_successfully'));
                    return Redirect::route("admin_mail.edit", ["id" => $mail->mail_id]);
                } else {

                    //Message
                    \Session::flash('message', trans('mail::mail_admin.message_add_unsuccessfully'));
                }
            }
        }

        $this->data_view = array_merge($this->data_view, array(
            'mail' => $mail,
            'request' => $request,
        ), $data);

        return view('mail::mail.admin.mail_edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function delete(Request $request) {

        $mail = NULL;
        $mail_id = $request->get('id');

        if (!empty($mail_id)) {
            $mail = $this->obj_mail->find($mail_id);

            if (!empty($mail)) {
                  //Message
                \Session::flash('message', trans('mail::mail_admin.message_delete_successfully'));

                $mail->delete();
            }
        } else {

        }

        $this->data_view = array_merge($this->data_view, array(
            'mail' => $mail,
        ));

        return Redirect::route("admin_mail");
    }

    // ====================================== MAIL ======================================
    /**
     *
     * @return type
     */
    public function mailPrepare(Request $request){
        $mail = NULL;
        $mail_id = (int) $request->get('id');

        if (!empty($mail_id) && (is_int($mail_id))) {
            $mail = $this->obj_mail->find($mail_id);
        }

        $this->data_view = array_merge($this->data_view, array(
            'mail' => $mail,
            'request' => $request
        ));

        return view('mail::mail.admin.mail_send', $this->data_view);
    }

    public function mailSend(Request $request){
        $mail = NULL;
        $mail_id = (int) $request->get('id');
        $mail_content = (string) $request->get('mail_content');
        $mail_address = (string) $request->get('mail_address');
        $mail_subject = (string) $request->get('mail_subject');
        //$file = Input::file('fileToUpload');

        // var_dump($mail_address);
        // var_dump($mail_subject);
        // var_dump($mail_content);
        // if($file != null){
        //     $this->attachFile($file);
        // }
        //die();

        if($mail_address == null){
            if (!empty($mail_id) && (is_int($mail_id))) {
                $mail = $this->obj_mail->find($mail_id);
            }

            $data = [
                'confirm' => 'confirm',
                'author' => 'ADMIN PACKAGE',
                'address' => $mail->mail_name,
                'contents' => $mail_content
                ];
            Mail::send(['view' => 'mail'], $data, function($message) use ($data){
                $message->to($data['address'])->cc($data['address'])
                    ->subject('Mail sent from '.$data['author'].'.')
                    ->setBody($data['contents']);
                // $message->attach($file['fileToUpload']->getRealPath(), array(
                //     'as' => $file['fileToUpload']->getClientOriginalName(), 
                //     'mime' => $file['fileToUpload']->getMimeType()));
                //$message->attach($file);
                $message->from('rootpowercontrol@gmail.com', 'ADMIN');
            });
            
            //Message
            \Session::flash('message', trans('mail::mail_admin.message_send_mail_successfully'));
            return Redirect::route("admin_mail");
        }
        else {
            $data = [
                'confirm' => 'confirm',
                'author' => 'ADMIN PACKAGE',
                'address' => $mail_address,
                'subject' => $mail_subject,
                'contents' => $mail_content
                ];
            Mail::send(['view' => 'mail'], $data, function($message) use ($data){
                $message->to($data['address'])->cc($data['address'])
                    ->subject($data['subject'])
                    ->setBody($data['contents']);
                $message->from('rootpowercontrol@gmail.com', 'ADMIN');
            });
            
            //Message
            \Session::flash('message', trans('mail::mail_admin.message_send_mail_successfully'));
            return Redirect::route("admin_mail");
        }
    }
    public function attachFile($file)
    {
        if ($file != null && $file->isValid()){
            var_dump('SS');

            $location_file = public_path();
            $file_name = null;
            $destinationPath = 'upload/';

            //$extension = Input::file($file)->getClientOriginalExtension();
            $file_name = rand(11,99);//.'.'.$extension;
            Input::file($file)->move($destinationPath, $fileName);
            
            $location_file += $destinationPath.$file_name;

            var_dump($location_file);
        }
    }
    public function mailCompose(Request $request){
        $this->data_view = array_merge($this->data_view, array(
            'request' => $request
        ));
        return view('mail::mail.admin.mail_compose', $this->data_view);
    }
    // ====================================== /END MAIL ======================================
}