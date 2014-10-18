<?php
/**
 * Created by LIS.
 * User: Koss (karakurtkoss{at}gmail.com)
 * Date: 27.08.2014
 */
 ?>
@section('content')
<h1>Вход на сайт</h1>

<hr/>

{{ Form::open(['url' => route('signin'), 'method' => 'post', 'autocomplete' => 'off']) }}
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="form-group">
            {{ Form::email('email', null, ['class' => 'form-control input-lg', 'required', 'autofocus', 'placeholder' => 'Email адрес']) }}
            {{ $errors->first('email', '<p class="help-block help-block-error">:message</p>') }}
        </div>
        <div class="form-group">
            {{ Form::password('password', ['class' => 'form-control input-lg', 'required', 'placeholder' => 'Пароль']) }}
            {{ $errors->first('password', '<p class="help-block help-block-error">:message</p>') }}
        </div>
        <div class="form-group checkbox">
            <label class="checkbox text-16">
                <input type="checkbox" name="remember" value="remember-me"> Запомнить меня
            </label>
        </div>
        <div class="form-group">
            {{ Form::submit('Войти', ['class' => 'btn btn-inline']) }}
            {{ link_to_route('remind', '?', null, ['class' => 'btn btn-remember btn-inline hint-tooltip', 'data-placement' => 'right', 'title' => 'Я забыл пароль :(']) }}
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