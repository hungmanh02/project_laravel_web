<!DOCTYPE html>
<html lang="en">
   @include('parts.backend.head')
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">{{$pageTitle}}</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="{{route('login')}}">
                                            @csrf
                                            <div class="form-floating mb-3">
                                                <input class="form-control @error('email') is-invalid @enderror" name="email" id="inputEmail" type="email" placeholder="Tài khoản đăng nhập" value="{{old('email')}}"/>
                                                <label for="inputEmail">Tài khoản</label>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control @error('password') is-invalid @enderror" name="password" id="inputPassword" type="password" placeholder="Nhập mật khẩu" />
                                                <label for="inputPassword">Mật khẩu</label>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Ghi nhớ</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.html">Quên mật khẩu</a>
                                                {{-- <a class="btn btn-primary" href="#">Đăng nhập</a> --}}
                                                <button class="btn btn-primary" type="submit">Đăng nhập</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small" ><a href="#">Đăng ký tài khoản</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                @include('parts.backend.footer')
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('backend/js/scripts.js')}}"></script>
    </body>
</html>
