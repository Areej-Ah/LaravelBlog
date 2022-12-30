@extends('master')

@section('content')
<div class="col-md-8">
    <h3>LogIn</h3>
    <form method="post" action="/login">
        {{csrf_field()}}

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" name="email" value="{{old('email')}}" class="form-control form-app" placeholder="Email Address">

        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password"name="password" value="" class="form-control form-app" placeholder="Password" >

        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-submit">LogIn</button>

        </div>
    </form>
    <div>
    @foreach($errors-> all() as $error)
    {{$error}}  <br>

    @endforeach
    </div>


</div>

@stop
