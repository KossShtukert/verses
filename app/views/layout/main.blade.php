{{--
 Author: Koss (karakurtkoss{at}gmail.com)
 Date: 03.09.2014
--}}
<!doctype html>
<html lang="<?= App::getLocale(); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>
            {{ $title or 'Verses &middot; My internal World' }}
        </title>

        {{ HTML::style('//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css', ['media' => 'screen']) }}
        {{ HTML::style('http://fonts.googleapis.com/css?family=Open+Sans|Oswald,ver=1.1.0|Philosopher:400,700,400italic,700italic|Marck+Script&subset=latin,cyrillic,latin-ext', ['media' => 'screen']) }}
        {{ HTML::style('//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css', ['media' => 'screen']) }}

        {{ HTML::style('/css/main.css') }}

        @section('css')
        @show

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        {{ HTML::script('https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js') }}
        {{ HTML::script('https://oss.maxcdn.com/respond/1.4.2/respond.min.js') }}
        <![endif]-->
    </head>
    <body>
        @include('global.header')

        <section class="container">
            @yield('content')
        </section>

        @include('global.footer')
    </body>
</html>