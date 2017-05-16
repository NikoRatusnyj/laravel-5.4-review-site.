@include('includes.header')

<?php
$ratings = \App\Rating::where('comp_id', Auth::user()->id)->get();
$totalRating = count($ratings);
if ($totalRating != 0) {
    $amountRating = array();
    foreach ($ratings as $rating) {
        $amountRating[] = $rating['rating'];
    }
    $averageRating = array_sum($amountRating) / $totalRating;
    $averageRating = round($averageRating, 0);
} else {
    $averageRating = 'N/A';
}

?>
{!! Form::open() !!}
<div class="hidden">
    {!! Form::text('amount', $averageRating ,['class' => 'get-amount']) !!}
</div>
{!! Form::close() !!}
<script>


    jQuery(document).ready(function () {


        jQuery('input#d,textarea#d,input#hi,input#do,input#ho').hide();
        jQuery('div#showcom,#gone').hide();

        jQuery('#add,#post').click(function () {
            jQuery('div#showcom,#gone').show();

        });
        jQuery('#show').click(function () {
            jQuery('input#d,textarea#d,input#hi').show();
            jQuery('div#s').hide();

//            jQuery('div:empty').hide();


        });
        jQuery('#showo').click(function () {
            jQuery('input#do,input#ho').show();
            jQuery('div#so').hide();

//            jQuery('div:empty').hide();


        });
    });



</script>


<script>
    jQuery(document).ready(function (e) {
        var rating = jQuery('.get-amount').val();
        jQuery('.acidjs-rating-stars .circle-rate:lt(' + rating + ')').addClass('succes');
    })
</script>
<style>
    .acidjs-rating-stars .circle-rate {
        float: left;

    }

    .circle-rate {
        color: #b1ccbf;
    }

    .circle-rate.succes {
        color: yellow !important;
    }

</style>

<div>
    <h2>Rating</h2>

    <div class="acidjs-rating-stars acidjs-rating-disabled">
        <form>
            <input disabled="disabled" type="radio" name="group-3" id="group-3-4" value="1"/>
            <label class="circle-rate" for="group-3-4"></label>
            <input disabled="disabled" type="radio" name="group-3" id="group-3-3" value="2"/>
            <label class="circle-rate" for="group-3-3"></label>
            <input disabled="disabled" type="radio" name="group-3" id="group-3-2" value="3"/>
            <label class="circle-rate" for="group-3-2"></label>
            <input disabled="disabled" type="radio" name="group-3" id="group-3-1" value="4"/>
            <label class="circle-rate" for="group-3-1"></label>
            <input disabled="disabled" type="radio" name="group-3" id="group-3-0" value="5"/>
            <label class="circle-rate" for="group-3-0"></label>
        </form>
    </div>
</div>


<div class="container">
    <?php $posts = \App\Post::where('comp_id', Auth::user()->id)->get();?>
    @foreach($posts as $post)


        <input id="post" type="submit" onclick="return false" value="Your Posts{{$post->id}}">


        <div id="gone">
            {!!Form::open(['url' => 'posts/' . $post->id , 'method' => 'put']) !!}
            {{Form::label('title', 'Title:' )}}
            <input id="do" name="title" class="form-control" type="text" value="{{$post->title}}" required>
            <div id="so" class="form-control">{{$post['title']}}</div>
            {{Form::label('body', 'Body:' )}}
            <input id="do" name="body" class="form-control" type="text" value="{{$post['body']}}" required>
            <div id="so" class="form-control">{{$post['body']}}</div>

            <div class="col-md-8">
                <input id="showo" type="button" name="subprofile" class="btn btn-default" value="Edit Post">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <span></span>
                <input type="submit" id="ho" class="btn btn-default" value="Save">
                <input type="button" id="add" class="btn btn-default" value="Add Comment">
                {!! Form::close() !!}
                {!! Form::open(['url' => 'posts/' . $post->id, 'method' =>'delete']) !!}
                {!! Form::submit('Delete',['class' => 'btn btn-default']) !!}
                {!! Form::close() !!}


            </div>
        </div>
</div>


<?php $comments = \App\Comment::where('comp_id', Auth::user()->id)->get();?>
<?php $comments = \App\Comment::where('post_id', $post->id)->get();?>

<div id="showcom" class="row">
    <div id="coment-form" class="col-md-8 col-md-offset-2">

        <div class="row">
            <div class="col-md-6">
                {{ Form::open(['url' => ['comments'], 'method' => 'post']) }}
                {!! Form::label('comment', 'Comment') !!}
                <div class="hidden">
                    {!! Form::text('post_id', $post->id) !!}
                </div>
                {!! Form::text('comment',null, ['class' => 'form-control']) !!}
                {!! Form::submit('Add Coment', ['class' => 'btn btn-default']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>


<div class="container">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <div class="row">

        <div class="comments-container">
            <h1>Comments <a href="http://creaticode.com"></a></h1>
            @foreach (\App\User::all() as $user)
                <?php $comments = \App\Comment::getComment($user->user_id);?>
                <?php $comments = \App\Comment::where('user_id', $user->id)->get();?>
                <ul id="comments-list" class="comments-list">
                    <div class="comment-main-level">
                        <div class="comment-avatar"><img src="../uploads/avatar/{{ $user->avatar }}" alt=""></div>
                        <div class="comment-box">
                            <div class="comment-head">
                                <h6 class="comment-name"><a href="">{{ $user->firstname}}</a></h6>
                                @foreach($comments as $comment)
                                    <span>Published: {{ date('M j, Y', strtotime($comment->created_at)) }}</span>
                                    <i class="fa fa-reply"></i>
                                    <i class="fa fa-heart"></i>
                            </div>
                            <div class="comment-content">
                                <td>{{ $comment['comment'] }}</td>
                                <br>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </ul>
            @endforeach
            @foreach (\App\Company::all() as $company)
                <?php $comments = \App\Comment::getComment($company->comp_id);?>
                <?php $comments = \App\Comment::where('comp_id', $company->id)->get();?>
                <ul id="comments-list" class="comments-list">
                    <div class="comment-main-level">
                        <div class="comment-avatar"><img src="../uploads/logo/{{ $company->logo }}" alt=""></div>
                        <div class="comment-box">
                            <div class="comment-head">
                                <h6 class="comment-name"><a href="">{{ $company->companyname}}</a></h6>
                                @foreach($comments as $comment)
                                    <span>Published: {{ date('M j, Y', strtotime($comment->created_at)) }}</span>
                                    <i class="fa fa-reply"></i>
                                    <i class="fa fa-heart"></i>
                            </div>
                            <div class="comment-content">
                                <td>{{ $comment['comment'] }}</td>
                                <br>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </ul>
            @endforeach
            @endforeach

        </div>
    </div>
</div>


@include('includes.footer')
