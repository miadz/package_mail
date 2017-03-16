<?php namespace Foostart\Mail\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use URL;
use Route,
    Redirect;
use Foostart\Mail\Models\MailsHistories;

class MailHistoryAdminController extends Controller {

	public $data_view = array();

    private $obj_mail_history = NULL;

    public function __construct() {
        $this->obj_mail_history = new MailsHistories();
    }

    /**
     *
     * @return type
     */
    public function index(Request $request) {

        $params = $request->all();

        $list_mail_history = $this->obj_mail_history->get_mail_history($params);

        $this->data_view = array_merge($this->data_view, array(
            'mails_histories' => $list_mail_history,
            'request' => $request,
            'params' => $params
        ));
        return view('mail::mail_history.admin.mail_history_list', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function delete(Request $request) {

        $mail_history = NULL;
        $mail_history_id = $request->get('id');

        if (!empty($mail_history_id)) {
            $mail_history = $this->obj_mail_history->find($mail_history_id);

            if (!empty($mail_history)) {
                  //Message
                \Session::flash('message', trans('mail::mail_admin.message_delete_successfully'));

                $mail_history->delete();
            }
        } else {

        }

        $this->data_view = array_merge($this->data_view, array(
            'mails_histories' => $mail_history,
        ));

        return Redirect::route("admin_mail.mail_sent");
    }

    public function mailForward(Request $request){

        $mail_history = NULL;
        $mail_history_id = (int) $request->get('id');

        if (!empty($mail_history_id) && (is_int($mail_history_id))) {
            $mail_history = $this->obj_mail_history->find($mail_history_id);
        }

        $this->data_view = array_merge($this->data_view, array(
            'mail_history' => $mail_history,
            'request' => $request
        ));

        return view('mail::mail_history.admin.mail_history_forward', $this->data_view);
    }
}