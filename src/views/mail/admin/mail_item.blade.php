<!--ADD MAIL-->
<div class="row margin-bottom-12">
    <div class="col-md-12">
        <a href="{!! URL::route('admin_mail.edit') !!}" class="btn btn-info pull-right">
            <i class="fa fa-plus"></i>{{trans('mail::mail_admin.page_add')}}
        </a>
    </div>
</div>
<!--/END ADD MAIL-->

@if( ! $mails->isEmpty() )
<table class="table table-hover">
    <thead>
        <tr>
            <td style='width:5%'>{{ trans('mail::mail_admin.order') }}</td>
            <th style='width:10%'>{{ trans('mail::mail_admin.mail_id') }}</th>
            <th style='width:50%'>{{ trans('mail::mail_admin.mail_name') }}</th>
            <th style='width:20%'>{{ trans('mail::mail_admin.operations') }}</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $nav = $mails->toArray();
            $counter = ($nav['current_page'] - 1) * $nav['per_page'] + 1;
        ?>
        @foreach($mails as $mail)
        <tr>
            <td>
                <?php echo $counter; $counter++ ?>
            </td>
            <td>{!! $mail->mail_id !!}</td>
            <td>{!! $mail->mail_name !!}</td>
            <td>
                <!-- EDIT BUTTON -->
                <a href="{!! URL::route('admin_mail.edit', ['id' => $mail->mail_id]) !!}"><i class="fa fa-edit fa-2x"></i></a>
                <!-- /END EDIT BUTTON -->

                <!-- DELETE BUTTON -->
                <a href="{!! URL::route('admin_mail.delete',['id' =>  $mail->mail_id, '_token' => csrf_token()]) !!}" class="margin-left-5 delete"><i class="fa fa-trash-o fa-2x"></i></a>
                <!-- /END DELETE BUTTON -->

                <!-- SEND MAIL BUTTON -->
                <a href="{!! URL::route('admin_mail.mail_prepare',['id' =>  $mail->mail_id, '_token' => csrf_token()]) !!}" class="margin-left-5"><i class="fa fa-envelope-o fa-2x"></i></a>
                <!-- /END SEND MAIL BUTTON -->

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
    {!! $mails->appends($request->except(['page']) )->render() !!}
</div>