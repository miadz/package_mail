@if( ! $mails_histories->isEmpty() )
<table class="table table-hover">
    <thead>
        <tr>
            <td style='width:5%'>{{ trans('mail::mail_admin.order') }}</td>
            <th style='width:10%'>{{ trans('mail::mail_admin.mail_id') }}</th>
            <th style='width:20%'>{{ trans('mail::mail_admin.mail_name') }}</th>
            <th style='width:10%'>{{ trans('mail::mail_admin.mail_subject') }}</th>
            <th style='width:30%'>{{ trans('mail::mail_admin.mail_content') }}</th>
            <th style='width:20%'>{{ trans('mail::mail_admin.operations') }}</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $nav = $mails_histories->toArray();
            $counter = ($nav['current_page'] - 1) * $nav['per_page'] + 1;
        ?>
        @foreach($mails_histories as $mail)
        <tr>
            <td>
                <?php echo $counter; $counter++ ?>
            </td>
            <td>{!! $mail->mail_history_id !!}</td>
            <td>{!! $mail->mail_history_name !!}</td>
            <td>{!! $mail->mail_history_subject !!}</td>
            <td>{!! $mail->mail_history_content !!}</td>
            <td>

                <!-- RESEND MAIL BUTTON -->
                <!-- <a href="{!! URL::route('admin_mail.mail_prepare',['id' =>  $mail->mail_history_id, '_token' => csrf_token()]) !!}" class="margin-left-5 delete"><i class="fa fa-repeat fa-2x"></i></a> -->
                <!-- /END RESEND MAIL BUTTON -->

                <!-- FORWARD BUTTON -->
                <a href="{!! URL::route('admin_mail.mail_forward', ['id' => $mail->mail_history_id]) !!}"><i class="fa fa-share fa-2x"></i></a>
                <!-- /END FORWARD BUTTON -->

                <!-- DELETE BUTTON -->
                <a href="{!! URL::route('admin_mail.mail_history_delete',['id' =>  $mail->mail_history_id, '_token' => csrf_token()]) !!}" class="margin-left-5 delete"><i class="fa fa-trash-o fa-2x"></i></a>
                <!-- /END DELETE BUTTON -->

                <span class="clearfix"></span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
 <span class="text-warning">
	<h5>
		{{ trans('mail::mail_admin.message_find_failed') }}
	</h5>
 </span>
@endif
<div class="paginator">
    {!! $mails_histories->appends($request->except(['page']) )->render() !!}
</div>