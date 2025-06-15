@extends('auth.layout.app')
@section('title', 'Login Page')

@section('content')
<div id="page-main" style="position: relative;">

  <!-- Loading Overlay -->
  <div
    v-if="loading"
    style="
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      background: rgba(255, 255, 255, 0.6);
      z-index: 10;
      display: flex;
      justify-content: center;
      align-items: center;
      border-radius: 8px;
    ">
    <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
      <span class="visually-hidden">Loading...</span>
    </div>
  </div>
  <!-- Alert Box -->
  <div v-if="message" class="alert" :class="messageType === 'success' ? 'alert-success' : 'alert-danger'">
    @{{ message }}
  </div>
  <form @submit.prevent="submitLogin">
    <!-- Email -->
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="text" v-model="loginForm.login" class="form-control" :class="{ 'is-invalid': errors.login }" placeholder="Email address here">
      <div class="invalid-feedback" v-if="errors.login">@{{ errors.login }}</div>
    </div>

    <!-- Password -->
    <div class="mb-3">
      <label class="form-label">Password</label>
      <input type="password" v-model="loginForm.password" class="form-control" :class="{ 'is-invalid': errors.password }" placeholder="********">
      <div class="invalid-feedback" v-if="errors.password">@{{ errors.password }}</div>
    </div>

    <!-- Remember -->
    <div class="form-check mb-3">
      <input type="checkbox" v-model="loginForm.remember" class="form-check-input" id="remember">
      <label class="form-check-label" for="remember">Remember me</label>
    </div>

    <!-- Submit -->
    <div class="d-grid">
      <button class="btn btn-primary" type="submit" :disabled="loading">
        <span v-if="loading">Logging in...</span>
        <span v-else>Sign in</span>
      </button>
    </div>

    <!-- Forgot Password -->
    <div class="mt-3 text-end">
      <a href="{{ route('forgot-password') }}">Forgot your password?</a>
    </div>
  </form>
</div>
@endsection