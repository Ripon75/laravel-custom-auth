@extends('auth.layout')

@section('content')
<div class="row">
    <div class="col-6 offset-3">
        <form action="{{ route('login-user') }}" method="POST">
            @if(Session::has('success'))
            <div class="alert alert-success mt-3">{{ Session::get('success') }}</div>
            @endif
            @if(Session::has('failed'))
            <div class="alert alert-danger mt-3">{{ Session::get('failed') }}</div>
            @endif
            @csrf
            <div class="mt-3">
                <label class="form-label">Email address</label>
                <input type="text" name="email" value="{{ old('email') }}" class="form-control">
                <span class="text-danger">@error('email') {{ $message }} @enderror</span>
            </div>
            <div class="mt-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
                <span class="text-danger">@error('password') {{ $message }} @enderror</span>
            </div>
            <button type="submit" class="btn btn-primary mt-3 float-end">Submit</button>
            <br>
            <a href="registration">Registraion here</a>
        </form>
    </div>
</div>
@endsection