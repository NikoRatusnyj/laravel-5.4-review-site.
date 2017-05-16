@include('includes.header')

<script>

   jQuery(document).ready(function() {


       jQuery('input#d, input#hi').hide();


           jQuery('#show').click(function() {
            jQuery('input#d,input#hi').show();
            jQuery('div#s').hide();

//            jQuery('div:empty').hide();


        });
   });




</script>
<style>

    div:empty {
        display:none;
    }
</style>


<div class="container">
    <h1>Profile</h1>
    <hr>
    <div class="row">
        <!-- left column -->
        <div class="col-md-3">
            <div class="row">

                <div class="col-md-10 col-md-offset-1">
                    <img src="../public/uploads/avatar/{{  Auth::user()->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                    <h2>{{ Auth::user()->firstname }}'sProfile</h2>
                    {{--{!! Form::open(array( 'enctype' => 'multipart/form-data','method' => 'post' )) !!}--}}
                    <form action="{{ route('update.avatar') }}" enctype="multipart/form-data"  method="POST">
                        <label>Update Profile Image</label>
                        <input type="file" name="avatar">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input   name="subfoto" type="submit"value="avatar" class="pull-right btn btn-sm btn-primary">
                    {{--{!! Form::submit( 'Save', ['class' => 'btn btn-default', 'name' => 'submitbutton', 'value' => 'save'])!!}--}}
                    </form>
                    {{--{!! Form::close() !!}--}}
                </div>
            </div>
        </div>

        <!-- edit form column -->
        <div class="col-md-9 personal-info">

            <h3>Personal info</h3>
            <form  action="{{ route('update.profile') }}" class="form-horizontal" role="form" method="POST">

                <div class="form-group">
                    <label class="col-lg-3 control-label">First name:</label>
                    <div class="col-lg-8">
                        <input  id="d" name="firstname"  class="form-control" type="text" value="{{ Auth::user()->firstname }}" required >
                        <div id="s" class="form-control">{{ Auth::user()->firstname }}</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Last name:</label>
                    <div class="col-lg-8">
                        <input  id="d" name="lastname" class="form-control" type="text" value="{{ Auth::user()->lastname }}"required>
                        <div id="s" class="form-control"  >{{ Auth::user()->lastname }}</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Adres:</label>
                    <div class="col-lg-8">
                        <input  id="d" name="adres" class="form-control" type="text" value="{{ Auth::user()->adres }}"required >
                        <div id="s" class="form-control"  >{{ Auth::user()->adres }}</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Tel Nr:</label>
                    <div class="col-lg-8">
                        <input  name="telnr" id="d" class="form-control" type="text" value="{{ Auth::user()->telnr }}" required >
                        <div id="s" class="form-control"  >{{ Auth::user()->telnr }}</div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-8">
                        <input  id="d" name="email" class="form-control" type="text" value="{{ Auth::user()->email }}"  required>
                        <div id="s" class="form-control"  >{{ Auth::user()->email }}</div>
                    </div>
                </div>

                {{--<div class="form-group">--}}
                    {{--<label class="col-md-3 control-label">Password:</label>--}}
                    {{--<div class="col-md-8">--}}
                        {{--<input class="form-control" type="password" value="{{ Auth::user()->password }}"  readonly>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<label class="col-md-3 control-label">Confirm password:</label>--}}
                    {{--<div class="col-md-8">--}}
                        {{--<input class="form-control" type="password" value="{{ Auth::user()->password }}"  readonly>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                        <input id="show" type="button" name="subprofile" class="btn btn-primary" value="Edit Profile" >

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <span></span>
                        <input type="submit" id="hi" class="btn btn-default" value="Save">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<hr>
@include('includes.footer')
