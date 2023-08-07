@extends('layout.default')


@section('title')
    Login 
@endsection


@section('content')
    <form action="{{ url('login') }}" method="POST">
        @csrf
        <h1>Login</h1>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input class="form-control" type="text" name="email" placeholder="Enter title" required />
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <textarea class="form-control" type="text" name="password" placeholder="Enter body" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>

    @include('components.errors')
    @include('components.status')
@endsection
