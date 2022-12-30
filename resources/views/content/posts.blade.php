@extends('master')

@section('content')

    <article>

        <!-- Post title-->
        @foreach($posts as $post)
        <h1 class="fw-bolder mb-1">
            <a class="text-decoration-none " href="/posts/{{$post->id}}">{{$post->title}}</a>

        </h1>


        <!-- Post meta content-->
        <div class="text-muted fst-italic mb-2">Posted on {{$post->created_at}}
            - <strong>Category:</strong> <a href="../category/{{$post-> category-> name}}">{{$post-> category-> name}}</a>
        </div>
        @if($post->url)
        <p><img src="upload/{{$post->url}}"></p>
        @endif
        <hr>



        <!-- Post content-->
        <section class="mb-5">
            <p class="fs-5 mb-4">{{$post->body}}</p>
            <a class = "btn btn-primary" href="/posts/{{$post->id}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
            @php
            $like_count = 0;
            $dislike_count = 0;
            $like_status = "btn-secondary";
            $dislike_status = "btn-secondary";


            @endphp
            @foreach ($post->likes as $like)

            @php
            if ($like->like == 1)
                {
                    $like_count ++;
                }
            if ($like->like == 0)
                {
                    $dislike_count ++;
                }
            if(Auth::check())
            {
                if ($like->like == 1 && $like->user_id == Auth::user()->id)
                {
                    $like_status = "btn-success";
                }
                if ($like->like == 0 && $like->user_id == Auth::user()->id)
                {
                    $dislike_status = "btn-danger";
                }
            }

            @endphp

            @endforeach

            <button  type="button" data-postid="{{$post->id}}_l" data-like="{{  $like_status }}"
             class="like btn {{  $like_status }}">Like <i class="bi bi-hand-thumbs-up"></i>
             <b><span class="like_count">{{$like_count}}</span></b></button>

             <button  type="button" data-postid="{{$post->id}}_d"
             class="dislike btn {{  $dislike_status }}">DisLike <i class="bi bi-hand-thumbs-down"></i>
             <b><span class="dislike_count">{{$dislike_count}}</span></b></button>

        </section>
            @endforeach
    </article>

            @if(Auth::check())
            @if(Auth::user() -> hasRole('Admin') || Auth::user() -> hasRole('Editor'))
            <form method="POST" action="/posts/store" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control">

                </div>
                <br>
                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea name="body" id="body" class="form-control"></textarea>

                </div>
                <br>
                <div class="form-group">
                    <label for="url">Image</label>
                    <input type="file" name="url" id="url" >

                </div>
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Post</button>
                    <br><br>

                </div>

            </form>
            @endif
            @endif
            <div>
            @foreach($errors-> all() as $error)
            {{$error}}  <br>

            @endforeach
            </div>
            <br><br>

@stop
