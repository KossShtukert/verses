<?php
/**
 * Created by LIS.
 * User: Koss (karakurtkoss{at}gmail.com)
 * Date: 03.09.2014
 */
 ?>
<div class="col-xs-5 col-sm-6 col-md-6 col-lg-5 account">
    @if (!Auth::check())
        {{ link_to_route('signup', 'Хочу начать писать стихи', null, ['class' => 'btn btn-reg']) }}
        {{ link_to_route('signin', 'У меня есть аккаунт', null, ['class' => 'btn btn-sign']) }}
    @else
        <div class="btn-group pull-right btn-account">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                Привет, {{ Auth::getUser()->name() }}
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li class="text-right">
                    {{ link_to_route('profile', 'Мой профиль', [Auth::getUser()->getNicknameOrId()]) }}
                    {{ link_to_route('profile_verses', 'Мои стихи', [Auth::getUser()->getNicknameOrId()]) }}
                </li>
                <li class="divider"></li>
                <li class="text-right">
                {{ link_to_route('logout', 'Выход', null, ['class' => 'btn-link']) }}
                </li>
            </ul>
        </div>
    @endif
</div>