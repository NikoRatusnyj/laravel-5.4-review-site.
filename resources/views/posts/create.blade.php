
@include('includes.header')

{!! Html::style('/css/parsley.css') !!}


<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1>Newpost</h1>
        {!! Form::open(['route' => 'posts.store', 'data-parsley-validate' =>'']) !!}
        {{Form::label('title', 'Title:' )}}
        {{Form::text('title', null, array('class'=> 'form-control', 'required' => '','maxlength'=>"255" ) )}}

        {{Form::label('body', 'Body:' )}}
        {{Form::textarea('body', null, array('class'=>'form-control','required' => '') )}}

        {{Form::submit('New Post', array('class'=>'btn btn-success btn-lg btn-block'))}}
        {!! Form::close() !!}
    </div>
</div>

{!! Html::script('/js/parsley.min.js') !!}
