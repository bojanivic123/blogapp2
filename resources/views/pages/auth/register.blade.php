@extends("layout.default")


@section('title')
    Register
@endsection


@section('content')
    <form action="{{ url('register') }}" method="POST">
        @csrf
        <h1>Register</h1>
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input class="form-control" type="text" name="name" placeholder="Enter title" required />
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <textarea class="form-control" type="text" name="email" placeholder="Enter body" required></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <textarea class="form-control" type="text" name="password" placeholder="Enter body" required></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Confirm password</label>
            <textarea class="form-control" type="text" name="password_confirmation" placeholder="Enter body" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>

    @include('components.errors')
    @include('components.status')
@endsection
