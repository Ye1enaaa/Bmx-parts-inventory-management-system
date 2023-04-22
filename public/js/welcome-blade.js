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
