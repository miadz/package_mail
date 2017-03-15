<?php namespace Foostart\Mail\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use URL;
use Route,
    Redirect;
use Foostart\Mail\Models\Mails;
use Mail;
use Illuminate\Http\Response;
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
            $message->from('rootpowercontrol@gmail.com');
        });
        
        //Message
        \Session::flash('message', trans('mail::mail_admin.message_send_mail_successfully'));
        return Redirect::route("admin_mail");
    }
    public function merge(array $input)
    {
        $this->getInputSource()->add($input);
    }
}