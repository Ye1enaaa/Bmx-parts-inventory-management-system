<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=105">
    <link rel="stylesheet" href="{{ asset('css/create-user.css') }}">

    <title>Liquor Inventory management</title>    
   <!-- Fonts -->
   <!--<link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">-->
   <!-- Bootstrap -->
   <!--<link rel="stylesheet" href="https://cdn.tailwindcss.com">-->
   <script src="https://cdn.tailwindcss.com"></script>
   <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />-->

  </head>
    <body>
      <div class="w-full h-full bg-cover bg-center blur-ms">
        <div style="background-image: url('https://cdn.pixabay.com/photo/2016/11/21/13/04/alcoholic-beverages-1845295_960_720.jpg');"> 
            <div class="w-full h-full flex  justify-center items-center backdrop-blur-md">
                <span class="card w-96 p-6 shadow-lg bg-white rounded-md ">
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
                        <label for="confirm-password">Confirm Password:</label>
                        <input required="" class="form-control" name="confirm-password" id="confirm-password" type="password">
                      </div>

                        <input type="submit" class="btn" value="submit">
                      </form>
                </div>
          </div>



              </span>
        
            </div>
        </div>
      </div>

        
    </body>
</html> 