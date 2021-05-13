@extends('layout')
@section('content')
<h3 class="text-center">
    Generate short url
</h3>
<form action="{{ url('/store') }}" method="post">
    <div class="alerts">
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
        </div>
    @endif
</div>
    @csrf
    <input class="form-control mx-auto" id="longUrl" name="longUrl" type="text" placeholder="Type the link to generate..." value="{{old('longUrl')}}">
    <input class="form-control mx-auto mt-2" id="shortUrl" name="shortUrl" type="text" placeholder="Enter your own short link value..." value="{{old('shortUrl')}}">
        <button class="btn btn-primary mt-2" type="submit">
            Generate
        </button>
    </input>
</form>
@endsection
