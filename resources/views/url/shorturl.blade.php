@extends('layout')
@section('content')
<h3>
    Generated link
</h3>
<input class="form-control w-50 mx-auto mt-2" type="text" value="{{ url('/' . $url->short) }}">
    <a class="btn btn-success mt-2" href="{{ url('/' . $url->short) }}" target="_blank">
        Go to page
    </a>
</input>
@endsection
