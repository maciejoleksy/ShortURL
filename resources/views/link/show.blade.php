@extends('layout')
@section('content')
<h3 class="text-center">
    Generated link
</h3>
<input class="form-control mx-auto mt-2" type="text" value="{{ url('/' . $link->short_name) }}">
</input>
    <a class="btn btn-success mt-2 float-right" href="{{ url('/' . $link->short_name) }}" target="_blank">
        Go to page
    </a>
@endsection
