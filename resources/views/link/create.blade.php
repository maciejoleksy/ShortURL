@extends('layout')
@section('content')
<h3 class="text-center">
    Generate short link
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
    <input class="form-control mx-auto" id="link" name="link" type="text" placeholder="Type the link to generate..." value="{{old('link')}}">
    <input class="form-control mx-auto mt-2" id="shortName" name="shortName" type="text" placeholder="Enter your own short link value, if empty generate random..." value="{{old('shortName')}}">
        <button class="btn btn-primary mt-2" type="submit">
            Generate
        </button>
    </input>
</form>
@endsection
