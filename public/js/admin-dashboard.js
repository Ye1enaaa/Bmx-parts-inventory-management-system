function openNav() {
    const sidebar = document.getElementById("mySidebar");
    const mainContent = document.querySelector(".main-content");
    if (sidebar.classList.contains("open")) {
        sidebar.classList.remove("open");
        mainContent.classList.remove("open");
    } else {
        sidebar.classList.add("open");
        mainContent.classList.add("open");
    }
}

function closeNav() {
    document.getElementById("mySidebar").classList.remove("open");
    document.querySelector(".main-content").classList.remove("open");
}

// function showPurchase() {
//     var mainContent = document.querySelector(".main-content1");
//     fetch("/purchase")
//         .then((response) => response.text())
//         .then((data) => {
//             mainContent.innerHTML = data;
//         })
//         .catch((error) => {
//             console.error("Error:", error);
//         });
// }

// function showSales() {
//     var mainContent = document.querySelector(".main-content1");
//     fetch("/graphs")
//         .then((response) => response.text())
//         .then((data) => {
//             mainContent.innerHTML = data;
//         })
//         .catch((error) => {
//             console.error("Error:", error);
//         });
// }

function showProducts() {
    var mainContent = document.querySelector(".main-content1");
    fetch("/index")
        .then((response) => response.text())
        .then((data) => {
            mainContent.innerHTML = data;
        })
        .catch((error) => {
            console.error("Error:", error);
        });
}

function showSupplierInformation() {
    var mainContent = document.querySelector(".main-content1");
    fetch("/supplier-information")
        .then((response) => response.text())
        .then((data) => {
            mainContent.innerHTML = data;
        })
        .catch((error) => {
            console.error("Error:", error);
        });
}

function showAddSupplier() {
    var mainContent = document.querySelector(".main-content1");
    fetch("/add-supplier")
        .then((response) => response.text())
        .then((data) => {
            mainContent.innerHTML = data;
        })
        .catch((error) => {
            console.error("Error:", error);
        });
}

// SIDEBAR DROPDOWN
// const allDropdown = document.querySelectorAll("#sidebar .side-dropdown");
// const sidebar = document.getElementById("sidebar");

// allDropdown.forEach((item) => {
//     const a = item.parentElement.querySelector("a:first-child");
//     a.addEventListener("click", function (e) {
//         e.preventDefault();

//         if (!this.classList.contains("active")) {
//             allDropdown.forEach((i) => {
//                 const aLink = i.parentElement.querySelector("a:first-child");

//                 aLink.classList.remove("active");
//                 i.classList.remove("show");
//             });
//         }

//         this.classList.toggle("active");
//         item.classList.toggle("show");
//     });
// });

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

function showPopupForm() {
    document.getElementById("popup-form").classList.remove("hidden");
    var form = document.getElementById("popup-form");
    form.style.display = "block";
}

function hidePopupForm() {
    var form = document.getElementById("popup-form");
    form.style.display = "none";
}

// sa product - form ni siya
function showEditForm(event) {
    event.preventDefault();
    document.getElementById("edit-form").style.display = "block";
}

// Add form validation here
var form = document.getElementById("product-form");
form.addEventListener("submit", function (event) {
    // Add validation code here
});

function hideEditForm() {
    document.getElementById("edit-form").style.display = "none";
}

function toggleDropdown() {
    var dropdown = document.getElementById("supplierDropdown");
    dropdown.classList.toggle("hidden");
}

function confirmLogout(event) {
    event.preventDefault();

    if (confirm("Are you sure you want to logout?")) {
        document.getElementById("logout-form").submit();
    }
}

//----------------------------------------EDITED BY ERICKSON---------------------------\\
function showAlertWinStock() {
    window.alert("Stock is below 10, see list!");
}

// const stocks = document.querySelectorAll('.main-liquor-data-show tbody tr');
// stocks.forEach(stock => {
//   const quantity = parseInt(stock.querySelector(`#checkValue${stock.dataset.productId}`).textContent);
//   if (quantity < 5) {
//     stock.classList.add('bg-red-500');
//     showAlertWinStock();
//   }
// });

document.addEventListener("DOMContentLoaded", function () {
    // Get all the table rows
    const rows = document.querySelectorAll("tbody tr");

    // Iterate over each row
    rows.forEach((row) => {
        // Find the stock value cell within the row
        const stockCell = row.querySelector("#checkValueData");
        // Get the stock value
        const stockValue = parseInt(stockCell.textContent);

        // Check if the stock value is below 5 and show an alert
        if (stockValue < 5) {
            window.alert("Stock is below 10, see list!");
        }
    });
});

console.log("Buang");
