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

function showSales() {
    // Make an AJAX request to fetch the content of the sales graphs page
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Extract the specific content from the response
            var parser = new DOMParser();
            var htmlDoc = parser.parseFromString(xhr.responseText, "text/html");
            var salesGraphsContent =
                htmlDoc.getElementById("salesGraphsContent").innerHTML;

            // Update the content on the current page with the fetched content
            document.querySelector(".main-content1").innerHTML =
                salesGraphsContent;

            // Initialize the chart

            // Scroll to the top of the page
            window.scrollTo(0, 0);
        }
    };
    xhr.open("GET", "/graphs", true);
    xhr.send();
}

function showUnderstock() {
    // Make an AJAX request to fetch the content of the upcoming events page
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Update the content on the current page with the fetched content
            var response = xhr.responseText;
            document.querySelector(".main-content1").innerHTML = response;

            // Scroll to the top of the page
            window.scrollTo(0, 0);
        }
    };
    xhr.open("GET", "/index/understocks", true);
    xhr.send();
}

function showstockcard(id) {
    // Make an AJAX request to fetch the content of the stock card page for the given id
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Update the content on the current page with the fetched content
            var response = xhr.responseText;
            document.querySelector(".main-content1").innerHTML = response;

            // Scroll to the top of the page
            window.scrollTo(0, 0);
        }
    };
    xhr.open("GET", "/stockcard/" + id, true);
    xhr.send();
}

function showProducts() {
    // Make an AJAX request to fetch the content of the upcoming events page
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Update the content on the current page with the fetched content
            var response = xhr.responseText;
            document.querySelector(".main-content1").innerHTML = response;

            // Scroll to the top of the page
            window.scrollTo(0, 0);
        }
    };
    xhr.open("GET", "/index", true);
    xhr.send();
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
    console.log("Hello");
});

// document.addEventListener("DOMContentLoaded", function() {
//     var stockValue = document.getElementById("checkValueData").innerText;
//     if (parseInt(stockValue) <= 10) {
//       var notificationDiv = document.getElementById("stock-notification");
//       notificationDiv.classList.remove("hidden");
//       notificationDiv.classList.add("visible");
//     }
// });

// document.addEventListener("DOMContentLoaded", function() {
//     var stockCells = document.querySelectorAll("#checkValueData");
//     console.log(stockCells);
//     stockCells.forEach(function(cell) {
//       var stockValue = parseInt(cell.innerText);
//       if (stockValue <= 10) {
//         var notificationDiv = document.getElementById("stock-notification");
//         notificationDiv.classList.remove("hidden");
//         notificationDiv.classList.add("visible");
//         // You may also consider updating the notification message dynamically based on the product details
//       }
//     });
// });

//----------------------------------------EDITED BY JOEPHINE---------------------------\\

function filterStockCardByMonth(month) {
    var rows = document.querySelectorAll("tbody tr");

    rows.forEach(function (row) {
        var date = row.querySelector("td:first-child").innerText;
        var rowMonth = new Date(date).getMonth() + 1;

        if (month === "" || rowMonth == month) {
            row.style.display = "table-row";
        } else {
            row.style.display = "none";
        }
    });
}

document
    .getElementById("download-inventory-btn")
    .addEventListener("click", function () {
        // Code to be executed when the button is clicked
        // Add your download logic here

        // Example: Triggering a file download
        var downloadLink = document.createElement("a");
        downloadLink.href = "path/to/inventory.csv"; // Replace with the actual file path
        downloadLink.download = "inventory.csv"; // Replace with the desired file name
        downloadLink.click();
    });
