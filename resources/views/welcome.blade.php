
@include('includes.header')


<div class="container">



            <div class="row">

                <div class="col-lg-12">
                    <h3 class="page-header">Related Projects</h3>
                </div>
                @foreach(\App\Company::all() as $company)


                    {{--{{$companys->companyname}}--}}
                    {{--{{$companys->kvk}}--}}
                <div class="col-sm-3 col-xs-6">
                    <h3>{{$company->companyname}}</h3>
                    <a href="{{url('companys/' . $company->id )}}">
                        <img class="img-responsive " src="../public/uploads/logo/{{ $company->logo }}"  style="width:262px; height:157px;">
                    </a>
                </div>

                @endforeach
            </div>


            <hr>



        </div>
        </div>






@include('includes.footer')




