@extends('master')

@section('content')
<div class="col-md-8">
    <h4>Control Panel</h4>
    <h6>List of Users</h6>
    <div>
        <table class="table table-hover">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>User</th>
                <th>Editor</th>
                <th>Admin</th>
            </tr>
            @foreach($users as $user)
            <form method="post" action="/add-role">
                {{csrf_field()}}
                <input type="hidden" name="email" value="{{$user -> email}}">
            <tr>
                <th>{{$user -> id}}</th>
                <td>{{$user -> name}}</td>
                <td>{{$user -> email}}</td>
                <td>
                    <input type="checkbox" onChange="this.form.submit()" name="role_user" {{$user -> hasRole('User') ? 'checked' : ' ' }}>
                </td>
                <td>
                <input type="checkbox" onChange="this.form.submit()" name="role_editor" {{$user -> hasRole('Editor') ? 'checked' : ' ' }}>
                </td>
                <td>
                <input type="checkbox" onChange="this.form.submit()" name="role_admin" {{$user -> hasRole('Admin') ? 'checked' : ' ' }}>
                </td>
            </tr>

            </form>
            @endforeach
        </table>
    </div>

    <div>
        <h3>Settind</h3>
        <form method="post" action="/settings">
        {{csrf_field()}}
        Stop Comment: <input type="checkbox" name="stop_comment"
        onChange="this.form.submit()" {{ $stop_comment == 1 ? 'checked' : ' ' }}>

        Stop Register: <input type="checkbox" name="stop_register"
        onChange="this.form.submit()" {{ $stop_register == 1 ? 'checked' : ' ' }} >
        </form>
    </div>

</div>
@stop
