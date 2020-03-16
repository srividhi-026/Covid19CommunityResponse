@include('layout.header')

    <main role="main" class="auth-view">

        <div class="auth-form-container">

            <div class="auth-form">

                <div class="col-12 text-center">

                    <h1>Register</h1>

                </div>

                <br>

                <div>

                    <form method="POST" action="{{ url('do_register') }}" class="needs-validation" novalidate>

                        @csrf

                        <div class="form-group">

                            <div class="input-icons">

                                <i class="far fa-envelope icon"></i>

                                <input type="email" class="form-control form-control-lg input-field" name="email" id="email" placeholder="Email" value="" aria-label="email" required autofocus>

                                <div class="valid-feedback">

                                </div>

                                <div class="invalid-feedback">

                                    Email address required!

                                </div>

                            </div>

                            <span class="text-danger">{{ $errors->first('email') }}</span>

                        </div>

                        <br>

                        <div class="form-group text-center auth-submit">

                            <button type="submit" class="btn btn-block main-btn">Register</button>

                        </div>

                    </form>

                    <p class="text-center">

                        Already have an account? <a href="{{ url('login') }}">Login</a>

                    </p>

                </div>

            </div>

        </div>

    </main>

@include('layout.footer')
