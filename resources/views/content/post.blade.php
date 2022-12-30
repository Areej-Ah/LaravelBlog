@extends('master')

@section('content')
<article>

                            <!-- Post title-->

                            <h1 class="fw-bolder mb-1">
                                <a class="text-decoration-none " href="#">{{$post->title}}</a>

                            </h1>

                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">Posted on {{$post->created_at->toDayDateTimeString()}}</div>
                            <hr>

                        <!-- Preview image figure-->
                        @if($post->url)
                            <p><img src="../upload/{{$post->url}}"></p>
                            @endif

                        <!-- Post content-->
                        <section class="mb-5">
                            <p class="fs-5 mb-4">{{$post->body}}</p>


                        </section>
                        <br>
                        <div class="comments">
                            @foreach ($post->comments as $comment)
                            <div class="comments">
                                <p class="comment-time">
                                    <span class="glyphicon glyphicon-time"></span>


                                </p>
                              <p class="comment">{{$comment->body}}</p>
                            </div>
                            @endforeach

                        </div>

                    </article>
                    @if($stop_comment == 1)
                    <h3>Comments Are Currentl Closeed</h3>
                    @else
                    <form method="POST" action="/posts/{{$post -> id}}/store" >
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="body">Write Something...</label>
                            <textarea name="body" id="body" class="form-control"></textarea>

                        </div>
                        <br>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add Comment</button>
                            <br><br>

                        </div>

                    </form>
                    @endif
@stop
