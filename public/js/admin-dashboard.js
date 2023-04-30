function openNav() {
    document.getElementById("mySidebar").classList.add("open");
    document.querySelector(".main-content").classList.add("open");
}

function closeNav() {
    document.getElementById("mySidebar").classList.remove("open");
    document.querySelector(".main-content").classList.remove("open");
}

function showPurchase() {
    var mainContent = document.querySelector(".main-content1");
    fetch("/purchase")
        .then((response) => response.text())
        .then((data) => {
            mainContent.innerHTML = data;
        })
        .catch((error) => {
            console.error("Error:", error);
        });
}

function showSales() {
    var mainContent = document.querySelector(".main-content1");
    mainContent.innerHTML = "<h1>Sale</h1><p>This is the Sale content.</p>";
}

function showProducts() {
    var mainContent = document.querySelector(".main-content1");
    fetch("/dashboard/index")
        .then((response) => response.text())
        .then((data) => {
            mainContent.innerHTML = data;
        })
        .catch((error) => {
            console.error("Error:", error);
        });
}

// function showProducts() {
//     var mainContent = document.querySelector(".main-content1");
//     fetch("/index")
//         .then((response) => response.text())
//         .then((data) => {
//             mainContent.innerHTML = data;
//             // Add event listener to the button that will redirect to create URL
//             var createBtn = document.querySelector("#create-btn");
//             createBtn.addEventListener("click", () => {
//                 fetch("/create")
//                     .then((response) => response.text())
//                     .then((data) => {
//                         mainContent.innerHTML = data;
//                     })
//                     .catch((error) => {
//                         console.error("Error:", error);
//                     });
//             });
//         })
//         .catch((error) => {
//             console.error("Error:", error);
//         });
// }

function showSuppliers() {
    var mainContent = document.querySelector(".main-content1");
    fetch("/supplier")
        .then((response) => response.text())
        .then((data) => {
            mainContent.innerHTML = data;
        })
        .catch((error) => {
            console.error("Error:", error);
        });
}

function showCustomers() {
    var mainContent = document.querySelector(".main-content1");
    mainContent.innerHTML =
        "<h1>SystemUsers</h1><p>This is the SystemUsers content.</p>";
}

// SIDEBAR DROPDOWN
const allDropdown = document.querySelectorAll("#sidebar .side-dropdown");
const sidebar = document.getElementById("sidebar");

allDropdown.forEach((item) => {
    const a = item.parentElement.querySelector("a:first-child");
    a.addEventListener("click", function (e) {
        e.preventDefault();

        if (!this.classList.contains("active")) {
            allDropdown.forEach((i) => {
                const aLink = i.parentElement.querySelector("a:first-child");

                aLink.classList.remove("active");
                i.classList.remove("show");
            });
        }

        this.classList.toggle("active");
        item.classList.toggle("show");
    });
});

// SIDEBAR COLLAPSE
const toggleSidebar = document.querySelector("nav .toggle-sidebar");
const allSideDivider = document.querySelectorAll("#sidebar .divider");

if (sidebar.classList.contains("hide")) {
    allSideDivider.forEach((item) => {
        item.textContent = "-";
    });
    allDropdown.forEach((item) => {
        const a = item.parentElement.querySelector("a:first-child");
        a.classList.remove("active");
        item.classList.remove("show");
    });
} else {
    allSideDivider.forEach((item) => {
        item.textContent = item.dataset.text;
    });
}

toggleSidebar.addEventListener("click", function () {
    sidebar.classList.toggle("hide");

    if (sidebar.classList.contains("hide")) {
        allSideDivider.forEach((item) => {
            item.textContent = "-";
        });

        allDropdown.forEach((item) => {
            const a = item.parentElement.querySelector("a:first-child");
            a.classList.remove("active");
            item.classList.remove("show");
        });
    } else {
        allSideDivider.forEach((item) => {
            item.textContent = item.dataset.text;
        });
    }
});

sidebar.addEventListener("mouseleave", function () {
    if (this.classList.contains("hide")) {
        allDropdown.forEach((item) => {
            const a = item.parentElement.querySelector("a:first-child");
            a.classList.remove("active");
            item.classList.remove("show");
        });
        allSideDivider.forEach((item) => {
            item.textContent = "-";
        });
    }
});

sidebar.addEventListener("mouseenter", function () {
    if (this.classList.contains("hide")) {
        allDropdown.forEach((item) => {
            const a = item.parentElement.querySelector("a:first-child");
            a.classList.remove("active");
            item.classList.remove("show");
        });
        allSideDivider.forEach((item) => {
            item.textContent = item.dataset.text;
        });
    }
});

// PROFILE DROPDOWN
const profile = document.querySelector("nav .profile");
const imgProfile = profile.querySelector("img");
const dropdownProfile = profile.querySelector(".profile-link");

imgProfile.addEventListener("click", function () {
    dropdownProfile.classList.toggle("show");
});

// MENU
const allMenu = document.querySelectorAll("main .content-data .head .menu");

allMenu.forEach((item) => {
    const icon = item.querySelector(".icon");
    const menuLink = item.querySelector(".menu-link");

    icon.addEventListener("click", function () {
        menuLink.classList.toggle("show");
    });
});

window.addEventListener("click", function (e) {
    if (e.target !== imgProfile) {
        if (e.target !== dropdownProfile) {
            if (dropdownProfile.classList.contains("show")) {
                dropdownProfile.classList.remove("show");
            }
        }
    }

    allMenu.forEach((item) => {
        const icon = item.querySelector(".icon");
        const menuLink = item.querySelector(".menu-link");

        if (e.target !== icon) {
            if (e.target !== menuLink) {
                if (menuLink.classList.contains("show")) {
                    menuLink.classList.remove("show");
                }
            }
        }
    });
});

// PROGRESSBAR
const allProgress = document.querySelectorAll("main .card .progress");

allProgress.forEach((item) => {
    item.style.setProperty("--value", item.dataset.value);
});

// APEXCHART
var options = {
    series: [
        {
            name: "series1",
            data: [31, 40, 28, 51, 42, 109, 100],
        },
        {
            name: "series2",
            data: [11, 32, 45, 32, 34, 52, 41],
        },
    ],
    chart: {
        height: 350,
        type: "area",
    },
    dataLabels: {
        enabled: false,
    },
    stroke: {
        curve: "smooth",
    },
    xaxis: {
        type: "datetime",
        categories: [
            "2018-09-19T00:00:00.000Z",
            "2018-09-19T01:30:00.000Z",
            "2018-09-19T02:30:00.000Z",
            "2018-09-19T03:30:00.000Z",
            "2018-09-19T04:30:00.000Z",
            "2018-09-19T05:30:00.000Z",
            "2018-09-19T06:30:00.000Z",
        ],
    },
    tooltip: {
        x: {
            format: "dd/MM/yy HH:mm",
        },
    },
};

// function showPopupForm() {
//     var form = document.getElementById("popup-form");
//     form.style.display = "block";
// }

// function hidePopupForm() {
//     var form = document.getElementById("popup-form");
//     form.style.display = "none";
// }

function showPopupForm() {
    document.getElementById("popup-form").classList.remove("hidden");
    var form = document.getElementById("popup-form");
    form.style.display = "block";
}

function hidePopupForm() {
    var form = document.getElementById("popup-form");
    form.style.display = "none";
}
