<!DOCTYPE html>
<html lang="en" dir="ltr">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <link rel="stylesheet" href="{{asset('css/create-user.css')}}">

        <script src="{{asset('js/create-user.js')}}"></script>

        <script src="script.js"></script>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Fredoka">

    <title>Dashboard</title>

<!-- </style> -->
</head>
<body class="flex h-screen">
  <!-- Sidebar -->
 <div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>

    <div class="title">
        <a class="d-flex align-items-center ms-1">
          <span class="fa-stack">
            <i class="fas fa-circle fa-stack-2x text-white"></i>
            <i class="fas fa-user fa-stack-1x fa-inverse text-black"></i>
          </span>

          <div class=" text-sm mt-3">
            <div>{{ Auth::user()->name }}</div>
            <div>{{ Auth::user()->email }}</div>
          </div>
        </a>
      </div>

        <br>

  
        

        <a href="#" class="py-2 px-4 text-white hover:bg-blue-400 flex items-center" onclick="showAccounts()">
            <i class="icon"><ion-icon name="storefront-outline"></ion-icon></i>
            <span>Accounts</span>
        </a>

        <a href="#" class="py-2 px-4 text-white hover:bg-blue-400 flex items-center" onclick="showAddAccounts()">
            <i class="icon"><ion-icon name="stats-chart-sharp"></ion-icon></i>
            <span>Add accounts</span>
        </a>


    <br></br>
            <div class="icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-github"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>

            </div>

  </div>

  
  <div class="flex flex-col flex-1 main-content">
    <div>
        <div class="bar">

      <ul class="">

        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        
          <div class="flex flex-wrap items-center justify-between w-full px-4 py-3 sm:flex-no-wrap">
            <div class="flex items-center justify-center mr-6 text-white">
                <span class="text-2xl font-bold font-serif sm:text-3xl">Liquor Inventory System</span>
            </div>

            <div class="flex items-center">
                <a class="hidden text-white sm:inline-block hover:text-gray-200 mx-16" href="{{ route('logout') }}" 
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                    </form>
                </a>
            </div>
          </div>
        </div>
        
      </ul>

  </div>
