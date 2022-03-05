@extends('auth.layout')

@section('content')
<div class="row">
    <div class="col-6 offset-3">
        <form action="{{ route('register-user') }}" method="POST">
            @if(Session::has('success'))
            <div class="alert alert-success mt-3">{{ Session::get('success') }}</div>
            @endif
            @if(Session::has('failed'))
            <div class="alert alert-danger mt-3">{{ Session::get('failed') }}</div>
            @endif
            @csrf
            <div class="mt-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                <span class="text-danger">@error('name') {{ $message }} @enderror</span>
            </div>
            <div class="mt-3">
                <label class="form-label">Email address</label>
                <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                <span class="text-danger">@error('email') {{ $message }} @enderror</span>
            </div>
            <div class="mt-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
                <span class="text-danger">@error('password') {{ $message }} @enderror</span>
            </div>
            <button type="submit" class="btn btn-primary mt-3 float-end">Submit</button>
            <br>
            <a href="login">Login here</a>
        </form>
    </div>
</div>
@endsection