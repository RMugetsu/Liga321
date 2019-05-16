@extends('layouts.app')
<html>
<head>
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/moment.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/calendario.js') }}"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
@section('content')
<div class="container">
<a class="btn" href="/calendario">click</a>

<!--<a class="btn" href="/Calendario">CALENDARIO</a>-->
</div>
</body>
@endsection
</html>