</div>

    <div id="main">

      <button class="openbtn" onclick="openNav()">☰ </button>      

        <div id="content-accounts">
          <div class="flex items-center justify-between">
            <h1 class="p-2 flex text-4xl font-bold mb-10 text-black"><b>Accounts</b></h1>
          </div>

          <div class="mt-1">

            <table class="table-auto w-full">
                <thead class="text-white bg-gray-500 border-gray-500 ">
                    <tr class="text-center font bold">
                        <th class="px-4 py-2">Role</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Password</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Delete</th>
                        <th class="px-4 py-2">Disable</th>
                        <th class="px-4 py-2">Edit</th>
                    </tr>
                </thead>
                <tbody class="text-black text-center divide-y divide-gray-300">
                @foreach($users as $user)
                    <tr>
                        <td class="border px-3  py-2">
                            @if($user->role ==1)
                            Super Administrator
                            @elseif($user->role ==2)
                            Administrator
                            @elseif($user->role ==3)
                            Customer
                            @endif
                        </td>
                        <td class="border px-3  py-2">{{$user->name}}</td>
                        <td class="border px-3  py-2">{{$user->email}}</td>
                        <td class="border px-3  py-2">********</td>
                        <td @if($user->disabled== 0) style="color:green;" @elseif($user->disabled == 1) style="color:red;" @endif>
                            @if($user->disabled== 0)
                            Active
                            @elseif($user->disabled== 1)
                            Disabled
                            @endif
                        </td>
                        <td class="border px-3  py-2">
                            <form action="{{ route('softdel.user', $user->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit">DELETE</button>
                            </form>
                        </td>
                        <td class="border px-3  py-2">
                            <form action="{{ route('disable.user', $user->id) }}" method="post">
                                @csrf
                                @method('PATCH')
                                <button type="submit">DISABLE</button>
                            </form>
                        </td>
                        <td class="border px-3 py-2">
                            <div class="edit-user-container" data-user-id="{{ $user->id }}">
                                <button onclick="showEditForm({{ $user->id }})">EDIT</button>
                            </div>
                        </td>


                    </tr>
                    @endforeach
                </tbody>
            </table>
          </div>

          
          <div class="popup-form edit-user-form h-200px w-950px bg-gray-100 px-10 space-y-10 mx-auto p-11 rounded-md" data-user-id="{{ $user->id }}">
                <form id="edit-user-form-({{ $user->id }})" action="{{ route('edit.user', $user->id) }}" method="post">
                    @csrf
                    @method('PATCH')


                    <h1 class="justify-center flex text-2xl font-bold mb-5 text-black"><b>Edit Infomation</b></h1>

                    <input type="hidden" name="user_id" value="({{ $user->id }})">
                    <label for="name" class="block w-20 mr-2 font-bold dark:text-white">Name:</label>
                    <input class="border-gray-400 block py-2 px-4 w-full rounded focus:outline-none focus:border-gray-500"
                        type="text" 
                        name="name" 
                        value="{{ $user->name }}" required><br>
                    <label for="password" class="block w-20 mr-2 font-bold dark:text-white">Password:</label>
                    <input class="border-gray-400 block py-2 px-4 w-full rounded focus:outline-none focus:border-gray-500"
                        type="password" 
                        name="password" required><br>

                    <div class="flex justify-center">
                        <button type="submit" class="mr-2 text-white bg-gray-900 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">SAVE</button>
                        <button class="text-white bg-gray-900 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button" onclick="hideEditForm({{ $user->id }})">CANCEL</button>
                    </div>
                </form>
            </div>

                    

          <br> <br>
        </div>


          <div id="content-add-accounts">
            <div class="card">
              <div class="card-header">
                <h1 class="flex text-4xl font-bold mb-10 text-black"><b>Add Account</b></h1>
              </div>

               <div class= "h-900px w-950px bg-gray-100 px-10 space-y-10 mx-auto p-11 rounded-md">
              <div class="card-body">
                <form action="{{route('create.user')}}" method="post">
                  @csrf
                    <div class="flex items-center">
                      <label for="name" class="block w-20 mr-2 font-bold dark:text-white">Name:</label>
                      <input class="border-gray-400 block py-2 px-4 w-full rounded focus:outline-none focus:border-gray-500"
                            name="name" required
                            id="name"
                            type="name">
                    </div>

                    <br>


                    <div class="flex items-center">
                        <label for="email" class="block w-20 mr-2 font-bold dark:text-white">Email:</label>
                        <input class="border-gray-400 block py-2 px-4 w-full rounded focus:outline-none focus:border-gray-500"
                            name="email" required
                            id="email" 
                            type="email">
                    </div>
                    
                    <br>

                  <div class="flex items-center">
                    <label for="password" class="block w-20 mr-2 font-bold dark:text-white">Password:</label>
                    <input class="border-gray-400 block py-2 px-4 w-full rounded focus:outline-none focus:border-gray-500"
                        name="password" required
                        id="password" 
                        type="password">

                      </div>

                      <br>

                      <div class="flex items-center">
                        <label for="role" class="block w-20 mr-2 font-bold dark:text-white">Role:</label>
                        <select class="form-control border-gray-400 block py-2 px-4" name="role" id="role" required>
                          <option value="">Select a role</option>
                          <option value="2">Administrator</option>
                          <option value="3">Customer</option>
                        </select>
                      </div>

                      <br>


                      <!--<div class="form-group">
                          <label for="confirm-password">Confirm Password:</label>
                          <input required="" class="form-control" name="confirm-password" id="confirm-password" type="password">
                      </div>naa diri end comment-->
                      <input type="submit" 
                        class="btn btn-success col-md-3 text-white bg-gray-900 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" 
                        value="submit">
                  </form>
                </div>
              </div>
        </div>


    </div>

  

    

    <script src="{{asset('js/create-user.js')}}"></script>


</body