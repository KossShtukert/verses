{{--
 Author: Koss (karakurtkoss{at}gmail.com)
 Date: 03.09.2014
--}}
@section('content')

@if ($user == Auth::getUser())
    @include('profile._edit_form')
@else
    @include('profile._view_form')
@endif

@endsection