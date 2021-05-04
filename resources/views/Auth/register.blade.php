@extends('themes.Auth.authLayout')

@section('title', 'Reeducando | Registrar')
@section('content')
    <!-- Start Register Area -->
    <div class="register-area bg-image">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="register-form">
                    <div class="logo">
                        <a href="dashboard-analytics.html"><img src="assets/img/logo.png" alt="image"></a>
                    </div>

                    <h2>Register</h2>

                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Name">
                            <span class="label-title"><i class='bx bx-user'></i></span>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Email">
                            <span class="label-title"><i class='bx bx-envelope'></i></span>
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                            <span class="label-title"><i class='bx bx-lock'></i></span>
                        </div>

                        <div class="form-group">
                            <div class="terms-conditions">
                                <label class="checkbox-box">I accept <a href="#">Terms and Conditions</a>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="register-btn">Sign Up</button>

                        <p class="mb-0">Already have account? <a href="login-with-image.html">Sign In</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Register Area -->
@endsection
