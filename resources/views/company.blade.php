
@include('includes.header')
<?php $posts = \App\Post::where('comp_id', Auth::user()->id)->get();?>
@foreach($posts as $post)
<a href="{{url('posts/' . $post->id)}}"> Your Posts{{$post->id}} </a>

@endforeach

        {!! Html::style('/css/parsley.css') !!}


    <div class="container">
        <div>
            <h1>Newpost</h1>

            {!!Form::open(['url' => 'posts', 'method' => 'post']) !!}
            <div class="col-xs-4">
                {{Form::label('title', 'Title:' )}}
                {{Form::text('title', null, array('class'=> 'form-control', 'required' => '','maxlength'=>"255" ) )}}

            {{Form::label('body', 'Body:' )}}
            {{Form::textarea('body', null, array('class'=>'form-control','required' => '') )}}

            {{Form::submit('New Post', array('class'=>'btn btn-default'))}}
            {!! Form::close() !!}
            </div>
        </div>
    </div>

    {!! Html::script('/js/parsley.min.js') !!}




@include('includes.footer')


