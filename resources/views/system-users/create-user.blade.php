<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/create-user.css') }}">
    <!--<link rel="stylesheet" href="styles.css">-->
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Fredoka">
    <!--<script src="script.js"></script>-->
    <script src="{{asset('js/create-user.js')}}"></script>
    <title>System User</title>
</head>

<body>
    
    <div class="sidebar">
        <div class="title">
            <h2>Super Admin</h2>
        </div>
        <div class = "menus">
            <ul>
                <li onclick = "acctClick()">Accounts</li>
                <li onclick="addAccount()">Add accounts</li>
            </ul>
        </div>
    </div>
    <!--Main-->
  
    <div class="flex flex-col flex-1">
    <!-- Top Bar -->
        <div>
          @yield('top-bar')  
        </div>



    <div id ="trys">
        <h1 class ="acc-title">Accounts</h1>
        <table class="table-styles">
            <thead>
                <tr>
                    <th>Role</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Status</th>
                    <th>Delete</th>
                    <th>Disable</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>
                        @if($user->role ==1)
                        Super Administrator
                        @elseif($user->role ==2)
                        Administrator
                        @elseif($user->role ==3)
                        Customer
                        @endif
                    </td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>********</td>
                    <td @if($user->disabled== 0) style="color:green;" @elseif($user->disabled == 1) style="color:red;" @endif>
                        @if($user->disabled== 0)
                        Active
                        @elseif($user->disabled== 1)
                        Disabled
                        @endif
                    </td>
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
                    <td>
                        <button onclick="showEditForm({{ $user->id }})">EDIT</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <div id ="add">
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
        <div class="form-group">
            <label for="role">Role:</label>
                <select class="form-control"name="role" id="role" required>
                    <option value="">Select a role</option>
                    <option value="2">Administrator</option>
                    <option value="3">Customer</option>
                </select>
        </div>
        <!--<div class="form-group">
            <label for="confirm-password">Confirm Password:</label>
            <input required="" class="form-control" name="confirm-password" id="confirm-password" type="password">
        </div>naa diri end comment-->
        <input type="submit" class="btn" value="submit">
    </form>
    </div>
    </div>
    </div>
    <div class="screen" id="acct">
        
    </div>
</div>

    <!--POP UP EDIT-->
    <div id="edit-user-form-{{ $user->id }}" class="popup-form">
        <form action="{{route('edit.user', $user->id)}}" method="post">
            @csrf
            @method('PATCH')
            <label for="name">Name:</label>
            <input type="text" name="name" value="{{ $user->name }}" required><br>
            <label for="password">Password:</label>
            <input type="password" name="password" required><br>
            <button type="submit">SAVE</button>
            <button type="button" onclick="hideEditForm({{ $user->id }})">CANCEL</button>
        </form>
    </div>
</body>
</html>