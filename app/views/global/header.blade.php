{{--
 Author: Koss (karakurtkoss{at}gmail.com)
 Date: 03.09.2014
--}}
<header>
    @include('global._messages')
	<div class="navbar navbar-default navbar-static-top" role="navigation">
	    <div class="navbar-header">
	       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<h1><a class="navbar-brand" href="{{ route('home') }}">Verses</a></h1>
	    </div>
	    @include('global._account')
	</div>
</header>