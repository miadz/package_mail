@if( ! $mail_contact->isEmpty() )
<table class="table table-hover">
    <thead>
        <tr>
            <td style='width:5%'>
                {{ trans('mail::mail_admin.order') }}
            </td>

            <!-- MAIL ID -->
            <th style='width:10%'>
                {{ trans('mail::mail_admin.mail_id') }}
            </th>
            <!-- /END MAIL ID -->

            <!-- MAIL NAME -->
            <th style='width:20%'>
                {{ trans('mail::mail_admin.mail_name') }}
            </th>
            <!-- /END MAIL NAME -->

            <!-- MAIL SUBJECT -->
            <th style='width:15%'>
                {{ trans('mail::mail_admin.mail_subject') }}
            </th>
            <!-- /END MAIL SUBJECT -->

            <!-- MAIL CONTENT -->
            <th style='width:30%'>
                {{ trans('mail::mail_admin.mail_content') }}
            </th>
            <!-- /END MAIL CONTENT -->

            <!-- MAIL OPERATION -->
            <th style='width:20%'>
                {{ trans('mail::mail_admin.operations') }}
            </th>
            <!-- /END MAIL OPERATION -->

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

            <!-- MAIL ID -->
            <td>
                {!! $mail->mail_contact_id !!}
            </td>
            <!-- /END MAIL ID -->

            <!-- MAIL NAME -->
            <td>
                {!! $mail->mail_contact_name !!}
            </td>
            <!-- /END MAIL NAME -->

            <!-- MAIL SUBJECT -->
            <td>
                {!! $mail->mail_contact_subject !!}
            </td>
            <!-- /END MAIL SUBJECT -->

            <!-- MAIL CONTENT -->
            <td>
                {!! substr($mail->mail_contact_content, 0, 80) !!}
            </td>
            <!-- /END MAIL CONTENT -->

            <td>

                <!-- DELETE BUTTON -->
                <a href="{!! URL::route('admin_mail.mail_contact_delete',['id' =>  $mail->mail_contact_id, '_token' => csrf_token()]) !!}" class="margin-left-5 delete"><i class="fa fa-trash-o fa-2x"></i></a>
                <!-- /END DELETE BUTTON -->

                <!-- REPLY MAIL BUTTON -->
                <a href="{!! URL::route('admin_mail.mail_contact_reply',['id' =>  $mail->mail_contact_id, '_token' => csrf_token()]) !!}" class="margin-left-5"><i class="fa fa-reply fa-2x"></i></a>
                <!-- /END REPLY MAIL BUTTON -->

                <span class="clearfix"></span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
 <span class="text-warning">
 
    <!-- MESSAGE -->
	<h5>
		{{ trans('mail::mail_admin.message_find_failed') }}
	</h5>
    <!-- /END MESSAGE -->

 </span>
@endif
<div class="paginator">
    {!! $mail_contact->appends($request->except(['page']) )->render() !!}
</div>