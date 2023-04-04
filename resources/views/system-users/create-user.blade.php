<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/create-user.css') }}">
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Fredoka">
    <title>System User</title>
</head>
<body>
    <div class="card">
        <div class="card-header">
            <div class="text-header">Register</div>
        </div>
    <div class="card-body">
        <form action="{{route('create.user')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input required="" class="form-control" name="name" id="name" type="text">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input required="" class="form-control" name="email" id="email" type="email">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input required="" class="form-control" name="password" id="password" type="password">
        </div>
        <!--<div class="form-group">
            <label for="confirm-password">Confirm Password:</label>
            <input required="" class="form-control" name="confirm-password" id="confirm-password" type="password">
        </div>-->
        <input type="submit" class="btn" value="submit">
    </form>
    </div>
    </div>
    <div class="list-users">
        <div class="list-user-table">
            <table class="table-style">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Soft Delete</th>
                        <th>Disable</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr class="table-body">
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>********</td>
                        <td>
                            <form action="{{ route('softdel.user', $user->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit">DELETE</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('disable.user', $user->id) }}" method="post">
                                @csrf
                                @method('PATCH')
                                <button type="submit">DISABLE</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>