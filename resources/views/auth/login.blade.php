<?php $general_setting = DB::table('general_settings')->latest()->first(); ?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{$general_setting->site_title}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link href="{{asset('miniadmin/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />

    <link href="{{asset('miniadmin/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

   
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href=" {{asset('css/style.default.css')}}" id="theme-stylesheet"
        type="text/css">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('css/custom-' . $general_setting->theme)}}" type="text/css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
</head>

<body>
    <div class="page login-page">
        <div class="container">
            <div class="form-outer text-center d-flex align-items-center">
                <div class="form-inner">
                    <div class="logo"><span>{{$general_setting->site_title}}</span></div>
                    @include('shared.errors')
                    @include('shared.flash_message')
                    <form method="POST" action="{{ route('login') }}" id="login-form">
                        @csrf

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control  @error('username') is-invalid @enderror" id="username" placeholder="Enter username" name="username" value="{{ old('username') }}" required autofocus>
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- <input id="username" type="text" class="input-material @error('username') is-invalid @enderror"
                            name="username" value="{{ old('username') }}" required autofocus>
                        <label for="username" class="label-material">{{ __('Username') }}</label>

                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror -->
                        <!-- </div> -->

                        <!-- <div class="form-group-material">


                            <input id="password" type="password"
                                class="input-material @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">
                            <label for="password" class="label-material">{{ __('Password') }}</label>

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div> -->

                        <div class="mb-3">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1">
                                    <label class="form-label" for="password">Password</label>
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="">
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="forgot-pass">Forgot password?</a>
                                    @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="input-group auth-pass-inputgroup">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon" name="password" required>
                                <button class="btn btn-light shadow-none ms-0" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                            </div>

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        {{-- <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="remember"
                               id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="custom-control-label" for="remember">{{ __('Remember Me') }}</label>
                </div> --}}
                <br>
                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-primary btn-block">
                        {{ __('Login') }}
                    </button>
                </div>
                </form>
                <!-- This three buttons for demo only-->

                @if (env('PRODUCT_MODE')==="DEMO" || env('PRODUCT_MODE')==="DEVELOPER")
                <button type="submit" class="btn btn-success btn-sm default admin-btn">LogIn as Admin</button>
                <button type="submit" class="btn btn-info btn-sm default staff-btn">LogIn as Staff</button>
                <button type="submit" class="btn btn-primary btn-sm default client-btn">LogIn as Client</button>
                <p class="text-center mt-4 text-danger font-weight-bold font-italic">[For attendance device related features, Need to purchase attendance device addon.]</p>
                @endif

                <br><br>
                @if (Route::has('password.request'))
                <a class="forgot-pass" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </div>
            @php
            $general_settings = \App\Models\GeneralSetting::latest()->first();
            @endphp
            <div class="copyrights text-center">
                <p>{{ __('Developed by')}} <a href={{$general_settings->footer_link}} class="external">{{$general_settings->footer}}</a></p>
            </div>
        </div>
    </div>
    </div>
    <script type="text/javascript" src="<?php echo asset('vendor/jquery/jquery.min.js') ?>"></script>
</body>

</html>
<script src="{{asset('miniadmin/js/pages/pass-addon.init.js')}}"></script>
<script type="text/javascript">
    (function($) {

        "use strict";

        $('.admin-btn').on('click', function() {
            $("input[name='username']").focus().val('admin');
            $("input[name='password']").focus().val('admin');
        });

        $('.staff-btn').on('click', function() {
            $("input[name='username']").focus().val('staff');
            $("input[name='password']").focus().val('staff');
        });
        $('.client-btn').on('click', function() {
            $("input[name='username']").focus().val('client');
            $("input[name='password']").focus().val('client');
        });

        // ------------------------------------------------------- //
        // Material Inputs
        // ------------------------------------------------------ //

        let materialInputs = $('input.input-material');

        // activate labels for prefilled values
        materialInputs.filter(function() {
            return $(this).val() !== "";
        }).siblings('.label-material').addClass('active');

        // move label on focus
        materialInputs.on('focus', function() {
            $(this).siblings('.label-material').addClass('active');
        });

        // remove/keep label on blur
        materialInputs.on('blur', function() {
            $(this).siblings('.label-material').removeClass('active');

            if ($(this).val() !== '') {
                $(this).siblings('.label-material').addClass('active');
            } else {
                $(this).siblings('.label-material').removeClass('active');
            }
        });
    })(jQuery);
</script>