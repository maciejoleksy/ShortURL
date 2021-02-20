@extends('layout')
@section('content')
<h3>Generated link</h3>
<a href={{ url('/short/' . $url->short) }} target="_blank" class="btn btn-success">./short/{{ $url->short }}</a>
<input type="text" class="form-control w-50 mx-auto mt-2" value="{{url()->current()}}/{{ $url->short }}">
@endsection