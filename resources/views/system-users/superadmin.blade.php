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
   </head>
   <body class="flex h-screen">
      <!-- Sidebar -->
      <div id="mySidebar" class="sidebar open">
         <div class="title">
            <a class="d-flex align-items-center ms-1">
               <div class="w-12 h-12 rounded-full overflow-hidden">
                  @if(Auth::user()->image)
                  <img src="{{ env('HOST_URL') }}./storage/{{Auth::user()->image}}" class="w-full h-full object-cover" alt="Profile Picture">
                  @elseif(Auth::user()->image == null)
                  <img src="{{ asset('assets/pictures/userasuser.png')}}" alt="">
                  @endif
               </div>
               <div class=" text-sm mt-3">
                  <div>{{ Auth::user()->name }}</div>
                  <div>{{ Auth::user()->email }}</div>
               </div>
            </a>
         </div>
         <br>
         <a href="#" class="py-2 px-4 text-white hover:bg-blue-400 flex items-center" onclick="showAccounts()">
            <i class="icon">
               <ion-icon name="people"></ion-icon>
            </i>
            <span>User account</span>
         </a>
         <a href="#" class="py-2 px-4 text-white hover:bg-blue-400 flex items-center" onclick="showAddAccounts()">
            <i class="icon">
               <ion-icon name="person-add"></ion-icon>
            </i>
            <span>Accounts</span>
         </a>
      </div>
      <div class="flex flex-col flex-1 main-content open">
      <div>
         <div class="bar">
            <ul class="">
               <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                  <div class="flex flex-wrap items-center justify-between w-full px-4 py-3 sm:flex-no-wrap">
                     <div class="flex items-center justify-center mr-6 text-white">
                        <span class="text-1xl font-bold sm:text-2xl">BMX: Dirt Jump Parts Inventory System</span>
                     </div>
                     <div class="flex items-center">
                        <div class="profile-container" style="padding: 1px; display: flex; align-items: center;">
                           <a class="flex items-center" id="profile-link">
                              <div class="w-10 h-10 rounded-full overflow-hidden">
                                 @if(Auth::user()->image)
                                 <img src="{{env('HOST_URL')}}./storage/{{Auth::user()->image}}" class="w-full h-full object-cover" alt="Profile">
                                 @elseif(Auth::user()->image == null)
                                 <img src="{{ asset('assets/pictures/userasuser.png')}}" alt="">
                                 @endif
                              </div>
                              <span class="ml-2 name" style="color: #FFFFFF;">Super Admin</span>&nbsp;
                           </a>
                           <a class="hidden text-white sm:inline-block hover:text-gray-200" href="#" onclick="confirmLogout(event)">
                           <i class="fas fa-sign-out-alt mr-2"></i>
                           </a>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                           @csrf
                        </form>
                     </div>
                  </div>
               </div>
            </ul>
         </div>
      </div>
      <br> <br> <br> 
      <div id="main">
         <div class="box bg-gray-200 p-1 w-full">
            <button class="openbtn" onclick="openNav()">☰</button>
            <span id="dashboardText" class="dashboard-text font-bold text-base">Inventory System</span>
         </div>   
         <div id="content-accounts">
            <div class="flex items-center justify-between">
               <h1 class="p-2 flex text-4xl font-bold mb-10 text-black"><b>Accounts</b></h1>
            </div>
            <div class="mt-1">
               <table class="table-auto w-full">
                  <thead class="text-white bg-gray-500 border-gray-500 ">
                     <tr class="text-center font bold">
                        <th class="px-4 py-2">Role</th>
                        <th class="px-4 py-2">Image</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Password</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Soft Delete</th>
                        <th class="px-4 py-2">Disable</th>
                        <th class="px-4 py-2">Enable</th>
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
                           Staff
                           @endif
                        </td>
                        <td class="border px-3 py-2">
                           @if($user->image == null)
                           <img class="small-image" src="{{ asset('assets/pictures/userasuser.png')}}" alt="">
                           @elseif($user->image)
                           <img class="small-image" src="{{ env('HOST_URL')}}./storage/{{$user->image}}" alt="">
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
                              <button type="submit" style="color: red;">DELETE</button>
                           </form>
                        </td>
                        <td class="border px-3  py-2">
                           <form action="{{ route('disable.user', $user->id) }}" method="post">
                              @csrf
                              @method('PATCH')
                              <button type="submit" style="color: purple;">DISABLE</button>
                           </form>
                        </td>
                        <td class="border px-3  py-2">
                           <form action="{{ route('enable.user', $user->id) }}" method="post">
                              @csrf
                              @method('PATCH')
                              <button type="submit" style="color: GREEN;">ENABLE</button>
                           </form>
                        </td>
                        <td class="border px-3 py-2">
                           <div class="edit-user-container" data-user-id="{{ $user->id }}">
                              <button onclick="showEditForm({{ $user->id }})" style="color: #FFB700;">EDIT</button>
                           </div>
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
            <div class="popup-form edit-user-form h-300px w-950px  px-10 space-y-10 mx-auto p-11 bg-gray-200 shadow-md" data-user-id="{{ $user->id }}">
               <form id="edit-user-form-({{ $user->id }})" action="{{ route('edit.user', $user->id) }}" method="post">
                  @csrf
                  @method('PUT')
                  <h1 class="justify-center flex text-4xl font-bold mb-5 text-black"><b>Edit Infomation</b></h1>
                  <input type="hidden" name="user_id" value="{{ $user->id }}">
                  <label for="name" class="block w-20 mr-2 font-bold dark:text-gray">Name:</label>
                  <input class="border-black block py-2 px-4 w-full rounded focus:outline-none focus:border-black"
                     type="text" 
                     name="name" 
                     value="{{ $user->name }}" required><br>
                  <label for="password" class="block w-20 mr-2 font-bold dark:text-gray">Password:</label>
                  <input class="border-black block py-2 px-4 w-full rounded focus:outline-none focus:border-black"
                     type="password" 
                     name="password" required><br>
                  <label for="image" class="block w-20 mr-2 font-bold dark:text-gray">Picture:</label>
                  <input type="file" name="image" id="imageInput">
                  <div class="flex justify-center">
                     <button type="submit" class="mr-2 text-white bg-gray-900 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 text-center ">SAVE</button>
                     <button class="text-white bg-gray-900 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center "
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
               <div class= "h-900px w-950px bg-gray-300 px-10 space-y-10 mx-auto p-11  shadow-md">
                  <div class="card-body">
                     <form action="{{route('create.user')}}" method="post" enctype='multipart/form-data'>
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
                        <div class="flex items-center form-group">
                           <div class="flex items-center justify-between w-full">
                              <label for="confirm-password" class="block w-20 mr-2 font-bold dark:text-white">Confirm Password:</label>
                              <div class="relative flex-grow">
                                 <input class="border-gray-400 block py-2 px-4 w-full rounded focus:outline-none focus:border-gray-500"
                                    name="confirm-password" required
                                    id="confirm-password" 
                                    type="password">
                                 <span id="password-error" class="text-red-500 absolute left-0"></span>
                              </div>
                           </div>
                        </div>
                        <br>
                        <div class="flex items-center w-full">
                           <label for="role" class="block w-20 mr-2 font-bold dark:text-white">Role:</label>
                           <select class="form-control border-gray-400 block py-2 px-4 w-full" name="role" id="role" required>
                              <option value="">Select a role</option>
                              <option value="2">Administrator</option>
                              <option value="3">Staff</option>
                           </select>
                        </div>
                        <br>
                        <input type="file" name="image" id="">
                        <br>
                        <div class="flex justify-center">
                           <input type="submit" 
                              class="btn btn-success col-md-3 text-white bg-gray-900 hover:bg-gray-700 font-medium rounded-lg text-sm px-16 py-2.5 text-center" 
                              value="submit">
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script>
         const passwordInput = document.getElementById('password');
         const confirmPasswordInput = document.getElementById('confirm-password');
         const passwordError = document.getElementById('password-error');
         
         confirmPasswordInput.addEventListener('input', function() {
           const password = passwordInput.value;
           const confirmPassword = confirmPasswordInput.value;
         
           if (password !== confirmPassword) {
             passwordError.textContent = 'Passwords do not match';
           } else {
             passwordError.textContent = '';
           }
         });
      </script>
   </body>
</html>