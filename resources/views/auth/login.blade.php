@extends("layouts.app")

@section("content")
<div class="container">
    <div class="row justify-content-center min-vh-100 align-items-center">
        <div class="col-md-5">
            <div class="card shadow-lg border-0 rounded-4 p-4 bg-white">
                <!-- Logo dengan animasi hover -->
                <div class="mx-auto text-center mb-4 logo-container">
                    <img src="{{ asset('logo.png') }}" height="60" class="d-inline-block logo-hover" alt="Logo" />
                </div>

                <!-- Alert Error -->
                @if(session()->has("error"))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session("error") }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card-body">
                    <h4 class="text-center mb-4 fw-bold text-success">Welcome Back!</h4>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        <div class="form-floating mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                name="email" value="{{ old('email') }}" placeholder="Email Address" required>
                            <label for="email">Email Address</label>
                            @error("email")
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                name="password" placeholder="Password" required>
                            <label for="password">Password</label>
                            @error("password")
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" 
                                    {{ old("remember") ? "checked" : "" }}>
                                <label class="form-check-label" for="remember">Remember Me</label>
                            </div>
                            @if(Route::has("password.request"))
                                <a class="text-decoration-none text-success" href="{{ route('password.request') }}">
                                    Forgot Password?
                                </a>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-success w-100 py-2 mb-3 rounded-3">
                            Sign In
                        </button>

                        <div class="text-center">
                            <p class="mb-0">Don't have an account? 
                                <a href="{{ route('register') }}" class="fw-bold text-decoration-none text-success">
                                    Register Here
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.logo-hover {
    transition: transform 0.3s ease;
}
.logo-hover:hover {
    transform: scale(1.1);
}
.form-floating input:focus {
    border-color: #198754;
    box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.25);
}
.btn-success {
    transition: all 0.3s ease;
}
.btn-success:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(25, 135, 84, 0.3);
}
</style>
@endsection
