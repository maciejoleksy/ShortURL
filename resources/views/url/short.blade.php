@extends('layout')
@section('content')
<h3>
    Generate short url
</h3>
<form action="{{ url('/short') }}" method="post">
    @csrf
    <input class="form-control w-50 mx-auto" id="longUrl" name="longUrl" type="text" placeholder="Type the link to generate...">
    <input class="form-control w-50 mx-auto mt-2" id="shortUrl" name="shortUrl" type="text" placeholder="Enter your own short link value...">
        <button class="btn btn-primary mt-2" type="submit">
            Generate
        </button>
    </input>
</form>
@endsection
