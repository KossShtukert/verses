{{--
  Created by Koss
  Email: karakurtkoss{at}gmail.com
  Date: 20.10.2014
--}}
@section('content')
<h2>
	Создание стиха
	<div class="pull-right">
		{{ link_to_route('user/verse', 'Мои стихи', [$user->getNicknameOrId()], ['class' => 'btn btn-link btn-sm']) }}
	</div>
</h2>

<hr/>

{{ Form::open(['route' => ['user/verse/create', $user->getNicknameOrId()]]) }}
	<div class="form-group">
		{{ Form::label('name', 'Название') }}
		{{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Введите название стиха', 'pattern' => '.{3,}',  'required']) }}
		<p class="help-block">Минимум 3 буквы</p>
	</div>
	<div class="form-group">
        {{ Form::label('text', 'Содержание') }}
        {{ Form::textarea('text', null, ['class' => 'form-control', 'placeholder' => 'Введите содержание стиха', 'pattern' => '.{10,}', 'required']) }}
        <p class="help-block">Минимум 10 букв</p>
    </div>
    {{ Form::submit('Создать', ['class' => 'btn btn-link']) }}
{{ Form::close() }}
@endsection