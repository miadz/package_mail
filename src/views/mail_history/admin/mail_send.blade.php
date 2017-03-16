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
                        {!! !empty($mail->mail_id) ? '<i class="fa fa-pencil"></i>'.trans('mail::mail_admin.form_edit') : '<i class="fa fa-users"></i>'.trans('mail::mail_admin.form_add') !!}
                    </h3>
                </div>

                {{-- model general errors from the form --}}
                @if($errors->has('mail_name') )
                    <div class="alert alert-danger">{!! $errors->first('mail_name') !!}</div>
                @endif

                @if($errors->has('name_unvalid_length') )
                    <div class="alert alert-danger">{!! $errors->first('name_unvalid_length') !!}</div>
                @endif

                {{-- successful message --}}
                <?php $message = Session::get('message'); ?>
                @if( isset($message) )
                <div class="alert alert-success">{{$message}}</div>
                @endif

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <h4>{!! trans('mail::mail_admin.form_heading') !!}</h4>
                            {!! Form::open([
                                'route'=>['admin_mail.send'], 
                                'files'=>true, 
                                'method' => 'post'])  !!}


                            <!-- mail NAME TEXT-->
                            @include('mail::mail.elements.mail', ['name' => 'mail_name'])
                            <!-- /END mail NAME TEXT -->
                            {!! Form::hidden('id',@$mail->mail_id) !!}

                            <!-- DELETE BUTTON -->
                            <a href="{!! URL::route('admin_mail.mail_sent',['id' => @$mail->id, '_token' => csrf_token()]) !!}"
                               class="btn btn-danger pull-right margin-left-5 delete">
                                {!! trans('mail::mail_admin.cancel') !!}
                            </a>
                            <!-- DELETE BUTTON -->

                            <!-- SAVE BUTTON -->
                            {!! Form::submit('Send', array("class"=>"btn btn-info pull-right")) !!}
                            <!-- /SAVE BUTTON -->

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class='col-md-4'>
            @include('mail::mail.admin.mail_search')
        </div>

    </div>
</div>
@stop