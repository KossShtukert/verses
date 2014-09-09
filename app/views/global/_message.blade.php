<?php
/**
 * Created by LIS.
 * User: Koss (karakurtkoss{at}gmail.com)
 * Date: 04.09.2014
 */
?>
@section('content')
    <h4>{{ $message }}</h4>

    @if ($redirect)
        <script type="application/javascript">
            setTimeout(
                function() {
                    location.href = '{{ $redirect }}';
                },
                10000
            );
        </script>

        <hr/>

        <h4>Нажмите <a href="{{ $redirect }}">эту ссылку</a>, если ваш браузер не поддерживает автоматический редирект.</h4>
    @endif
@stop