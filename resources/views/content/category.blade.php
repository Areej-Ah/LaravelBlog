@extends('master')

@section('content')

                <article>

                            <!-- Post title-->
                            @foreach($posts as $post)
                            <h1 class="fw-bolder mb-1">
                                <a class="text-decoration-none " href="/posts/{{$post->id}}">{{$post->title}}</a>

                            </h1>
                            @if($post->url)
                            <p><img src="../upload/{{$post->url}}"></p>
                            @endif

                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">Posted on {{$post->created_at}}</div>
                            <hr>



                        <!-- Post content-->
                        <section class="mb-5">
                            <p class="fs-5 mb-4">{{$post->body}}</p>
                            <a class = "btn btn-primary" href="/posts/{{$post->id}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        </section>
                        @endforeach
                    </article>

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
                    <div>
                        @foreach($errors-> all() as $error)
                       {{$error}}  <br>

                        @endforeach
                    </div>
                    <br><br>

@stop
