<x-layout_frontend>

    <!-- Normal Breadcrumb Begin -->
    <section class="normal-breadcrumb set-bg" data-setbg="img/normal-breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text">
                        <h2>Sign Up</h2>
                        <p>Welcome to the official Anime blog.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Normal Breadcrumb End -->


    <!-- Signup Section Begin -->
    <section class="signup spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login__form">
                        <h3>Sign Up</h3>
                        <form action="{{route('register_action')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- <div class="input__item">
                                <input type="file" class="form-control" accept="image/*" placeholder="Avatar (Optional)" name="avatar" value="{{old('avatar')}}">
                                <span class="icon_mail"></span>
                                @error('avatar')
                                    <p class="text-warning">{{$message}}</p>
                                @enderror
                            </div> -->
                            <div class="input__item">
                                <input type="text" placeholder="Email address" name="email" value="{{old('email')}}">
                                <span class="icon_mail"></span>
                                @error('email')
                                    <p class="text-warning">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="input__item">
                                <input type="text" placeholder="Username"  name="username" value="{{old('username')}}">
                                <span class="icon_profile"></span>
                                @error('username')
                                    <p class="text-warning">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="input__item">
                                <input type="text" placeholder="Name"  name="name" value="{{old('name')}}">
                                <span class="icon_profile"></span>
                                @error('name')
                                    <p class="text-warning">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="input__item">
                                <input type="text" placeholder="Address"  name="address" value="{{old('address')}}">
                                <span class="icon_profile"></span>
                                @error('address')
                                    <p class="text-warning">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="input__item">
                                <input type="password" placeholder="Password"  name="password">
                                <span class="icon_lock"></span>
                                @error('password')
                                    <p class="text-warning">{{$message}}</p>
                                @enderror
                            </div>
                            <button type="submit" class="site-btn">Login Now</button>
                        </form>
                        <h5>Already have an account? <a href="#">Log In!</a></h5>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login__social__links">
                        <h3>Login With:</h3>
                        <ul>
                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i> Sign in With Facebook</a>
                            </li>
                            <li><a href="#" class="google"><i class="fa fa-google"></i> Sign in With Google</a></li>
                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i> Sign in With Twitter</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Signup Section End -->

</x-layout_frontend>
