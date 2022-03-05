@extends('auth.layout')

@section('content')
<div class="row">
    <div class="col-6 offset-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="logout">Logout</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection