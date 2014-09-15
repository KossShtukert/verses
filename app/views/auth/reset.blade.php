<?php
/**
 * Created by LIS.
 * User: Koss (karakurtkoss{at}gmail.com)
 * Date: 03.09.2014
 */
?>
@section('content')
<h1>Сброс пароля</h1>

<hr/>

{{ Form::open(['url' => route('reset'), 'method' => 'post', 'autocomplete' => 'off']) }}
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="form-group">
            {{ Form::email('email', null, ['class' => 'form-control input-lg', 'required', 'autofocus', 'placeholder' => 'Email адрес']) }}
            {{ $errors->first('email', '<p class="help-block help-block-error">:message</p>') }}
        </div>
        <div class="form-group">
            {{ Form::password('password', ['class' => 'form-control input-lg', 'required' ,'placeholder' => 'Пароль']) }}
            {{ $errors->first('password', '<p class="help-block help-block-error">:message</p>') }}
        </div>
        <div class="form-group">
            {{ Form::password('password_confirmation',['class' => 'form-control input-lg', 'required' ,'placeholder' => 'Повторите пароль']) }}
        </div>
        <div class="form-group">
            {{ Form::hidden('token', $token) }}

            {{ Form::submit('Сбросить пароль', ['class' => 'btn btn-inline']) }}
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-info text-16 text-right">
            Пути нехоженые &#8211; смелому награда
            <br/>
            Путь не бывает без преград.
            <br/>
            В уме преграда...
            <br/>
            <span class="text-muted">&laquo;Ф. Ницше&raquo;</span>
        </div>
{{ Form::close() }}
@endsection