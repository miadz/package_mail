@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('title')
Admin area: {{ trans('mail::mail_admin.page_edit') }}
@stop
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="col-md-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title bariol-thin">
                        {!! !empty($mail_contact->mail_contact_id) ? '<i class="fa fa-pencil"></i>'.trans('mail::mail_admin.form_edit') : '<i class="fa fa-users"></i>'.trans('mail::mail_admin.form_add') !!}
                    </h3>
                </div>

                <!-- ERROR -->
                {{-- model general errors from the form --}}
                @if($errors->has('mail_name') )
                    <div class="alert alert-danger">
                        {!! $errors->first('mail_name') !!}
                    </div>
                @endif

                @if($errors->has('subject_unvalid_length') )
                    <div class="alert alert-danger">
                        {!! $errors->first('subject_unvalid_length') !!}
                    </div>
                @endif

                @if($errors->has('attach_unvalid') )
                    <div class="alert alert-danger">
                        {!! $errors->first('attach_unvalid') !!}
                    </div>
                @endif
                <!-- /END ERROR -->

                <!-- MESSAGE -->
                {{-- successful message --}}
                <?php $message = Session::get('message'); ?>
                @if( isset($message) )
                    <div class="alert alert-success">
                        {{$message}}
                    </div>
                @endif
                <!-- /END MESSAGE -->

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <h4>{!! trans('mail::mail_admin.form_heading') !!}</h4>
                            {!! Form::open([
                                'route'=>['admin_mail.send'], 
                                'files'=>true, 
                                'method' => 'post'])  !!}


                            <!-- MAIL NAME TEXT-->
                            @include('mail::mail_contact.elements.mail_reply', ['name' => 'mail_contact_name'])
                            <!-- /END MAIL NAME TEXT -->
                            {!! Form::hidden('id',@$mail_contact->mail_contact_id) !!}

                            <!-- CANCEL BUTTON -->
                            <a href="{!! URL::route('admin_mail.mail_contact',['id' => @$mail_contact->mail_contact_id, '_token' => csrf_token()]) !!}"
                               class="btn btn-danger pull-right margin-left-5 delete">
                                {!! trans('mail::mail_admin.cancel') !!}
                            </a>
                            <!-- /END CANCEL BUTTON -->

                            <!-- SEND BUTTON -->
                            {!! Form::submit(trans('mail::mail_admin.send'), array("class"=>"btn btn-info pull-right")) !!}
                            <!-- /END SEND BUTTON -->

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SEARCH -->
        <div class='col-md-4'>
            @include('mail::mail.admin.mail_search')
        </div>
        <!-- /END SEARCH -->

    </div>
</div>
@stop