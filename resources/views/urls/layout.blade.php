@extends('layouts.simple')

@section('content')

@include ('urls._filters')

@auth
<a href="{{ route('urls.create') }}">Создать</a>
@endauth

@endsection
