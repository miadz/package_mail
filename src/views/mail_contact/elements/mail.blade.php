<!-- MAIL -->
<div class="form-group">
    <?php $mail_contact_name = $request->get('mail_titlename') ? $request->get('mail_contact_name') : @$mail_contact->mail_contact_name ?>

    <?php $mail_contact_subject = $request->get('mail_titlename') ? $request->get('mail_contact_subject') : @$mail_contact->mail_contact_subject ?>

    <?php $mail_contact_content = $request->get('mail_titlename') ? $request->get('mail_contact_content') : @$mail_contact->mail_contact_content ?>

    <!-- MAIL ADDRESS -->
    {!! Form::label('Mail to: ') !!}
    {!! Form::label($name, $mail_contact_name, trans('mail::mail_admin.name').':') !!}
    {!! Form::hidden('mail_address', $mail_contact_name) !!}
    <!-- /END MAIL ADDRESS -->
    <br>
    <!-- SUBJECT -->
    {!! Form::label(trans('mail::mail_admin.mail_subject').':') !!}
    {!! Form::text('mail_subject', null, [
        'class' => 'form-control', 
        'placeholder' => trans('mail::mail_admin.mail_subject').'', 
        'autofocus']) !!}
    <!-- /END SUBJECT -->

    <!-- CONTENT -->
    {!! Form::label(trans('mail::mail_admin.mail_content').':') !!}
    {!! Form::textarea('mail_content', 'Reply about "'.$mail_contact_subject.'" with content "'.$mail_contact_content.'"', 
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