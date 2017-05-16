@include('includes.header')
<script>

    jQuery(document).ready(function() {


        jQuery('input#d,textarea#d,input#hi,input#do,input#ho').hide();
        jQuery('div#showcom,#gone').hide();

        jQuery('#add,#post').click(function() {
            jQuery('div#showcom,#gone').show();

        });
        jQuery('#show').click(function() {
            jQuery('input#d,textarea#d,input#hi').show();
            jQuery('div#s').hide();

//            jQuery('div:empty').hide();


        });
        jQuery('#showo').click(function() {
            jQuery('input#do,input#ho').show();
            jQuery('div#so').hide();

//            jQuery('div:empty').hide();


        });
    });




</script>
<div class="container">
    <h1>Company Profile</h1>
    <hr>
    <h2>Profile</h2>
    <div class="row">
        <!-- left column -->
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <img src="../uploads/logo/{{  Auth::user()->logo }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;"><br>
                    <h2>{{ Auth::user()->companyname }}'sProfile</h2>

                    <form action="{{ route('company.update.logo') }}" enctype="multipart/form-data"  method="POST">
                        <label>Update Profile Image</label>
                        <input type="file" name="logo">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="pull-right btn btn-sm btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>

        <!-- edit form column -->
        <div class="col-md-9 personal-info">

            <h3>Company info</h3>
            {{--<form action="{{ route('company.update') }}" class="form-horizontal" role="form" method="POST">--}}
                {!! Form::open(['url' => 'company_profile/'. Auth::user()->id, 'data-parsley-validate' =>'',  'class'=>"form-horizontal", 'method' =>'put']) !!}
                <div class="form-group">
                    <label class="col-lg-3 control-label">Company Name:</label>
                    <div class="col-lg-8">
                        <input  name="companyname" id="d" class="form-control" type="text" value="{{ Auth::user()->companyname }}" >
                        <div id="s" class="form-control">{{ Auth::user()->companyname }}</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">KVK:</label>
                    <div class="col-lg-8">
                        <input id="d" name="kvk" class="form-control" type="text" value="{{ Auth::user()->kvk }}">
                        <div id="s" class="form-control"  >{{ Auth::user()->kvk }}</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Adres:</label>
                    <div class="col-lg-8">
                        <input id="d" name="adres" class="form-control" type="text" value="{{ Auth::user()->adres }}" >
                        <div id="s" class="form-control"  >{{ Auth::user()->adres }}</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Tel Nr:</label>
                    <div class="col-lg-8">
                        <input id="d" name="telnr" class="form-control" type="text" value="{{ Auth::user()->telnr }}"  >
                        <div id="s" class="form-control"  >{{ Auth::user()->telnr }}</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Descriptionr:</label>
                    <div class="col-lg-8">
                        <textarea id="d" class="form-control" name="description" rows="10" cols="70" >{{ Auth::user()->description }}</textarea>
                        <div id="s" class="form-control"  >{{ Auth::user()->description }}</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-8">
                        <input id="d" name="email" class="form-control" type="text" value="{{ Auth::user()->email }}"  >
                        <div id="s" class="form-control"  >{{ Auth::user()->email }}</div>
                    </div>
                </div>

                <div class="form-group">
                <label class="col-md-3 control-label">Password:</label>
                <div class="col-md-8">
                <input class="form-control" type="password" value="{{ Auth::user()->password }}"  readonly>
                </div>
                </div>
                <div class="form-group">
                <label class="col-md-3 control-label">Confirm password:</label>
                <div class="col-md-8">
                <input class="form-control" type="password" value="{{ Auth::user()->password }}"  readonly>
                </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                        <input id="show" type="button" class="btn btn-primary" value="Edit Profile" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <span></span>
                        <input id="hi" type="submit" class="btn btn-default" value="Save">

                    </div>
                </div>
            </form>
        </div>
    </div>
