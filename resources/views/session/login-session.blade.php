@extends('layouts.user_type.guest')

@section('content')

    <main class="main-content mt-0">
        <section class="min-vh-100 d-flex align-items-center justify-content-center"
            style="background: url('{{ asset('assets/img/robt.jpg') }}') no-repeat center center; background-size: cover;">

            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-xl-4 col-lg-5 col-md-6">
                        <div class="card card-plain shadow-lg border-0">

                            <div class="card-header text-center bg-transparent pb-0">
                                <h3 class="text-gradient text-info font-weight-bold">Selamat Datang</h3>
                                <p class="mb-0">Silahkan login terlebih dahulu</p>
                            </div>

                            <div class="card-body">
                                {{-- Pesan sukses --}}
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                {{-- Pesan error umum --}}
                                @if (session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('error') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                {{-- Error validasi --}}
                                @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('login') }}" role="form">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" id="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                                            value="{{ old('email') }}" required autofocus>
                                    </div>

                                    <div class="mb-3 position-relative">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" id="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Password" required>
                                        <button type="button"
                                            class="btn btn-icon position-absolute top-50 end-0 translate-middle-y"
                                            style="right: 10px; margin-top: 15px;box-shadow: none;" id="togglePassword">
                                            <i class="fas fa-eye" id="eyeIcon"></i>
                                        </button>
                                    </div>


                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-info w-100">Sign In</button>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </section>
    </main>

    <script>
        // Toggle password visibility
        const togglePassword = document.getElementById('togglePassword');
        const passwordField = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        togglePassword.addEventListener('click', function () {
            // Check if password is currently hidden or visible
            const type = passwordField.type === 'password' ? 'text' : 'password';
            passwordField.type = type;

            // Change eye icon based on visibility
            eyeIcon.classList.toggle('fa-eye');
            eyeIcon.classList.toggle('fa-eye-slash');
        });
    </script>
@endsection