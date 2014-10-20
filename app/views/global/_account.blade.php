{{--
 Author: Koss (karakurtkoss{at}gmail.com)
 Date: 03.09.2014
--}}
<div class="collapse navbar-collapse">
    <ul class="nav navbar-nav navbar-right">
	    @if (!Auth::check())
	        <li>
				<a href="{{ route('signup') }}" class="hint-tooltip" title="Регистрация" data-placement="bottom">
					<i class="fa fa-pencil fa-2x"></i>
				</a>
			</li>
	        <li>
	            <a href="{{ route('signin') }}" class="hint-tooltip " title="Вход" data-placement="bottom">
	                <i class="fa fa-lock fa-2x"></i>
            	</a>
            </li>
		@else
	        <li class="dropdown hint-tooltip" title="Написать стих" data-placement="left">
	            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	                <i class="fa fa-plus fa-2x"></i>
	            </a>
	            <ul class="dropdown-menu text-left" role="menu">
	                <li>
	                    {{ Form::textarea('verse', null, ['class' => 'form-control']) }}
	                </li>
	                <li><a href="#"><span class="fa fa-list pull-right"></span> Add or remove from a list  </a></li>
	                <li class="divider"></li>
	                <li><a href="#"><span class="fa fa-warning pull-right"></span>Report this user for spam</a></li>
	                <li class="divider"></li>
	                <li><a href="#" class="btn disabled" role="button"> Unfollow </a></li>
	            </ul>
	        </li>
	        <li class="dropdown">
	             <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	                <i class="fa fa-user fa-2x"></i>
	            </a>
	            <ul class="dropdown-menu" role="menu">
	                <li class="text-right">
	                    <a href="{{ route('profile', Auth::getUser()->getNicknameOrId()) }}" class="btn-link text-18">
	                        Мой профиль
	                        <i class="fa fa-briefcase"></i>
	                    </a>
	                </li>
	                <li class="text-right">
	                    <a href="{{ route('profile_verses', Auth::getUser()->getNicknameOrId()) }}" class="btn-link text-18">
                            Мои стихи
                            <i class="fa fa-book"></i>
                        </a>
	                </li>
	                <li class="divider"></li>
	                <li class="text-right">
	                    <a href="{{ route('logout') }}" class="btn-link text-18">
	                        Выход
	                        <i class="fa fa-sign-out"></i>
	                    </a>
	                </li>
	            </ul>
	        </li>
	    @endif
    </ul>
</div>