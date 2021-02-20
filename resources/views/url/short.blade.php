@extends('layout')
@section('content')
<h3>Generate link</h3>
<form action="{{ url('/short') }}" method="post">
    @csrf
    <input type="text" class="form-control w-50 mx-auto" name="url" id="url">
    <button type="submit" class="btn btn-primary mt-2">Short url</button>
</form>
@endsection