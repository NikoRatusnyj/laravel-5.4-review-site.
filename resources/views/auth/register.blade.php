@extends('layouts.app')
@include('includes.header')
@section('content')
    <script>
        $(document).ready(function(){
            $(".tablinks").on("click", function(e){
                var dataTab = $(this).attr("data-tab");
                $(this).parent().find(".current").removeClass("current");
                $(this).addClass("current");
                $(".tabcontent").parent().find(".current").removeClass("current");
                $(".tabcontent[data-tab="+ dataTab +"]").addClass("current");
            })
        })

    </script>
<div class="container">
    <div class="tab">
        <button class="tablinks current" data-tab="user">User</button>
        <button class="tablinks" data-tab="company">company</button>

    </div>
    <div class="row">
        <div id="user" data-tab="user" class="col-md-8 col-md-offset-2 tabcontent current">
            <div class="panel panel-default">
{{--name--}}
                <div  class="panel-heading ">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}" >
                        {{ csrf_field() }}


                        {{--firstname--}}
                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <label for="firstname" class="col-md-4 control-label">Firstname</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" >

                                @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{--lastname--}}
                        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label for="lastname" class="col-md-4 control-label">Lastname</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" >

                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{--adres--}}
                        <div class="form-group{{ $errors->has('adres') ? ' has-error' : '' }}">
                            <label for="adres" class="col-md-4 control-label">Adres</label>

                            <div class="col-md-6">
                                <input id="adres" type="text" class="form-control" name="adres" value="{{ old('adres') }}" >

                                @if ($errors->has('adres'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('adres') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{--telnr--}}
                        <div class="form-group{{ $errors->has('telnr') ? ' has-error' : '' }}">
                            <label for="telnr" class="col-md-4 control-label">Telnr</label>

                            <div class="col-md-6">
                                <input id="telnr" type="text" class="form-control" name="telnr" value="{{ old('telnr') }}" >

                                @if ($errors->has('telnr'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telnr') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{--email--}}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
{{--pass--}}
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
{{--companys--}}




        <div id="company" data-tab="company" class="col-md-8 col-md-offset-2 tabcontent">
            <div class="panel panel-default">
                <div class="panel-heading tablinks">Register company</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('company.reg.submit') }}"  enctype="multipart/form-data" >
                        {{ csrf_field() }}

{{--name--}}
                        <div class="form-group{{ $errors->has('companyname') ? ' has-error' : '' }}">
                            {{ csrf_field() }}
                            <label for="companyname" class="col-md-4 control-label">Bedrijf naam</label>

                            <div class="col-md-6">
                                <input id="companyname" type="text" class="form-control" name="companyname" value="{{ old('companyname') }}" >

                                @if ($errors->has('companyname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('companyname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{--descrp--}}
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            {{ csrf_field() }}
                            <label for="description" class="col-md-4 control-label">Description:</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" >

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
{{--kvk--}}
                        <div class="form-group{{ $errors->has('kvk') ? ' has-error' : '' }}">
                            <label for="kvk" class="col-md-4 control-label">kvk:</label>

                            <div class="col-md-6">
                                <input id="kvk" type="text" class="form-control" name="kvk" value="{{ old('kvk') }}" >

                                @if ($errors->has('kvk'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kvk') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{--adres--}}
                        <div class="form-group{{ $errors->has('adres') ? ' has-error' : '' }}">
                            <label for="adres" class="col-md-4 control-label">Adres</label>

                            <div class="col-md-6">
                                <input id="adres" type="text" class="form-control" name="adres" value="{{ old('adres') }}" >

                                @if ($errors->has('adres'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('adres') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{--telnr--}}
                        <div class="form-group{{ $errors->has('telnr') ? ' has-error' : '' }}">
                            <label for="telnr" class="col-md-4 control-label">Tel nr:</label>

                            <div class="col-md-6">
                                <input id="telnr" type="text" class="form-control" name="telnr" value="{{ old('telnr') }}" >

                                @if ($errors->has('telnr'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telnr') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{--email--}}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
