<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

</head>

<script>
    jQuery(document).ready(function(){
        jQuery('#login-trigger').click(function(){
            jQuery('#login-content').slideToggle();
            jQuery(this).toggleClass('active');

            if (jQuery(this).hasClass('active')) jQuery(this).find('span')
            else jQuery(this).find('span')
        })
    });
</script>
<header>
    <div class="container">
        <div class="col-sm-3 logo">
            <div class="hover"><i class="fa fa-star-o" aria-hidden="true" href=""></i>Niko</div>
        </div>
        <div class="col-sm-6 nav">
                <nav>
                    <ul>

                        <li>
                            <a href="">New</a>
                        </li>
                        <li>
                            <a href="">Home</a>
                        </li>

                        <li>
                            <a href="{{ url('/contact')}}">Contact</a>
                        </li>
                        <li>
                            <a href="">About</a>
                        </li>
                        @if (Auth::guest())

                            <li >
                                <a id="login-trigger">
                                    Log in
                                </a>

                                <div id="login-content">
                                    <form class="form" role="form" method="POST" action="{{ route('login') }}">
                                        {{ csrf_field() }}

                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email" class="mid ">E-Mail Address</label>

                                            <div class="mid">
                                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="password" class="mid">Password</label>

                                            <div class="mid">
                                                <input id="password" type="password" class="form-control" name="password" required>

                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="">
                                                <button type="submit" class="btn btn-primary">
                                                    Login
                                                </button>

                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    Forgot Your Password?</a>
                                                <a href="{{route('company.login')}}" class="btn btn-link">
                                                       Log in as Company</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                {{--{{asset('/uploads/logo/'. Auth::user()->logo )}}--}}
                            </li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            @if(Auth::user()->firstname)
                                <li>
                                    <a href="{{ url('')}}">Home</a>
                                </li>
                            @else(Auth::user()->companyname)
                                <li>
                                    <a href="{{ route('company.dashboard')}}">Home</a>
                                </li>
                            @endif
                            <li id="login-trigger">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    @if(Auth::user()->firstname)
                                    <img src="{{url('/uploads/avatar/' . Auth::user()->avatar)}}" style="width:32px; height:32px; position:absolute; top:-6px; left:391px; border-radius:50%">
                                    {{ Auth::user()->firstname }}
                                    @else(Auth::user()->companyname)
                                        {{--<img src="../../public/uploads/logo/{{Auth::user()->logo }}" style="width:32px; height:32px; position:absolute; top:-6px; left:391px; border-radius:50%">--}}
                                        <img src="{{url('/uploads/logo/' . Auth::user()->logo)}}" style="width:32px; height:32px; position:absolute; top:-6px; left:371px; border-radius:50%">
                                    {{ Auth::user()->companyname }} <span class="caret"></span>
                                        @endif
                                </a>
                                <ul id="login-content" role="menu">
                                    <li>
                                        @if(Auth::user()->firstname )
                                        {{--<a href="{{ url('companys' , Auth::user()->id )}}">Profile</a><br>--}}
                                        <a href="{{ url('profile')}}">Profile</a><br>
                                        @else(Auth::user()->companyname)
                                            <a href="{{url('company_profile/'. Auth::user()->id)}}">Profile</a><br>
                                        @endif
                                        <a href="{{ url('company/')}}">Add logo</a><br>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>


                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif

                    </ul>
                </nav>

        </div>
    </div>

</header>
<div class="header-image" style="background-image: url('{{asset('img/header-bg.jpg')}}')">
    <div class="header-inner container">
        <h2>Watch Free Movies Online</h2>
    </div>
</div>
<body>
