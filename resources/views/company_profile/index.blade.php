
@include('includes.header')

{{--<script>--}}

    {{--jQuery(document).ready(function() {--}}


        {{--jQuery('input#d').hide();--}}


        {{--jQuery('#show').click(function() {--}}
            {{--jQuery('input#d').show();--}}
            {{--jQuery('div#s').hide();--}}

{{--//            jQuery('div:empty').hide();--}}


        {{--});--}}
    {{--});--}}




{{--</script>--}}
{{--<style>--}}

    {{--div:empty {--}}
        {{--display:none;--}}
    {{--}--}}
{{--</style>--}}

{{--<div class="container">--}}
    {{--<h1>Company Profile</h1>--}}
    {{--<hr>--}}
    {{--<div class="row">--}}
        {{--<!-- left column -->--}}
        {{--<div class="col-md-3">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-10 col-md-offset-1">--}}
                    {{--<img src="../public/uploads/logo/{{  Auth::user()->logo }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;"><br>--}}
                    {{--<h2>{{ Auth::user()->companyname }}'sProfile</h2>--}}

                    {{--<form enctype="multipart/form-data" action="" method="POST">--}}
                        {{--<label>Update Profile Image</label>--}}
                        {{--<input type="file" name="logo">--}}
                        {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                        {{--<input type="submit" class="pull-right btn btn-sm btn-primary">--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<!-- edit form column -->--}}
        {{--<div class="col-md-9 personal-info">--}}

            {{--<h3>Company info</h3>--}}
            {{--<form class="form-horizontal" role="form" method="POST">--}}

                {{--<div class="form-group">--}}
                    {{--<label class="col-lg-3 control-label">Company Name:</label>--}}
                    {{--<div class="col-lg-8">--}}
                        {{--<input  name="companyname" id="d" class="form-control" type="text" value="{{ Auth::user()->companyname }}" >--}}
                        {{--<div id="s" class="form-control">{{ Auth::user()->companyname }}</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<label class="col-lg-3 control-label">KVK:</label>--}}
                    {{--<div class="col-lg-8">--}}
                        {{--<input id="d" name="kvk" class="form-control" type="text" value="{{ Auth::user()->kvk }}">--}}
                        {{--<div id="s" class="form-control"  >{{ Auth::user()->kvk }}</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<label class="col-lg-3 control-label">Adres:</label>--}}
                    {{--<div class="col-lg-8">--}}
                        {{--<input id="d" name="adres" class="form-control" type="text" value="{{ Auth::user()->adres }}" >--}}
                        {{--<div id="s" class="form-control"  >{{ Auth::user()->adres }}</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<label class="col-lg-3 control-label">Tel Nr:</label>--}}
                    {{--<div class="col-lg-8">--}}
                        {{--<input id="d" name="telnr" class="form-control" type="text" value="{{ Auth::user()->telnr }}"  >--}}
                        {{--<div id="s" class="form-control"  >{{ Auth::user()->telnr }}</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="form-group">--}}
                    {{--<label class="col-lg-3 control-label">Email:</label>--}}
                    {{--<div class="col-lg-8">--}}
                        {{--<input id="d" name="email" class="form-control" type="text" value="{{ Auth::user()->email }}"  >--}}
                        {{--<div id="s" class="form-control"  >{{ Auth::user()->email }}</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

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
                {{--<div class="form-group">--}}
                    {{--<label class="col-md-3 control-label"></label>--}}
                    {{--<div class="col-md-8">--}}
                        {{--<input id="show" type="button" class="btn btn-primary" value="Edit Profile" >--}}
                        {{--<button id="show" type="button" class="btn btn-primary" value="Edit Profile" >edit</button>--}}
                        {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}

                        {{--<span></span>--}}
                        {{--<input type="reset" class="btn btn-default" value="Cancel">--}}
                        {{--<span></span>--}}
                        {{--<input type="submit" class="btn btn-default" value="Save">--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</form>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--<hr>--}}
@include('includes.footer')


