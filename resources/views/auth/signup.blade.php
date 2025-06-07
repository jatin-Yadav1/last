@extends('auth.layout.app')
@section('title', 'Our Services')

@section('content')
<form>
    <!-- Username -->
    <div class="mb-3">
        <label for="username" class="form-label">User Name</label>
        <input type="text" id="username" class="form-control" name="username" placeholder="User Name" required="" />
    </div>
    <!-- Email -->
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" class="form-control" name="email" placeholder="Email address here" required="" />
    </div>
    <!-- Password -->
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" id="password" class="form-control" name="password" placeholder="**************" required="" />
    </div>
    <!-- Password -->
    <div class="mb-3">
        <label for="confirm-password" class="form-label">Confirm Password</label>
        <input type="password" id="confirm-password" class="form-control" name="password" placeholder="**************" required="" />
    </div>
    <!-- Checkbox -->
    <div class="mb-3">
        <div class="form-check custom-checkbox">
            <input type="checkbox" class="form-check-input" id="agreeCheck" />
            <label class="form-check-label" for="agreeCheck">
                <span class="fs-5">
                    I agree to the
                    <a href="#">Terms of Service</a>
                    and
                    <a href="#">Privacy Policy.</a>
                </span>
            </label>
        </div>
    </div>
    <div>
        <!-- Button -->
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Create Free Account</button>
        </div>

        <div class="d-md-flex justify-content-between mt-4">
            <div class="mb-2 mb-md-0">
                <a href="{{route('login')}}" class="fs-5">Already member? Login</a>
            </div>
            <div>
                <a href="{{route('forgot-password')}}" class="text-inherit fs-5">Forgot your password?</a>
            </div>
        </div>
    </div>
</form>
@endsection