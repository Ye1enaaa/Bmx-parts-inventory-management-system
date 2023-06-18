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
function showEditForm(event, productId) {
    event.preventDefault();
    //document.getElementById("edit-form").style.display = "block";
    console.log('Hoi');
    console.log(productId);
    const product = products.find((product) => product.id === productId);

  // Check if the product exists
  if (product) {
    // Set the values of the form fields based on the product
    const editForm = document.getElementById('edit-form');
    editForm.querySelector('input[name="name"]').value = product.name;
    editForm.querySelector('input[name="unit_price"]').value = product.unit_price;
    editForm.querySelector('input[name="quantity"]').value = product.quantity;

    // Display the edit form
    editForm.style.display = 'block';
  }
}

function hideEditForm() {
    document.getElementById("edit-form").style.display = "none";
}

// Add form validation here
var form = document.getElementById("product-form");
form.addEventListener("submit", function (event) {
    // Add validation code here
});

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
//----------------------------------------EDITED BY JOEPHINE---------------------------\\
function downloadInventory() {
    // Get the HTML content of the specific <div> element
    var content = document.querySelector(".table-container").innerHTML;

    // Get the "Total stock on hand" information
    var totalStocks = document.querySelector(".mr-96").textContent.trim();

    // Get the title "List of Inventory"
    var title = document.querySelector(".text-4xl").textContent.trim();

    // Create the title and total stock tables with borders
    var titleTable =
        "<div style='display: flex; justify-content: center; align-items: center; height: 20vh;'>" +
        "<span style='font-weight: bold; font-size: 50px;'>" +
        title +
        "</span>" +
        "</div>";

    var totalStocksTable =
        "<div style='display: flex; justify-content: center; align-items: center; height: 5vh;'>" +
        "<span style='font-weight: bold; font-size: 24px;'>" +
        totalStocks +
        "</span>" +
        "</div>";

    // Remove the "Edit" and "Stockard" columns from the table content
    content = content
        .replace(/<th>Edit<\/th>/, "")
        .replace(/<th>Stockard<\/th>/, "");
    content = content
        .replace(/<td>Edit<\/td>/g, "")
        .replace(/<td>Stockard<\/td>/g, "");

    // Create the content table with border
    var contentTable =
        "<div style='display: flex; justify-content: center; align-items: center; height: 50vh;'>" +
        "<table style='border-collapse: collapse; border: 2px solid black;'>" +
        "<tr style='border-bottom: 1px solid black;'>" +
        "<td>" +
        content.replace(
            /<\/tr>/g,
            "</tr><tr style='border-bottom: 1px solid black;'>"
        ) +
        "</td>" +
        "</tr>" +
        "</table>" +
        "</div>";

    // Create a new Blob with the combined HTML content and tables
    var combinedContent = titleTable + totalStocksTable + contentTable;

    var blob = new Blob([combinedContent], { type: "text/html" });

    // Create a temporary link element to trigger the download
    var link = document.createElement("a");
    link.href = URL.createObjectURL(blob);
    link.download = "inventory.html";
    link.style.display = "none";

    // Append the link to the document and click it programmatically
    document.body.appendChild(link);
    link.click();

    // Clean up resources
    document.body.removeChild(link);
    URL.revokeObjectURL(link.href);
}
