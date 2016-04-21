@extends('HorseAnatomy.template.login')

@section('jss')

@if(empty($tema))

<link rel="stylesheet" href="{{ asset('plugin/bootstrap/css/sandstone/bootstrap.css') }}" id="css_cambio">

@else 	

<link rel="stylesheet" href="{{ asset('plugin/bootstrap/css/' . $tema .'/bootstrap.css') }}" id="css_cambio">

@endif
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

@endsection

@section('js')

@endsection