@if( ! $mail_contact->isEmpty() )
<table class="table table-hover">
    <thead>
        <tr>
            <td style='width:5%'>{{ trans('mail::mail_admin.order') }}</td>
            <th style='width:10%'>{{ trans('mail::mail_admin.mail_id') }}</th>
            <th style='width:20%'>{{ trans('mail::mail_admin.mail_name') }}</th>
            <th style='width:15%'>{{ trans('mail::mail_admin.mail_subject') }}</th>
            <th style='width:30%'>{{ trans('mail::mail_admin.mail_content') }}</th>
            <th style='width:20%'>{{ trans('mail::mail_admin.operations') }}</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $nav = $mail_contact->toArray();
            $counter = ($nav['current_page'] - 1) * $nav['per_page'] + 1;
        ?>
        @foreach($mail_contact as $mail)
        <tr>
            <td>
                <?php echo $counter; $counter++ ?>
            </td>
            <td>{!! $mail->mail_contact_id !!}</td>
            <td>{!! $mail->mail_contact_name !!}</td>
            <td>{!! $mail->mail_contact_subject !!}</td>
            <td>{!! $mail->mail_contact_content !!}</td>
            <td>

                <!-- DELETE BUTTON -->
                <a href="{!! URL::route('admin_mail.mail_contact_delete',['id' =>  $mail->mail_contact_id, '_token' => csrf_token()]) !!}" class="margin-left-5 delete"><i class="fa fa-trash-o fa-2x"></i></a>
                <!-- /END DELETE BUTTON -->

                <!-- REPLY MAIL BUTTON -->
                <a href="{!! URL::route('admin_mail.mail_contact_reply',['id' =>  $mail->mail_contact_id, '_token' => csrf_token()]) !!}" class="margin-left-5 delete"><i class="fa fa-reply fa-2x"></i></a>
                <!-- /END REPLY MAIL BUTTON -->

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
    {!! $mail_contact->appends($request->except(['page']) )->render() !!}
</div>