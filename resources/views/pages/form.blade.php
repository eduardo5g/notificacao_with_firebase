<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Pills navs -->
    <div class="d-flex justify-content-center ">

        <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="tab-login" data-mdb-pill-init href="#pills-login" role="tab"
                    aria-controls="pills-login" aria-selected="true">Login</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="tab-register" data-mdb-pill-init href="#pills-register" role="tab"
                    aria-controls="pills-register" aria-selected="false">Register</a>
            </li>
        </ul>
    </div>
    <!-- Pills navs -->

    <!-- Pills content -->
    <div class="tab-content d-flex justify-content-center">
        <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
            <form method="POST" action="{{ route('subscribe') }}">
                @csrf
                <!-- CPF input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label text-light" for="user_id">user_id</label>
                    <input type="text" id="user_id" name="user_id" value="{{ old('user_id') }}" class="form-control"   required autofocus autocomplete="user_id" />
                </div>

                <!-- Password input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label text-light" for="public_key">public_key</label>
                    <input type="text" id="public_key" class="form-control" name="public_key" value="UeeXa3EuOg3nTOopmCjlTfcsdbItthRgrnpyAA22tBo" required autocomplete="public_key" />
                </div>

                <!-- Password input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label text-light" for="public_key">endpoint</label>
                    <input type="text" id="endpoint" class="form-control" name="endpoint" value="UeeXa3EuOg3nTOopmCjlTfcsdbItthRgrnpyAA22tBo" required autocomplete="endpoint" />
                </div>

                <!-- Password input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label text-light" for="public_key">keys</label>
                    <input type="text" id="keys" class="form-control" name="keys" value="{{date('Y-m-d H:i:s') }}" required autocomplete="endpoint" />
                </div>

                <!-- Password input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label text-light" for="auth_token">auth_token</label>
                    <input type="text" id="auth_token" class="form-control" name="auth_token" value="eyJpdiI6IjNjREFLVE9UZndOQnoxQllqTTM0OHc9PSIsInZhbHVlIjoiaVNCUlJXcHpOd0MvNUZJWC9IeHRZVXVYdGxsdmU2YVVtOHZXdm9oaCs2WVlwVkxRZE1GRTlyQldDWFBCaHdZNUtmNm9TUVBXNGF2dnJuWkljeTN3cHY4dGFlbXB3czN4aWdjMlRQT09UeS9IT2Vhb1crc0tJRmM4YnhTMUhSNVkiLCJtYWMiOiI5NzljMTljMTZjOTg4ZDlkMTFlMTZhNDcyNTQxOGRhZTE5YzcyMzA1ZGMwNWM3ZGM5Yzc0YzliZmZjN2U3MGFkIiwidGFnIjoiIn0%3D" required autocomplete="auth_token" />
                </div>

                <!-- 2 column grid layout -->
                <div class="row mb-4">
                    <div class="col-md-6 d-flex justify-content-center">
                        <!-- Checkbox -->
                        <div class="form-check mb-3 mb-md-0">
                            <input class="form-check-input" type="checkbox" role="switch" id="loginCheck"
                                name="remember">
                            <label class="form-check-label text-light" for="loginCheck">Lembre de mim!</label>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex justify-content-center">
                        <!-- Simple link -->
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">Esqueceu a senha?</a>
                        @endif
                    </div>
                </div>

                <!-- Submit button -->
                <button type="submit" data-mdb-button-init data-mdb-ripple-init
                    class="btn btn-primary btn-block mb-4">Entrar</button>

                <!-- Register buttons -->
                <div class="text-center">
                    <p>Não está registrado? <a href="#!">Registrar</a></p>
                </div>
            </form>
        </div>
        <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
            <form>
                <div class="text-center mb-3">
                    <p>Sign up with:</p>
                    <button type="button" data-mdb-button-init data-mdb-ripple-init
                        class="btn btn-link btn-floating mx-1">
                        <i class="fab fa-facebook-f"></i>
                    </button>

                    <button type="button" data-mdb-button-init data-mdb-ripple-init
                        class="btn btn-link btn-floating mx-1">
                        <i class="fab fa-google"></i>
                    </button>

                    <button type="button" data-mdb-button-init data-mdb-ripple-init
                        class="btn btn-link btn-floating mx-1">
                        <i class="fab fa-twitter"></i>
                    </button>

                    <button type="button" data-mdb-button-init data-mdb-ripple-init
                        class="btn btn-link btn-floating mx-1">
                        <i class="fab fa-github"></i>
                    </button>
                </div>

                <p class="text-center">or:</p>

                <!-- Name input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" id="registerName" class="form-control" />
                    <label class="form-label" for="registerName">Name</label>
                </div>

                <!-- Username input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" id="registerUsername" class="form-control" />
                    <label class="form-label" for="registerUsername">Username</label>
                </div>

                <!-- Email input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="email" id="registerEmail" class="form-control" />
                    <label class="form-label" for="registerEmail">Email</label>
                </div>

                <!-- Password input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="password" id="registerPassword" class="form-control" />
                    <label class="form-label" for="registerPassword">Password</label>
                </div>

                <!-- Repeat Password input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="password" id="registerRepeatPassword" class="form-control" />
                    <label class="form-label" for="registerRepeatPassword">Repeat password</label>
                </div>

                <!-- Checkbox -->
                <div class="form-check d-flex justify-content-center mb-4">
                    <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" checked
                        aria-describedby="registerCheckHelpText" />
                    <label class="form-check-label" for="registerCheck">
                        I have read and agree to the terms
                    </label>
                </div>

                <!-- Submit button -->
                <button type="submit" data-mdb-button-init data-mdb-ripple-init
                    class="btn btn-primary btn-block mb-3">Sign in</button>
            </form>
        </div>
    </div>
    <!-- Pills content -->
</x-guest-layout>
