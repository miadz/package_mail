<!-- MAIL -->
<div class="form-group">
    <!-- MAIL ADDRESS -->
    {!! Form::label(trans('mail::mail_admin.mail_name').':') !!}
    {!! Form::text('mail_address', null, [
        'class' => 'form-control', 
        'placeholder' => trans('mail::mail_admin.mail_name').'', 
        'autofocus']) !!}
    <!-- /END MAIL ADDRESS -->

    <!-- SUBJECT -->
    {!! Form::label(trans('mail::mail_admin.mail_subject').':') !!}
    {!! Form::text('mail_subject', null, [
        'class' => 'form-control', 
        'placeholder' => trans('mail::mail_admin.mail_subject').'']) !!}
    <!-- /END SUBJECT -->

    <!-- CONTENT -->
    {!! Form::label(trans('mail::mail_admin.mail_content').':') !!}
    {!! Form::textarea('mail_content', null, 
        array(
            'rows' => '4', 
            'cols' => '75', 
            'width' => '100%', 
            'placeholder' => trans('mail::mail_admin.mail_content'))
        ) !!}
    <!-- /END CONTENT -->

    <!-- ATTACH FILE -->
    {!! Form::label(trans('mail::mail_admin.mail_attach_file').':') !!}
    {!! Form::file('fileToUpload') !!}
    <!-- /END ATTACH FILE -->
</div>
<!-- /END MAIL -->