<x-auth-layout>
    <!-- Outer Row -->
    <div class="row justify-content-center align-items-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6 py-5">
                            <div class="p-5">
                                <div class="text-center">
                                    {{-- <h1 class="h4 text-gray-900 mb-4">Namina Resto</h1> --}}
                                    <img class="img-fluid rounded mb-5 w-75"
                                        src="{{ asset('img/namina-logo-landscape.png') }}" alt="">
                                </div>

                                <form class="user" action="{{ route('login') }}" method="POST">
                                    @csrf

                                    <div class="form-group">
                                        <input
                                            class="form-control form-control-user @error('username') is-invalid @enderror"
                                            id="username" name="username" type="text" value="{{ old('username') }}"
                                            aria-describedby="username" placeholder="Username">

                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input
                                            class="form-control form-control-user @error('password') is-invalid @enderror"
                                            id="password" name="password" type="password" value="{{ old('password') }}"
                                            aria-describedby="password" placeholder="Password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input class="custom-control-input" id="customCheck" name="remember"
                                                type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="customCheck">Remember
                                                Me</label>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-user btn-block" type="submit">
                                        Login
                                    </button>
                                    {{-- <div class="text-center mt-2">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div> --}}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</x-auth-layout>
