@extends('layout')
@section('content')
<h3 class="text-center">
    Generated link
</h3>
<input class="form-control mx-auto mt-2" type="text" value="{{ url('/' . $url->short) }}">
</input>
    <a class="btn btn-success mt-2 float-right" href="{{ url('/' . $url->short) }}" target="_blank">
        Go to page
    </a>
@endsection
