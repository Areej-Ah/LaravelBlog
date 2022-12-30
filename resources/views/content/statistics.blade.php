@extends('master')

@section('content')
<div class="col-md-8">
    <h1 class="page-header">
    Statistics
      <small>Website statistics</small>
    </h1>

    <div>
        <table class="table table-hover">
            <tr>
                <td>All Users</td>
                <td>{{$statistics['users']}}</td>
            </tr>
            <tr>
                <td>All Posts</td>
                <td>{{$statistics['posts']}}</td>
            </tr>
            <tr>
                <td>All Comments</td>
                <td>{{$statistics['comments']}}</td>
            </tr>
            <tr>
                <td>Most Active User</td>
                <td><b>{{$statistics['active_user']}}</b>, Likes({{$statistics['active_user_likes']}})
                    Comments({{$statistics['active_user_comments']}})</td>
            </tr>
            <tr>
                <td>Most Active Post</td>
                <td></td>
            </tr>

        </table>
    </div>



</div>
@stop
