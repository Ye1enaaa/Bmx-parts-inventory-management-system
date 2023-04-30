/*document.getElementById("name_value").addEventListener("change", function() {
    var selectedValue = this.value;
    console.log(selectedValue);
    fetch("/get-price/" + selectedValue)
        .then(response => response.json())
        .then(data => {
            var prices = data.unit_price;
            var quantityElement = document.getElementById("quantity");
            var quantity = parseFloat(quantityElement.value);
            if (isNaN(quantity) || quantity < 0) {
                quantity = 0;
                quantityElement.value = "";
            }
            var total = prices * quantity;
            document.getElementById("price").innerText = "Price:" + prices;
            document.getElementById("total").innerText = "Total:" + total;
            console.log(quantity);
            quantityElement.addEventListener("input", function() {
                var newQuantity = parseFloat(quantityElement.value);
                if (isNaN(newQuantity) || newQuantity < 0) {
                    newQuantity = 0;
                    quantityElement.value = "";
                }
                var newTotal = prices * newQuantity;
                document.getElementById("total").innerText = "Total:" + newTotal;
                console.log(total);
                console.log(newTotal);
    fetch('/post-customer', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        total_value: newTotal
                    })
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data.message);
                })
                .catch(error => {
                    console.error("Error occurred while saving total value:", error);
                });
            });
        })
        .catch(error => {
            console.error("Error occurred while fetching price:", error);
        });
});
*/

function postCustomerData(selectedValue, newQuantity, newTotal) {
    fetch("/post-customer", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        },
        body: JSON.stringify({
            name_value: selectedValue,
            quantity: newQuantity,
            total_value: newTotal,
        }),
    })
        .then((response) => response.json())
        .then((data) => {
            console.log(data.message);
            //location.reload();
        })
        .catch((error) => {
            console.error("Error occurred while saving total value:", error);
            console.log(error.response);
        });
    window.alert("Ordered Successfully");
}

document.getElementById("name_value").addEventListener("change", function () {
    var selectedValue = this.value;
    console.log(selectedValue);
    fetch("/get-price/" + selectedValue)
        .then((response) => response.json())
        .then((data) => {
            var prices = data.unit_price;
            var quantityElement = document.getElementById("quantity");
            var quantity = parseFloat(quantityElement.value);
            if (isNaN(quantity) || quantity < 0) {
                quantity = 0;
                quantityElement.value = "";
            }
            var total = prices * quantity;
            document.getElementById("price").innerText = "Price:" + prices;
            document.getElementById("total").innerText = "Total:" + total;
            console.log(quantity);
            quantityElement.addEventListener("input", function () {
                var newQuantity = parseFloat(quantityElement.value);
                if (isNaN(newQuantity) || newQuantity < 0) {
                    newQuantity = 0;
                    quantityElement.value = "";
                }
                var newTotal = prices * newQuantity;
                document.getElementById("total").innerText =
                    "Total:" + newTotal;
                console.log(total);
                console.log(newTotal);
                // Call the postCustomerData function to save the total value
            });
            document
                .getElementById("submit")
                .addEventListener("click", function (event) {
                    event.preventDefault();
                    var newQuantity = parseFloat(quantityElement.value);
                    if (isNaN(newQuantity) || newQuantity < 0) {
                        newQuantity = 0;
                        quantityElement.value = "";
                    }
                    var newTotal = prices * newQuantity;
                    postCustomerData(selectedValue, newQuantity, newTotal);
                });
        })
        .catch((error) => {
            console.error("Error occurred while fetching price:", error);
        });
});

/*document.getElementById("name_value").addEventListener("change", function() {
    var selectedValue = this.value;
    console.log(selectedValue);
    fetch("/get-price/" + selectedValue)
        .then(response => response.json())
        .then(data => {
            var prices = data.unit_price;
            var quantityElement = document.getElementById("quantity");
            var quantity = parseFloat(quantityElement.value);
            if (isNaN(quantity) || quantity < 0) {
                quantity = 0;
                quantityElement.value = "";
            }
            var total = prices * quantity;
            document.getElementById("price").innerText = "Price:" + prices;
            document.getElementById("total").innerText = "Total:" + total;
            console.log(quantity);
            quantityElement.addEventListener("input", function() {
                var newQuantity = parseFloat(quantityElement.value);
                if (isNaN(newQuantity) || newQuantity < 0) {
                    newQuantity = 0;
                    quantityElement.value = "";
                }
                var newTotal = prices * newQuantity;
                document.getElementById("total").innerText = "Total:" + newTotal;
                console.log(total);
                console.log(newTotal);
                //return newTotal, newQuantity, selectedValue;
                // Send a POST request to the server-side endpoint to save the total value
                fetch('/post-customer', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        name_value: selectedValue,
                        quantity: newQuantity,
                        total_value: newTotal
                    })
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data.message);
                })
                .catch(error => {
                    console.error("Error occurred while saving total value:", error);
                    console.log(error.response);
                });
            });
        })
        .catch(error => {
            console.error("Error occurred while fetching price:", error);
        });
});

document.getElementById("submit").addEventListener("submit",function(){
    postCustomerData(selectedValue, newQuantity, newTotal);
    console.log(newTotal);
});*/

document.getElementById("quantity").addEventListener("input", function () {
    var price = document
        .getElementById("price")
        .innerText.replace("Price: ", "");
    var quantity = this.value;
    var total = price * quantity;
    document.getElementById("total").innerText = "Total: " + total;
});

const csrfToken = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content");
fetch(`/get-price/${selectedValue}`, {
    headers: {
        "X-CSRF-TOKEN": csrfToken,
    },
});
