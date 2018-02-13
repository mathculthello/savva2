@extends('urls.layout')


@section('content')

<form action="{{ route('urls.store')}}" method="POST">
@csrf
@method('POST')
<input name="url" value="">
<input type="submit" value="Create">
</form>
@endsection
