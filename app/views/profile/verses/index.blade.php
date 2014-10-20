{{--
  Created by Koss
  Email: karakurtkoss{at}gmail.com
  Date: 21.10.2014
--}}
@section('content')
<h2>
	Мои стихи
	<div class="pull-right">
		{{ link_to_route('profile_create_verse', 'Написать стих', [$user->getNicknameOrId()], ['class' => 'btn btn-link btn-sm']) }}
	</div>
</h2>

<hr/>

<table class="table table-bordered table-hover table-condensed">
	<thead>
		<tr>
			<th class="col-xs-3 col-sm-3 col-md-3 col-lg-3">Имя</th>
			<th class="col-xs-7 col-sm-7 col-md-7 col-lg-7">Текст</th>
			<th class="col-xs-2 col-sm-2 col-md-2 col-lg-2">Создан</th>
		</tr>
	</thead>
	<tbody>
		@each('profile.verses._item', $verses, 'verse', 'global._item_not_found')
	</tbody>
</table>
@endsection