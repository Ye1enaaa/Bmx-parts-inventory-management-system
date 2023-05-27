$(document).ready(function () {
    $(".slider").slick({
        dots: true,
        arrows: false,
    });
});

function addOverlay() {
    const overlay = document.createElement("div");
    overlay.classList.add(
        "overlay",
        "w-full",
        "h-screen",
        "bg-gradient-to-b",
        "from-black",
        "to-black",
        "absolute",
        "top-0"
    );
    document.body.appendChild(overlay);
}

// call the function to add the overlay
addOverlay();

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

function slider() {
    if (i > len - 1) {
        i = 0;
    }
    slideImg.src = images[i];
    i++;
    setTimeout("slider()", 3000);
}
