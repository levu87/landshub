{{-- form đăng ký --}}
<div id="register" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body" style="z-index:9999; padding: 2rem">
          <button data-dismiss="modal" class="close">&times;</button>
          <div class="sign-up card" style="border: none;">
            <div class="card-header" style="padding: 0 1rem;
            background: none;
            border: none;
        }">
                <h2 class="sign-up__title">Đăng ký</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group">
                        <label for="name" class="col-form-label text-md-right">{{ __('Name') }}</label>

                        <div>
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>

                        <div>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>

                    <div class="form-group mb-0">
                        <div class="">
                            <button type="submit" class="btn btn-primary" style="width: 100%">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="sign-up__buttons">
        </div><span class="bottom" style="padding: 1rem 0; display: block">Bạn đã có tài khoản. <a data-fancybox data-animation-duration="700"
                data-src="#Modal1" href="javascript:;">Đăng nhập</a></span>
        </div>
      </div>
    </div>  
  </div>
{{-- end đăng ký --}}
{{-- form đăng nhập  --}}
<div id="login" class="modal fade" role="dialog">
  <div class="modal-dialog">
    
    <div class="modal-content">
      <div class="modal-body" style="padding: 2rem">
        <button data-dismiss="modal" class="close">&times;</button>
        <div class="sign-up">
            <form class="sign-up__form" action="{{ route('login') }}" method="post">
                @csrf
                <div class="sign-up__content">
                    <h2 class="sign-up__title">Đăng nhập</h2>
                    <div class="form-group">
                        <label for="email" class="col-form-label text-md-right">{{ __('Tên đăng nhập') }}</label>
                    <input class="sign-up__inp" type="email" name="email" placeholder="Email"
                        required="required">
                    </div>
                    
                    <div class="form-group">
                        <label for="password" class="col-form-label text-md-right">{{ __('Mật khẩu') }}</label>
                    <input class="sign-up__inp" type="password" name="password" placeholder="Mật khẩu"
                        required="required">
                    </div>
                    <span class="forgot__password">Quên mật khẩu <a href="">nhấn vào
                        đây</a></span>
                    
                </div>
                <div class="sign-up__buttons">
                    <input class="btn btn--signin" type="submit" value="Đăng nhập">
                    <a class="btn btn-primary" href="login/facebook"
                        style="background: #4267b2;color: #fff;margin-top: 1.5rem; text-align:center">Đăng
                        nhập bằng facebook</a>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>  
</div>
{{-- end đăng nhập --}}