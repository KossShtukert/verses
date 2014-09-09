<?php
/**
 * Created by LIS.
 * User: Koss (karakurtkoss{at}gmail.com)
 * Date: 28.08.2014
 */
?>
@section('content')
<h1>Регистрация</h1>

<hr/>

{{ Form::open(['url' => route('signup'), 'method' => 'post', 'autocomplete' => 'off']) }}
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="form-group">
            {{ Form::email('email', null, ['class' => 'form-control input-lg', 'required' ,'placeholder' => 'Email адрес']) }}
            {{ $errors->first('email', '<p class="help-block help-block-error">:message</span>') }}
        </div>
        <div class="form-group">
            {{ Form::password('password', ['class' => 'form-control input-lg', 'required' ,'placeholder' => 'Пароль']) }}
            {{ $errors->first('password', '<p class="help-block help-block-error">:message</span>') }}
        </div>
        <div class="form-group">
            {{ Form::password('password_confirmation', ['class' => 'form-control input-lg', 'required' ,'placeholder' => 'Повторите пароль']) }}
        </div>
        <div class="form-group">
            {{ Form::submit('Зарегистрироваться', ['class' => 'btn']) }}
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-info text-16 text-right">
        Благородные люди, друг друга любя
        <br/>
        Видят горе других, забывают себя
        <br/>
        Если чести и блеска зеркал ты желаешь
        <br/>
        Не завидуй другим &#8211; и возлюбят тебя
        <br/>
        <span class="text-muted">&laquo;Ф. Ницше&raquo;</span>
    </div>
{{ Form::close() }}
@endsection