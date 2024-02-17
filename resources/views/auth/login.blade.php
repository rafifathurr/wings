<!DOCTYPE html>
<html lang="en">

{{-- section head --}}
@include('layouts.head')
{{-- end section head --}}

<body class="login-page">

    <!-- /.content-wrapper -->
    <div class="container">
        <div class="row justify-content-center"style="height: 100vh;">
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="m-4">
                            <center>
                                <h3><b>LOGIN</b></h3>
                            </center>
                        </div>
                        <form method="POST" action="{{ Route('auth-authenticate') }}">
                            @csrf
                            <div class="mb-4">
                                <input id="username" type="text" placeholder="Username"
                                    class="form-control @error('username') is-invalid @enderror" name="username"
                                    value="{{ old('username') }}" required autofocus>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <div class="input-group">
                                    <input id="password" type="password" placeholder="Password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required value="{{ old('password') }}">
                                    <span class="input-group-text" id="togglePassword"
                                        onclick="togglePasswordVisibility()">
                                        <i class="fas fa-eye" id="eye-icon"></i>
                                    </span>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="login-btn">
                                <button name="submit" type="submit" class="btn btn-primary btn-rounded w-100">
                                    <span><b>LOGIN</b></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    @include('layouts.script')
    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password_hash");
            var eyeIcon = document.getElementById("eye-icon");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            }
        }

        function togglePasswordVisibilityRe() {
            var passwordInput = document.getElementById("repassword");
            var eyeIcon = document.getElementById("eye-icon-re");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            }
        }
    </script>
</body>

</html>
