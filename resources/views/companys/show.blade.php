@include('includes.header')


<div class="container">

    <h1> Company-{{$company->companyname}}</h1>

    <?php $ratings = \App\Rating::where('comp_id', $company->id)->get();
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
    <div class="row">

        <div class="col-md-8">
            <img class="img-responsive" src="../uploads/logo/{{ $company->logo }}" alt=""
                 style="width:550px; height:300px;  margin-right:25px;">
        </div>


        <div class="col-md-4">
            <h3>Description</h3>
            <p>{{$company->description}}</p>
            <h3>Details</h3>
            <ul>
                <li>Adres:{{$company->adres}}</li>
                <li>KvK:{{$company->kvk}}</li>
                <li>Tel-Nr:{{$company->telnr}}</li>
            </ul>
        </div>
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
        @foreach (\App\User::all() as $user)
            @if( Auth::user())
                <div class="stars">
                    <form action=""><h2>Rate Company</h2>
                        <input class="star star-5" data-target="5" id="star-5" type="radio" name="star"/>
                        <label class="star star-5" for="star-5"></label>
                        <input class="star star-4" data-target="4" id="star-4" type="radio" name="star"/>
                        <label class="star star-4" for="star-4"></label>
                        <input class="star star-3" data-target="3" id="star-3" type="radio" name="star"/>
                        <label class="star star-3" for="star-3"></label>
                        <input class="star star-2" data-target="2" id="star-2" type="radio" name="star"/>
                        <label class="star star-2" for="star-2"></label>
                        <input class="star star-1" data-target="1" id="star-1" type="radio" name="star"/>
                        <label class="star star-1" for="star-1"></label>
                    </form>

                    {!! Form::open(['url' => 'rating/', 'method' => 'post']) !!}
                    <div class="hidden">
                        {!! Form::text('comp_id', $company->id) !!}
                        {!! Form::text('user_id',$user->id) !!}
                        {!! Form::text('amount', '' ,['class' => 'amount']) !!}
                    </div>
                    {!! Form::submit('Add rating', ['class' => 'btn btn-default']) !!}
                    {!! Form::close() !!}
                    @endif
                </div>

                <script>
                    jQuery(document).ready(function (e) {
                        jQuery(".star").on("click", function (e) {
                            var amount = jQuery(this).data('target');
                            jQuery('.amount').val(amount);
                        })
                    })
                </script>


    </div>
    <h1></h1>
</div>

<?php $posts = \App\Post::where('comp_id', $company->id)->get();?>
@foreach ($posts as $post)
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>{{ $post->title }}</h2>
            <h5>Published: {{ date('M j, Y', strtotime($post->created_at)) }}</h5>

            <p>{{ substr(strip_tags($post->body), 0, 250) }}{{ strlen(strip_tags($post->body)) > 250 ? '...' : "" }}</p>

            {{--            <a href="{{ route('blog.single', $post->id) }}" class="btn btn-primary">Read More</a>--}}
            <hr>
        </div>
    </div>
@endforeach
<div class="container">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <div class="row">
        <div class="comments-container">
            <h1>Comments <a href="http://creaticode.com"></a></h1>
            @if( Auth::user())


                <?php $comments = \App\Comment::where('user_id', $user->id)->get();?>
                <?php $comments = \App\Comment::where('comp_id', $company->id)->get();?>
                <?php $comments = \App\Comment::where('post_id', $post->id)->get();?>

                <div id="showcom" class="row">
                    <div id="coment-form" class="col-md-8 col-md-offset-2">

                        <div class="row">
                            <div class="col-md-6">
                                {!! Form::open(['url' => 'user_comment/', 'method' => 'post']) !!}
                                {!! Form::label('comment', 'Comment') !!}
                                <div class="hidden">
                                    {!! Form::text('post_id', $post->id) !!}
                                </div>
                                <div class="hidden">
                                    {!! Form::text('user_id', $user->id) !!}
                                </div>
                                {!! Form::text('comment', '', ['class' => 'form-control']) !!}
                                {!! Form::submit('Add Coment', ['class' => 'btn btn-default']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            @endif










            <?php $comments = \App\Comment::getComment($user->user_id);?>
            <?php $comments = \App\Comment::where('user_id', $user->id)->get();?>

            @foreach($comments as $comment)
                <ul id="comments-list" class="comments-list">
                    <div class="comment-main-level">
                        <div class="comment-avatar"><img src="../uploads/avatar/{{ $user->avatar }}" alt=""></div>
                        <div class="comment-box">
                            <div class="comment-head">
                                <h6 class="comment-name"><a href="">{{ $user->firstname}}</a></h6>
                                <span>Published: {{ date('M j, Y', strtotime($comment->created_at)) }}</span>
                                <i class="fa fa-reply"></i>
                                <i class="fa fa-heart"></i>
                            </div>
                            <div class="comment-content">
                                <td>{{ $comment['comment'] }}</td>
                                <br>
                            </div>
                        </div>
                    </div>
                </ul>
            @endforeach

            @endforeach
            @foreach (\App\Company::all() as $company)
                <?php $comments = \App\Comment::getComment($company->comp_id);?>
                <?php $comments = \App\Comment::where('comp_id', $company->id)->get();?>

                @foreach($comments as $comment)
                    <ul id="comments-list" class="comments-list">
                        <div class="comment-main-level">
                            <div class="comment-avatar"><img src="../uploads/logo/{{ $company->logo }}" alt=""></div>
                            <div class="comment-box">
                                <div class="comment-head">
                                    <h6 class="comment-name"><a href="">{{ $company->companyname}}</a></h6>
                                    <span>Published: {{ date('M j, Y', strtotime($comment->created_at)) }}</span>
                                    <i class="fa fa-reply"></i>
                                    <i class="fa fa-heart"></i>
                                </div>
                                <div class="comment-content">
                                    <td>{{ $comment['comment'] }}</td>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </ul>
@endforeach

@endforeach


@include('includes.footer')
