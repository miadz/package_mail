<!-- mail NAME -->
<div class="form-group">
    <?php $mail_name = $request->get('mail_titlename') ? $request->get('mail_name') : @$mail->mail_name ?>
    {!! Form::label('Mail to: ') !!}
    {!! Form::label($name, $mail_name, trans('mail::mail_admin.name').':') !!}
    {!! Form::textarea('mail_content', null, array('rows' => '4', 'autofocus')) !!}
</div>
<!-- /mail NAME -->