<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=105">
    <link rel="stylesheet" href="{{ asset('css/welcome-blade.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    <script src="{{ asset('assets/welcome.blade.pictures') }}"></script>


    <title>BMX Bike Parts Inventory management</title>    

   <script src="https://cdn.tailwindcss.com"></script>


  </head>

    <body onload="slider()">

      <div class="banner">
        <div class="slider">
          <img src="{{ asset('assets/pictures/2.png') }}" id="slideImg">
        </div>
        
        <div class="overlay">
          
          <div class="fixed flex-wrap justify-between h-16 w-full left-0 right-0 bg-[#6DA5C0]">

              <div class="flex justify-start py-3">

                  <div class="-my-4 logo w-20 ml-10 flex-shrink-0">
                      <img src="{{ asset('assets/pictures/bmx.png') }}" class="h-full w-full object-contain">
                  </div>

                  <div class="flex justify-end items-center mr-10 flex-1">
                      <button class="bg-[#294D61] hover:bg-[#4c7287] text-white font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline" onclick="location.href='/login'">Login</button>                  
                      <button class="bg-[#294D61] hover:bg-[#4c7287] text-white font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline ml-4" onclick="location.href='/register'">Register</button>
                  </div>

              </div>
            </div>



          <div class="content font-poppins">
            <h1>Bicycle Moto Cross Inventory Management</h1>
            <h3>Invest in BMX bike parts that are reliable and true, and watch your performance and success come shining through.</h3>
          </div>

          <div class="flex-wrap justify-between h-16 w-full left-0 right-0 fixed bottom-0 bg-[#6DA5C0] text-black px-3 font-poppins">
            <div class="py-4 pb-5">
              <h3 class="text-center">&copy; 2023 System, Inc. All rights reserved. BMX Bike Parts Inventory Management System.</h3>
            </div>
          </div>  




        </div>

      </div>
      
      <script>
        var slideImg = document.getElementById("slideImg");

        var images = new Array(
              "assets/pictures/1.png",
              "assets/pictures/2.png",
              "assets/pictures/3.png",
              "assets/pictures/4.png",
              "assets/pictures/5.png",
              "assets/pictures/6.png",
              "assets/pictures/7.png",
              "assets/pictures/8.png",
              "assets/pictures/9.jpg",
              "assets/pictures/10.jpg"

        );

        var len = images.length;
        var i = 0;

        function slider(){
          if (i > len-1){
            i = 0;
          }
          slideImg.src = images[i];
          i++;
          setTimeout('slider()',3000);
        }

      </script>


    </body>

</html>
