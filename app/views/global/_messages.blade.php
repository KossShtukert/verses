<?php
/**
 * Created by LIS.
 * User: Koss (karakurtkoss{at}gmail.com)
 * Date: 08.09.2014
 */
?>
@if(Session::has('error'))
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	{{ Session::get('error') }}
</div>
@endif

@if(Session::has('info'))
<div class="alert alert-info">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{ Session::get('info') }}
</div>
@endif

@if(Session::has('success'))
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{ Session::get('success') }}
</div>
@endif

@if(Session::has('warning'))
<div class="alert alert-warning">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{ Session::get('warning') }}
</div>
@endif