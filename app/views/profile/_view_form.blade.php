<?php
/**
 * Created by LIS.
 * User: Koss (karakurtkoss{at}gmail.com)
 * Date: 08.09.2014
 */
?>
<h1>{{ 'Профиль ' . $user->name() }}</h1>

<hr/>

<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 profile">
    <div class="form-group">
        <label>Email</label>
        <span class="info-input">{{ $user->email }}</span>
    </div>
    <div class="form-group {{ $user->first_name ? '' : 'hidden' }}">
        <label>Имя</label>
        <span class="info-input">{{ $user->first_name }}</span>
    </div>
    <div class="form-group {{ $user->last_name ? '' : 'hidden' }}">
        <label>Фамилия</label>
        <span class="info-input">{{ $user->last_name }}</span>
    </div>
    <div class="form-group {{ $user->nick_name ? '' : 'hidden' }}">
        <label>Сценическое имя (nickname)</label>
        <span class="info-input">{{ $user->nick_name }}</span>
    </div>
    <div class="form-group {{ $user->birthday ? '' : 'hidden' }}">
        <label>Дата рождения</label>
        <span class="info-input">{{ $user->birthday }}</span>
    </div>
    <div class="form-group {{ $user->gender ? '' : 'hidden' }}">
        <label>Пол</label>
        <span class="info-input">{{ $user->gender == 'male' ? 'М' : 'Ж' }}</span>
    </div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 profile">
    <div class="form-group {{ $user->about ? '' : 'hidden' }}">
        <label>О себе</label>
        <br/>
        <span class="info-input">{{ $user->about }}</span>
    </div>
</div>