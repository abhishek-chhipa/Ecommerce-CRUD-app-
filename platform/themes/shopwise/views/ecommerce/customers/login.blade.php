@php Theme::set('pageName', __('Login')) @endphp

 <div class="login_register_wrap section">
     <div class="container">
         <div class="row justify-content-center">
             <div class="col-xl-6 col-md-10">
                 <div class="login_wrap">
                     <div class="padding_eight_all bg-white">
                         <div class="heading_s1">
                             <h3>{{ __('Login') }}</h3>
                         </div>
                         @if (isset($errors) && $errors->has('confirmation'))
                             <div class="alert alert-danger">
                                 <span>{!! $errors->first('confirmation') !!}</span>
                             </div>
                             <br>
                         @endif
                         <form method="POST" action="{{ route('customer.login.post') }}">
                             @csrf
                             <div class="form-group">
                                 <input class="form-control" name="email" id="txt-email" type="email" value="{{ old('email') }}" placeholder="{{ __('Your Email') }}">
                                 @if ($errors->has('email'))
                                     <span class="text-danger">{{ $errors->first('email') }}</span>
                                 @endif
                             </div>
                             <div class="form-group">
                                 <input class="form-control" type="password" name="password" id="txt-password" placeholder="{{ __('Password') }}">
                                 @if ($errors->has('password'))
                                     <span class="text-danger">{{ $errors->first('password') }}</span>
                                 @endif
                             </div>
                             <div class="login_footer form-group">
                                 <div class="chek-form">
                                     <div class="custome-checkbox">
                                         <input class="form-check-input" type="checkbox" name="remember" id="remember-me" value="1">
                                         <label class="form-check-label" for="remember-me"><span>{{ __('Remember me') }}</span></label>
                                     </div>
                                 </div>
                                 <a href="{{ route('customer.password.reset') }}">{{ __('Forgot password?') }}</a>
                             </div>
                             <div class="form-group">
                                 <button type="submit" class="btn btn-fill-out btn-block">{{ __('Log in') }}</button>
                             </div>
                         </form>

                         <div class="text-center">
                             {!! apply_filters(BASE_FILTER_AFTER_LOGIN_OR_REGISTER_FORM, null, \Botble\Ecommerce\Models\Customer::class) !!}
                         </div>

                         <div class="form-note text-center">{{ __("Don't Have an Account?") }} <a href="{{ route('customer.register') }}">{{ __('Sign up now') }}</a></div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- END LOGIN SECTION -->
