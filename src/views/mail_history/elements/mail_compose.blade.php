<!-- MAIL -->
<div class="form-group">
     <?php $mail_history_subject = $request->get('mail_titlename') ? $request->get('mail_history_subject') : @$mail_history->mail_history_subject ?>

     <?php $mail_history_content = $request->get('mail_titlename') ? $request->get('mail_history_content') : @$mail_history->mail_history_content ?>

    <!-- MAIL ADDRESS -->
    {!! Form::label(trans('mail::mail_admin.mail_name').':') !!}
    {!! Form::text('mail_address', null, [
        'class' => 'form-control', 
        'placeholder' => trans('mail::mail_admin.mail_name').'', 
        'autofocus']) !!}
    <!-- /END MAIL ADDRESS -->

    <!-- SUBJECT -->
    {!! Form::label(trans('mail::mail_admin.mail_subject').':') !!}
    {!! Form::text('mail_subject', $mail_history_subject, [
        'class' => 'form-control', 
        'placeholder' => trans('mail::mail_admin.mail_subject').'']) !!}
    <!-- /END SUBJECT -->

    <!-- CONTENT -->
    {!! Form::label(trans('mail::mail_admin.mail_content').':') !!}
    {!! Form::textarea('mail_content', $mail_history_content, 
        array(
            'rows' => '4', 
            'class' => 'form-control',
            'placeholder' => trans('mail::mail_admin.mail_content'))
        ) !!}
    <!-- /END CONTENT -->

    <!-- ATTACH FILE -->
    {!! Form::label(trans('mail::mail_admin.mail_attach_file').':') !!}
    {!! Form::file('fileToUpload') !!}
    <!-- /END ATTACH FILE -->
</div>
<!-- /END MAIL -->