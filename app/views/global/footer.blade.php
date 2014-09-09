<?php
/**
 * Created by LIS.
 * User: Koss (karakurtkoss{at}gmail.com)
 * Date: 03.09.2014
 */
 ?>
 <footer>
&copy {{ date('Y') }}  Copyright Koss Shtukert. All rights reserved under national and international copyright laws.

{{ HTML::script('//code.jquery.com/jquery-2.1.1.min.js') }}
{{ HTML::script('//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js') }}
{{ HTML::script('/js/main.js') }}

@section('js')
@show
 </footer>