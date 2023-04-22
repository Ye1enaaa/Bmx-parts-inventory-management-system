<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=105">
    <link rel="stylesheet" href="{{ asset('css/welcome-blade.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    <script src="{{ asset('assets/welcome.blade.pictures') }}"></script>


    <title>Liquor Inventory management</title>    

   <script src="https://cdn.tailwindcss.com"></script>


  </head>

    <body onload="slider()">

      <div class="banner">
        <div class="slider">
          <img src="{{ asset('assets/pictures/1.jpg') }}" id="slideImg">
        </div>
        
        <div class="overlay">
          <div class="navbar">
            <div class="logo">
              <img src="{{ asset('assets/pictures/logo.png') }}">
            </div>

            <div>
              <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline" onclick="location.href='/login'">Login</button>                  
              <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline" onclick="location.href='/register'" style="margin-left: 40px; margin-right: 40px;">Register</button>
          </div>



          </div>


          <div class="content">

                <h1>Liquor Inventory System</h1>
                <h3>Managing your liquor, managing your business, it will lead you to success.</h3>

                 <div class="icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-github"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>

                  </div>
          </div>


        </div>

      </div>
      
      <script>
        var slideImg = document.getElementById("slideImg");

        var images = new Array(
              "assets/pictures/1.jpg",
              "assets/pictures/2.jpg",
              "assets/pictures/3.jpg",
              "assets/pictures/4.jpg",
              "assets/pictures/5.jpg",
              "assets/pictures/6.jpg"

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
