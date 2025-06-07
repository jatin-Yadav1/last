@extends('auth.layout.app')
@section('title', 'Our Services')

@section('content')
@extends('auth.layout.app')
@section('title', 'Our Services')

@section('content')
<form>
    <!-- Email -->
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" class="form-control" name="email" placeholder="Enter Your Email" required="" />
    </div>
    <!-- Button -->
    <div class="mb-3 d-grid">
        <button type="submit" class="btn btn-primary">Reset Password</button>
    </div>
    <span>
        Don't have an account?
        <a href="{{route('login')}}">sign in</a>
    </span>
</form>
@endsection
@endsection